# Laravel + Livewire Portfolio Conversion - Setup Guide

## 🚀 Overview

This repository is in the process of being converted from a static HTML portfolio to a dynamic Laravel + Livewire application. This guide outlines the setup process and current status.

## 📊 Conversion Status

### ✅ Phase 1: Project Setup & Environment (In Progress)
- [x] Created Laravel directory structure
- [x] Created composer.json with dependencies
- [x] Created .env.example configuration
- [x] Created artisan command file
- [x] Created .gitignore for Laravel
- [x] Created planning documentation
- [ ] Install Laravel dependencies via Composer
- [ ] Install Livewire package
- [ ] Configure Vite for asset compilation
- [ ] Generate application key
- [ ] Create database

### ⏳ Phase 2: Database Design & Migrations (Pending)
- [ ] Create projects table migration
- [ ] Create services table migration
- [ ] Create testimonials table migration
- [ ] Create blog_posts table migration
- [ ] Create contact_messages table migration

### ⏳ Remaining Phases (2-30) (Pending)
See [LARAVEL_CONVERSION_PLAN.md](./LARAVEL_CONVERSION_PLAN.md) for complete phase breakdown.

## 🛠️ Installation Instructions

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL/PostgreSQL (or SQLite for development)
- Git

### Step 1: Clone the Repository
```bash
git clone https://github.com/BilawalDeveloper/portfolio.git
cd portfolio
```

### Step 2: Install PHP Dependencies
```bash
composer install
```

### Step 3: Install JavaScript Dependencies
```bash
npm install
```

### Step 4: Environment Configuration
```bash
# Copy example environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env
# For SQLite (simplest for development):
touch database/database.sqlite
# Update .env: DB_CONNECTION=sqlite
```

### Step 5: Database Setup
```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### Step 6: Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### Step 7: Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 📁 Project Structure

```
portfolio/
├── app/                          # Laravel application code
│   ├── Http/
│   │   ├── Controllers/         # HTTP controllers
│   │   └── Livewire/           # Livewire components
│   └── Models/                  # Eloquent models
├── bootstrap/                   # Laravel bootstrap
│   └── cache/                  # Framework cache
├── config/                      # Configuration files
├── database/
│   ├── migrations/             # Database migrations
│   ├── seeders/                # Database seeders
│   └── factories/              # Model factories
├── public/                      # Public web root
│   ├── index.php               # Entry point
│   └── images/                 # Static images
├── resources/
│   ├── views/                  # Blade templates
│   │   ├── layouts/           # Layout templates
│   │   ├── pages/             # Page templates
│   │   ├── components/        # Blade components
│   │   └── livewire/          # Livewire views
│   ├── css/                    # Stylesheets
│   └── js/                     # JavaScript
├── routes/
│   ├── web.php                 # Web routes
│   └── api.php                 # API routes
├── storage/                     # File storage
│   ├── app/                   # Application files
│   ├── framework/             # Framework files
│   └── logs/                  # Log files
├── tests/                       # Tests
│   ├── Feature/               # Feature tests
│   └── Unit/                  # Unit tests
│
├── Static HTML Files (Legacy - will be removed after conversion)
├── index.html                  # Current homepage
├── styles.css                  # Current styles
├── script.js                   # Current JavaScript
└── projects/                   # Current project pages
```

## 🎯 Development Workflow

### Running the Application

#### Development Mode (with hot reload)
```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite dev server
npm run dev
```

#### Production Build
```bash
npm run build
php artisan serve --env=production
```

### Database Operations

#### Creating Migrations
```bash
php artisan make:migration create_projects_table
```

#### Creating Models
```bash
php artisan make:model Project
```

#### Creating Seeders
```bash
php artisan make:seeder ProjectSeeder
```

#### Running Migrations
```bash
# Run all pending migrations
php artisan migrate

# Rollback last batch
php artisan migrate:rollback

# Refresh database (drop all tables and re-run migrations)
php artisan migrate:fresh

