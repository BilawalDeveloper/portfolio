# Resume Storage and Parsing Specification

## Overview

The CV upload and parsing system allows hiring managers and recruiters to upload resumes for automated analysis and matching with the portfolio owner's skills and experience.

## Storage Structure

### File Storage
```
storage/
├── app/
│   └── resumes/
│       ├── originals/      # Original uploaded files
│       │   ├── {uuid}.pdf
│       │   └── {uuid}.docx
│       └── parsed/         # Parsed text files
│           └── {uuid}.txt
```

### Database Schema
```sql
CREATE TABLE resumes (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(255),
    original_filename VARCHAR(255),
    file_path VARCHAR(255),
    file_type VARCHAR(50),
    file_size INT,
    raw_text LONGTEXT,
    parsed_data JSON,
    linkedin_url VARCHAR(255),
    consent_given BOOLEAN DEFAULT FALSE,
    is_processed BOOLEAN DEFAULT FALSE,
    is_reviewed BOOLEAN DEFAULT FALSE,
    reviewed_by BIGINT,
    admin_notes TEXT,
    ip_address VARCHAR(45),
    user_agent VARCHAR(255),
    processed_at TIMESTAMP,
    expires_at TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP
);
```

## Parsed Data Structure

### JSON Schema
```json
{
  "personal_info": {
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+1-234-567-8900",
    "location": "San Francisco, CA",
    "linkedin": "linkedin.com/in/johndoe"
  },
  "summary": "Experienced ML engineer with 5+ years...",
  "skills": [
    {
      "category": "Programming Languages",
      "items": ["Python", "Java", "C++"]
    },
    {
      "category": "AI/ML",
      "items": ["TensorFlow", "PyTorch", "Scikit-learn"]
    }
  ],
  "experience": [
    {
      "title": "Senior ML Engineer",
      "company": "Tech Corp",
      "location": "San Francisco, CA",
      "start_date": "2020-01",
      "end_date": "2023-12",
      "current": false,
      "description": "Led development of recommendation systems...",
      "achievements": [
        "Improved model accuracy by 25%",
        "Reduced inference time by 40%"
      ]
    }
  ],
  "education": [
    {
      "degree": "Master of Science",
      "field": "Computer Science",
      "institution": "Stanford University",
      "graduation_date": "2018",
      "gpa": "3.9"
    }
  ],
  "certifications": [
    {
      "name": "AWS Certified Machine Learning",
      "issuer": "Amazon Web Services",
      "date": "2022-03"
    }
  ],
  "projects": [
    {
      "name": "Image Classification System",
      "description": "Built CNN model for image classification",
      "technologies": ["TensorFlow", "Python", "Docker"]
    }
  ]
}
```

## Parsing Pipeline

### Step 1: File Upload
```php
// Validation rules
$rules = [
    'resume' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
    'consent' => 'required|accepted',
    'linkedin_url' => 'nullable|url',
];
```

### Step 2: Virus Scanning
```php
// Using ClamAV or similar
$scanner = app(VirusScanner::class);
$isSafe = $scanner->scan($file);

if (!$isSafe) {
    throw new UnsafeFileException();
}
```

### Step 3: Text Extraction

#### PDF Extraction
```php
use Smalot\PdfParser\Parser;

$parser = new Parser();
$pdf = $parser->parseFile($filePath);
$text = $pdf->getText();
```

#### DOCX Extraction
```php
use PhpOffice\PhpWord\IOFactory;

$phpWord = IOFactory::load($filePath);
$text = '';
foreach ($phpWord->getSections() as $section) {
    foreach ($section->getElements() as $element) {
        $text .= $element->getText();
    }
}
```

### Step 4: AI-Powered Parsing

#### Option 1: OpenAI GPT-4
```php
$prompt = "Extract structured information from this resume:\n\n{$text}";

$response = OpenAI::chat()->create([
    'model' => 'gpt-4',
    'messages' => [
        ['role' => 'system', 'content' => 'You are a resume parser...'],
        ['role' => 'user', 'content' => $prompt]
    ],
    'response_format' => ['type' => 'json_object']
]);

$parsedData = json_decode($response->choices[0]->message->content);
```

#### Option 2: Regex + NLP (Fallback)
```php
// Extract email
preg_match('/[\w\.-]+@[\w\.-]+\.\w+/', $text, $email);

// Extract phone
preg_match('/\+?\d{1,3}[-.\s]?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}/', $text, $phone);

// Use spaCy or similar for NER
$entities = NLP::extractEntities($text);
```

### Step 5: Data Validation
```php
$validator = Validator::make($parsedData, [
    'personal_info.email' => 'required|email',
    'personal_info.name' => 'required|string',
    'skills' => 'required|array',
    'experience' => 'required|array|min:1',
]);
```

