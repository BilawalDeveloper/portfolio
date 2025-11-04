# Development Guide

## Quick Start

### Prerequisites
- PHP 8.3 or higher
- Composer 2.x
- Node.js 18+ and NPM
- SQLite (default) or MySQL/PostgreSQL
- Git

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/BilawalDeveloper/portfolio.git
   cd portfolio
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # Default SQLite
   touch database/database.sqlite
   php artisan migrate
   
   # Or configure MySQL/PostgreSQL in .env
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=portfolio
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000`

## Development Workflow

### Hot Module Replacement
For frontend development with auto-reload:
```bash
npm run dev
```

### Running Tests
```bash
# All tests
php artisan test

# Specific test
php artisan test --filter ExampleTest

# With coverage
php artisan test --coverage
```

### Code Quality

#### Laravel Pint (Code Formatting)
```bash
./vendor/bin/pint
```

#### PHPStan (Static Analysis)
```bash
composer require --dev phpstan/phpstan
./vendor/bin/phpstan analyse
```

### Database Operations

#### Fresh migration
```bash
php artisan migrate:fresh
```

#### Rollback
```bash
php artisan migrate:rollback
```

#### Seed data
```bash
php artisan db:seed
```

#### Create new model with migration
```bash
php artisan make:model ModelName -m
```

### Livewire Development

#### Create new component
```bash
php artisan make:livewire ComponentName
```

#### Clear Livewire cache
```bash
php artisan livewire:clear
```

### Asset Compilation

#### Development build
```bash
npm run dev
```

#### Production build
```bash
npm run build
```

## Project Structure

### Application Layer
```
app/
├── Http/
│   └── Controllers/      # HTTP controllers
├── Livewire/             # Livewire components
├── Models/               # Eloquent models
├── Providers/            # Service providers
└── View/Components/      # Blade components
```

### Frontend Layer
```
resources/
├── css/
│   └── app.css          # TailwindCSS entry point
├── js/
│   └── app.js           # JavaScript entry point
└── views/
    ├── components/      # Blade components
    ├── layouts/         # Layout templates
    └── livewire/        # Livewire views
```

### Database Layer
```
database/
├── factories/           # Model factories
├── migrations/          # Database migrations
└── seeders/            # Database seeders
```

## Creating New Features

### Adding a New Model

1. **Create model and migration**
   ```bash
   php artisan make:model NewModel -m
   ```

2. **Define schema in migration**
   ```php
   Schema::create('new_models', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->timestamps();
   });
   ```

3. **Add fillable fields and casts**
   ```php
   class NewModel extends Model
   {
       protected $fillable = ['name'];
       
       protected $casts = [
           'created_at' => 'datetime',
       ];
   }
   ```

4. **Run migration**
   ```bash
   php artisan migrate
   ```

### Adding a Livewire Component

1. **Create component**
   ```bash
   php artisan make:livewire NewComponent
   ```

2. **Implement logic in `app/Livewire/NewComponent.php`**
   ```php
   class NewComponent extends Component
   {
       public $property;
       
       public function mount()
       {
           // Initialize
       }
       
       public function render()
       {
           return view('livewire.new-component');
       }
   }
   ```

3. **Create view in `resources/views/livewire/new-component.blade.php`**
   ```blade
   <div>
       <!-- Component template -->
   </div>
   ```

4. **Use in blade template**
   ```blade
   @livewire('new-component')
   ```

## Environment Configuration

### Required Variables
```env
APP_NAME="AI Portfolio"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite
# Or MySQL/PostgreSQL settings

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
```

### Optional Variables for Future Features
```env
# LLM Integration
LLM_PROVIDER=openai
OPENAI_API_KEY=sk-...
OPENAI_MODEL=gpt-4

# GeoIP
GEOIP_SERVICE=ipapi
GEOIP_API_KEY=...

# File Upload
MAX_UPLOAD_SIZE=10240
ALLOWED_EXTENSIONS=pdf,doc,docx
```

## Troubleshooting

### Common Issues

1. **"Class not found" error**
   ```bash
   composer dump-autoload
   ```

2. **Livewire component not updating**
   ```bash
   php artisan view:clear
   php artisan livewire:clear
   ```

3. **Assets not loading**
   ```bash
   npm run build
   php artisan optimize:clear
   ```

4. **Permission issues**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

5. **Database connection error**
   - Check `.env` database settings
   - Ensure database exists
   - Verify credentials

### Debug Mode

Enable debug mode in `.env`:
```env
APP_DEBUG=true
```

View logs:
```bash
tail -f storage/logs/laravel.log
```

## Testing Guidelines

### Writing Tests

1. **Feature test example**
   ```php
   public function test_example()
   {
       $response = $this->get('/');
       $response->assertStatus(200);
   }
   ```

2. **Livewire test example**
   ```php
   public function test_component()
   {
       Livewire::test(ComponentName::class)
           ->assertSee('Expected Text')
           ->set('property', 'value')
           ->call('method')
           ->assertEmitted('event');
   }
   ```

3. **Database test example**
   ```php
   use RefreshDatabase;
   
   public function test_database()
   {
       $model = Model::factory()->create();
       $this->assertDatabaseHas('models', ['id' => $model->id]);
   }
   ```

## Contributing

### Workflow

1. Fork the repository
2. Create feature branch: `git checkout -b feature/amazing-feature`
3. Make changes
4. Run tests: `php artisan test`
5. Format code: `./vendor/bin/pint`
6. Commit: `git commit -m 'Add amazing feature'`
7. Push: `git push origin feature/amazing-feature`
8. Open Pull Request

### Code Standards

- Follow PSR-12 coding standards
- Use Laravel best practices
- Write tests for new features
- Document complex logic
- Keep commits atomic and descriptive

## Deployment

### Production Checklist

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate new `APP_KEY`
- [ ] Configure production database
- [ ] Set up proper file permissions
- [ ] Configure caching
- [ ] Set up queue workers
- [ ] Configure mail settings
- [ ] Enable HTTPS
- [ ] Set up monitoring

### Optimization Commands

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

## Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [TailwindCSS Documentation](https://tailwindcss.com/docs)
- [Laravel Breeze](https://github.com/laravel/breeze)

## Support

For issues and questions:
- Open an issue on GitHub
- Check existing documentation
- Review Laravel/Livewire docs