# Refresh and seed
php artisan migrate:fresh --seed
```

### Creating Livewire Components
```bash
# Create Livewire component
php artisan make:livewire ContactForm

# This creates:
# - app/Http/Livewire/ContactForm.php
# - resources/views/livewire/contact-form.blade.php
```

### Code Style and Quality
```bash
# Fix code style (Laravel Pint)
./vendor/bin/pint

# Run tests
php artisan test

# Or with PHPUnit directly
./vendor/bin/phpunit
```

## 🗄️ Database Schema (Planned)

### Projects Table
- id
- title
- slug
- description
- long_description (text)
- tags (json)
- image_url
- demo_url
- github_url
- featured (boolean)
- order (integer)
- created_at
- updated_at

### Services Table
- id
- title
- description
- icon (svg/icon name)
- order
- created_at
- updated_at

### Testimonials Table
- id
- name
- role
- company
- content (text)
- avatar_url
- rating (integer)
- featured (boolean)
- order
- created_at
- updated_at

### Blog Posts Table
- id
- title
- slug
- excerpt
- content (text)
- author
- published_at
- featured_image
- tags (json)
- status (draft/published)
- views_count
- created_at
- updated_at

### Contact Messages Table
- id
- name
- email
- message (text)
- read (boolean)
- replied (boolean)
- ip_address
- user_agent
- created_at
- updated_at

## 🔒 Environment Variables

Key environment variables to configure in `.env`:

```env
# Application
APP_NAME="AI Developer Portfolio"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database
DB_CONNECTION=sqlite
# or for MySQL/PostgreSQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=portfolio
# DB_USERNAME=root
# DB_PASSWORD=

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@aidev.com
MAIL_FROM_NAME="${APP_NAME}"

# Contact Form
FORMSPREE_ENDPOINT=your-formspree-id
CONTACT_EMAIL=contact@aidev.com

# Social Media
GITHUB_URL=https://github.com/BilawalDeveloper
LINKEDIN_URL=https://linkedin.com/in/bilawaldeveloper
TWITTER_URL=https://twitter.com/bilawaldeveloper
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/ProjectTest.php

# Run with coverage
php artisan test --coverage

# Run specific test method
php artisan test --filter test_can_view_project_details
```

## 📦 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production` in .env
- [ ] Set `APP_DEBUG=false` in .env
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Run `npm run build`
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Set up proper file permissions for storage/
- [ ] Configure web server (Nginx/Apache)
- [ ] Set up SSL certificate
- [ ] Configure database backups
- [ ] Set up error monitoring (Sentry, Bugsnag)

### Deployment Commands
```bash
# Optimize for production
php artisan optimize

# Clear all caches
php artisan optimize:clear

# Build production assets
npm run build
```

## 🐛 Troubleshooting

### Common Issues

**"Class not found" errors**
```bash
composer dump-autoload
```

**Asset compilation issues**
```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

**Database connection errors**
```bash
# Check database configuration in .env
# Verify database exists
# Test connection:
php artisan tinker
>>> DB::connection()->getPdo();
```

**Permission errors**
```bash
# Fix storage permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs/11.x)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [Laravel News](https://laravel-news.com/)
- [Laracasts](https://laracasts.com/)

## 🤝 Contributing

This is a personal portfolio project, but suggestions and feedback are welcome! Please open an issue to discuss any changes.

## 📄 License

MIT License - feel free to use this as a template for your own portfolio.

## 📞 Contact

- GitHub: [@BilawalDeveloper](https://github.com/BilawalDeveloper)
- LinkedIn: [bilawaldeveloper](https://linkedin.com/in/bilawaldeveloper)
- Twitter: [@bilawaldeveloper](https://twitter.com/bilawaldeveloper)

---

**Note**: This project is currently in active conversion from static HTML to Laravel + Livewire. The static HTML files will remain in the repository during the transition phase and will be removed once the Laravel version is complete and deployed.