### Step 6: Storage
```php
Resume::create([
    'name' => $parsedData['personal_info']['name'],
    'email' => $parsedData['personal_info']['email'],
    'original_filename' => $file->getClientOriginalName(),
    'file_path' => $storagePath,
    'raw_text' => $text,
    'parsed_data' => $parsedData,
    'is_processed' => true,
    'processed_at' => now(),
    'expires_at' => now()->addDays(90), // 90-day retention
]);
```

## Admin Review Interface

### Review Dashboard
```php
// List unreviewed resumes
$resumes = Resume::where('is_reviewed', false)
    ->orderBy('created_at', 'desc')
    ->paginate(10);
```

### Review Actions
1. **Approve**: Mark as reviewed, good match
2. **Correct**: Edit parsed data manually
3. **Reject**: Mark as not suitable
4. **Delete**: Remove from system

### Match Scoring
```php
function calculateMatchScore(Resume $resume): float
{
    $portfolioSkills = Skill::pluck('name')->toArray();
    $resumeSkills = $resume->parsed_data['skills'] ?? [];
    
    $matchingSkills = array_intersect($portfolioSkills, $resumeSkills);
    
    return count($matchingSkills) / count($portfolioSkills) * 100;
}
```

## Privacy & Compliance

### GDPR Compliance
- Explicit consent required before processing
- Right to access parsed data
- Right to deletion
- Data retention policies

### Data Retention
```php
// Scheduled task to delete expired resumes
Schedule::daily()->call(function () {
    Resume::where('expires_at', '<', now())->delete();
});
```

### Consent Management
```blade
<form wire:submit="uploadResume">
    <input type="file" wire:model="resume">
    
    <label>
        <input type="checkbox" wire:model="consent" required>
        I consent to processing of my resume data for recruitment purposes.
        Data will be retained for 90 days.
    </label>
    
    <button type="submit">Upload</button>
</form>
```

## LinkedIn Integration (Future)

### LinkedIn API
```php
// Fetch public profile
$profile = LinkedInApi::getProfile($profileUrl);

$parsedData = [
    'personal_info' => [
        'name' => $profile->name,
        'headline' => $profile->headline,
    ],
    'experience' => $profile->positions,
    'education' => $profile->education,
];
```

## Queue Processing

### Job Structure
```php
class ParseResumeJob implements ShouldQueue
{
    public function handle()
    {
        $resume = Resume::find($this->resumeId);
        
        // Extract text
        $text = $this->extractText($resume->file_path);
        
        // Parse with AI
        $parsedData = $this->parseWithAI($text);
        
        // Update resume
        $resume->update([
            'raw_text' => $text,
            'parsed_data' => $parsedData,
            'is_processed' => true,
            'processed_at' => now(),
        ]);
        
        // Notify admin
        Notification::route('mail', config('mail.admin'))
            ->notify(new ResumeProcessed($resume));
    }
}
```

### Dispatching
```php
// After file upload
dispatch(new ParseResumeJob($resume->id))
    ->onQueue('resumes');
```

## Testing

### Unit Tests
```php
public function test_pdf_extraction()
{
    $pdf = UploadedFile::fake()->create('resume.pdf', 100);
    $text = (new PDFExtractor)->extract($pdf);
    
    $this->assertNotEmpty($text);
}

public function test_ai_parsing()
{
    $text = file_get_contents('tests/fixtures/sample_resume.txt');
    $parsed = (new AIParser)->parse($text);
    
    $this->assertArrayHasKey('personal_info', $parsed);
    $this->assertArrayHasKey('experience', $parsed);
}
```

### Integration Tests
```php
public function test_complete_upload_flow()
{
    $this->actingAs($user)
        ->post('/api/resumes/upload', [
            'resume' => UploadedFile::fake()->create('resume.pdf'),
            'consent' => true,
        ])
        ->assertStatus(201);
    
    $this->assertDatabaseHas('resumes', [
        'is_processed' => false,
    ]);
    
    // Process queue
    Queue::fake();
    
    $this->assertJobsDispatched(ParseResumeJob::class);
}
```

## Error Handling

### Common Errors
1. **Unsupported file format**: Return 422 with message
2. **File too large**: Return 413 with size limit
3. **Virus detected**: Return 403 with security message
4. **Parsing failed**: Queue for manual review
5. **API quota exceeded**: Fallback to regex parsing

## Monitoring

### Metrics
- Upload success rate
- Parsing accuracy (admin feedback)
- Average processing time
- Queue backlog size

### Alerts
- Parsing failures > 10%
- Queue delay > 1 hour
- Storage usage > 80%

## Cost Optimization

### LLM Usage
- Cache common resume patterns
- Use smaller models for initial extraction
- Only use GPT-4 for complex resumes

### Storage
- Compress text files
- Delete original files after parsing
- Archive old resumes to cold storage
