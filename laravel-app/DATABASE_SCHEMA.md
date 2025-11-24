# Database Schema Documentation

## Phase 2: Database Design & Migrations - COMPLETED ✅

This document describes the database schema for the Laravel + Livewire portfolio application.

## Tables Overview

The database consists of 5 main content tables:

1. **projects** - Portfolio projects showcase
2. **services** - Services offered
3. **testimonials** - Client testimonials and reviews
4. **blog_posts** - Blog articles and posts
5. **contact_messages** - Contact form submissions

---

## Table: `projects`

Stores portfolio project information.

### Columns

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | integer (PK) | NO | auto | Primary key |
| title | varchar | NO | - | Project title |
| slug | varchar (unique) | NO | - | URL-friendly identifier |
| description | text | NO | - | Project description |
| image_placeholder | text | YES | null | SVG or placeholder data |
| link | varchar | YES | null | Project URL or link |
| tags | json | NO | - | Technology tags (stored as JSON array) |
| order | integer | NO | 0 | Display order |
| is_featured | boolean | NO | true | Featured project flag |
| is_published | boolean | NO | true | Published status |
| created_at | timestamp | YES | null | Creation timestamp |
| updated_at | timestamp | YES | null | Last update timestamp |

### Example Data
```php
[
    'title' => 'Enterprise RAG System',
    'slug' => 'enterprise-rag-system',
    'description' => 'Built a production-ready RAG system using LangChain, Pinecone, and GPT-4.',
    'tags' => ['RAG', 'LangChain', 'Pinecone', 'GPT-4'],
    'link' => 'https://example.com/project',
    'is_featured' => true,
]
```

---

## Table: `services`

Stores services offered.

### Columns

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | integer (PK) | NO | auto | Primary key |
| title | varchar | NO | - | Service title |
| slug | varchar (unique) | NO | - | URL-friendly identifier |
| description | text | NO | - | Service description |
| icon | text | YES | null | SVG icon or icon identifier |
| features | json | YES | null | Service features (stored as JSON array) |
| pricing | varchar | YES | null | Pricing information |
| order | integer | NO | 0 | Display order |
| is_published | boolean | NO | true | Published status |
| created_at | timestamp | YES | null | Creation timestamp |
| updated_at | timestamp | YES | null | Last update timestamp |

### Example Data
```php
[
    'title' => 'AI Development',
    'slug' => 'ai-development',
    'description' => 'Custom AI solutions using LLMs and machine learning',
    'features' => ['GPT-4 Integration', 'Custom Models', 'RAG Systems'],
    'pricing' => 'From $5000',
]
```

---

## Table: `testimonials`

Stores client testimonials and reviews.

### Columns

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | integer (PK) | NO | auto | Primary key |
| client_name | varchar | NO | - | Client's name |
| client_title | varchar | YES | null | Client's job title |
| client_company | varchar | YES | null | Client's company |
| client_avatar | varchar | YES | null | Avatar image URL |
| content | text | NO | - | Testimonial content |
| rating | integer | NO | 5 | Star rating (1-5) |
| project_type | varchar | YES | null | Type of project |
| order | integer | NO | 0 | Display order |
| is_featured | boolean | NO | false | Featured testimonial flag |
| is_published | boolean | NO | true | Published status |
| created_at | timestamp | YES | null | Creation timestamp |
| updated_at | timestamp | YES | null | Last update timestamp |

### Example Data
```php
[
    'client_name' => 'John Smith',
    'client_title' => 'CTO',
    'client_company' => 'Tech Corp',
    'content' => 'Excellent work on the RAG system!',
    'rating' => 5,
    'project_type' => 'RAG System',
]
```

---

## Table: `blog_posts`

Stores blog articles and posts.

### Columns

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | integer (PK) | NO | auto | Primary key |
| title | varchar | NO | - | Post title |
| slug | varchar (unique) | NO | - | URL-friendly identifier |
| excerpt | text | NO | - | Short excerpt/summary |
| content | longtext | NO | - | Full post content |
| category | varchar | NO | - | Post category |
| featured_image | varchar | YES | null | Featured image URL |
| tags | json | YES | null | Post tags (stored as JSON array) |
| read_time | integer | NO | 5 | Estimated read time in minutes |
| published_at | timestamp | YES | null | Publication date/time |
| is_published | boolean | NO | false | Published status |
| views | integer | NO | 0 | View count |
| created_at | timestamp | YES | null | Creation timestamp |
| updated_at | timestamp | YES | null | Last update timestamp |

### Example Data
```php
[
    'title' => 'Building Production-Ready RAG Systems',
    'slug' => 'building-production-ready-rag-systems',
    'excerpt' => 'Learn how to build and deploy enterprise-grade RAG systems...',
    'content' => 'Full article content here...',
    'category' => 'AI & ML',
    'tags' => ['RAG', 'LangChain', 'GPT-4'],
    'read_time' => 10,
    'published_at' => now(),
]
```

---

## Table: `contact_messages`

Stores contact form submissions.

### Columns

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | integer (PK) | NO | auto | Primary key |
| name | varchar | NO | - | Sender's name |
| email | varchar | NO | - | Sender's email |
| subject | varchar | YES | null | Message subject |
| message | text | NO | - | Message content |
| status | varchar | NO | 'new' | Status: new, read, replied, archived |
| ip_address | varchar | YES | null | Sender's IP address |
| user_agent | varchar | YES | null | Browser user agent |
| read_at | timestamp | YES | null | When message was read |
| created_at | timestamp | YES | null | Creation timestamp |
| updated_at | timestamp | YES | null | Last update timestamp |

### Example Data
```php
[
    'name' => 'Jane Doe',
    'email' => 'jane@example.com',
    'subject' => 'Project Inquiry',
    'message' => 'I would like to discuss a project...',
    'status' => 'new',
]
```

---

## Eloquent Models

All tables have corresponding Eloquent models in `app/Models/`:

- `Project.php`
- `Service.php`
- `Testimonial.php`
- `BlogPost.php`
- `ContactMessage.php`

### Model Features

All models include:
- **Fillable fields** for mass assignment protection
- **Type casting** for JSON fields, booleans, and dates
- **Timestamps** for created_at and updated_at

### Example Usage

```php
// Create a new project
$project = Project::create([
    'title' => 'My Project',
    'slug' => 'my-project',
    'description' => 'Project description',
    'tags' => ['Laravel', 'Livewire'],
]);

// Query published projects
$projects = Project::where('is_published', true)
    ->orderBy('order')
    ->get();

// Access JSON fields
$tags = $project->tags; // Returns array
```

---

## Testing

Database structure is verified by feature tests in `tests/Feature/DatabaseStructureTest.php`.

Run tests:
```bash
php artisan test
```

All 7 tests pass successfully:
- ✓ Projects table exists and can create records
- ✓ Services table exists and can create records
- ✓ Testimonials table exists and can create records
- ✓ Blog posts table exists and can create records
- ✓ Contact messages table exists and can create records

---

## Migration Commands

```bash
# Run all migrations
php artisan migrate

# Rollback last batch
php artisan migrate:rollback

# Reset and re-run all migrations
php artisan migrate:fresh

# Show database status
php artisan db:show

# Show specific table structure
php artisan db:table projects
```

---

## Next Steps (Phase 3)

With the database schema in place, the next phase will involve:

1. Creating Livewire components for each content type
2. Building admin interface for content management
3. Implementing frontend views to display content
4. Creating seeders to populate initial data
5. Setting up relationships between models if needed

---

**Database Schema Version:** 1.0  
**Created:** 2025-11-24  
**Status:** Phase 2 Complete ✅
