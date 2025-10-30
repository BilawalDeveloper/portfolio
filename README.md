# AI-Focused Portfolio with Laravel + Livewire + TailwindCSS

A modern, highly polished, and mobile-first portfolio built with Laravel 12, Livewire 3, and TailwindCSS v4. This portfolio showcases AI expertise and includes interactive AI features designed to attract hiring companies.

![Laravel](https://img.shields.io/badge/Laravel-12.36.1-red?logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-3.6.4-purple)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.1.16-blue?logo=tailwindcss)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?logo=php)

## 🎯 Overview

This portfolio application is designed to showcase AI and machine learning expertise through:

- **Interactive AI Features**: Chat assistant, demo playgrounds, and model evaluations
- **Country Personalization**: Adaptive themes and content based on visitor location
- **CV Upload & Parsing**: AI-powered resume analysis for hiring teams
- **Admin Panel**: Full content management system with Livewire components
- **Modern Design**: Mobile-first, accessible, and performant

## ✨ Features

### Current Implementation (Phase 1 Complete)

- ✅ **Laravel 12** with latest stable features
- ✅ **Livewire 3** for reactive components
- ✅ **TailwindCSS v4** with modern design system
- ✅ **Authentication System** (Laravel Breeze + Livewire)
- ✅ **Database Schema** with 7 comprehensive models:
  - Projects (with AI metrics, tech stack, demos)
  - Skills (categorized with proficiency levels)
  - Blog Posts (with tags, reading time)
  - Resumes (CV upload with parsed data)
  - Chat Messages (for AI chatbot)
  - Countries (for localization)
  - Theme Configurations (country-specific themes)
- ✅ **Responsive Homepage** with sections:
  - Hero with gradient effects
  - About section with value propositions
  - Project showcase
  - Skills display
  - Blog posts
  - Contact form
  - CV upload
  - AI chatbot widget
- ✅ **All Tests Passing** (26/26)

### Upcoming Features

- 🔄 **Admin Dashboard** for content management
- 🔄 **CV Parsing Pipeline** (PDF/DOCX extraction + AI parsing)
- 🔄 **MCP Chatbot Server** (LLM integration)
- 🔄 **Country Detection & Personalization**
- 🔄 **AI Demo Components**
- 🔄 **Performance Optimization** (Lighthouse 90+)
- 🔄 **Security Hardening** (virus scanning, rate limiting)

## 🚀 Quick Start

### Prerequisites

- PHP 8.3+
- Composer 2.x
- Node.js 18+ and NPM
- SQLite (default) or MySQL/PostgreSQL

### Installation

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

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to see the portfolio.

### Development

For hot module replacement during development:
```bash
npm run dev
```

Run tests:
```bash
php artisan test
```

## 📁 Project Structure

```
portfolio/
├── app/
│   ├── Http/Controllers/      # HTTP controllers
│   ├── Livewire/              # Livewire components
│   │   ├── ProjectShowcase.php
│   │   ├── SkillsDisplay.php
│   │   ├── BlogPostsList.php
│   │   ├── ContactForm.php
│   │   ├── ResumeUpload.php
│   │   └── ChatWidget.php
│   ├── Models/                # Eloquent models
│   │   ├── Project.php
│   │   ├── Skill.php
│   │   ├── BlogPost.php
│   │   ├── Resume.php
│   │   ├── ChatMessage.php
│   │   ├── Country.php
│   │   └── ThemeConfiguration.php
│   └── View/Components/       # Blade components
│       └── PortfolioLayout.php
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── resources/
│   ├── css/
│   │   └── app.css           # TailwindCSS entry
│   ├── js/
│   │   └── app.js            # JavaScript entry
│   └── views/
│       ├── home.blade.php    # Homepage
│       ├── layouts/          # Layout templates
│       └── livewire/         # Livewire views
├── routes/
│   ├── web.php               # Web routes
│   └── auth.php              # Authentication routes
└── tests/                     # PHPUnit tests
```

## 🗄️ Database Schema

### Projects
Portfolio projects with AI-specific metadata:
- Title, slug, description, content
- Technologies (JSON array)
- GitHub URL, demo URL
- Dataset size, model architecture
- Impact metrics (JSON)
- Country visibility controls
- Featured flag, publish status

### Resumes
CV upload and parsing system:
- Original file storage
- Raw text extraction
- Parsed structured data (JSON)
- LinkedIn URL support
- Consent tracking
- Admin review workflow
- Privacy controls (expires_at)

### Chat Messages
AI chatbot conversation history:
- Session-based grouping
- Role-based messages (user/assistant/system)
- Metadata for context and sources
- Token usage tracking
- IP address logging

### Theme Configurations
Country-specific theming:
- Color palettes (JSON)
- Hero images and copy
- Section visibility controls
- Highlighted projects per region
- Custom CSS overrides

## 🎨 Design System

Built with TailwindCSS v4 featuring:

- **Colors**: Blue and purple gradients for AI/tech branding
- **Typography**: Inter for body, Cal Sans for headings
- **Animations**: Smooth transitions, hover effects, pulse animations
- **Components**: Reusable UI components with dark mode support
- **Responsive**: Mobile-first breakpoints (sm, md, lg, xl)

## 🔒 Security Features

- CSRF protection (Laravel built-in)
- SQL injection prevention (Eloquent ORM)
- XSS protection (Blade templating)
- Prepared for:
  - File upload validation
  - Virus scanning integration
  - Rate limiting
  - API key encryption

## 🧪 Testing

Run the test suite:
```bash
php artisan test
```

Current coverage:
- ✅ 26 tests passing
- Feature tests for authentication flows
- Homepage rendering tests
- Profile management tests

## 📝 Development Roadmap

### Phase 2: Enhanced Design & Functionality
- Implement full Livewire component logic
- Add country detection service
- Create admin CRUD interfaces
- Build theme variation system

### Phase 3: Admin Panel
- Dashboard with analytics
- Content management (projects, blog, skills)
- Country-specific configurations
- Activity logging

### Phase 4: CV Parsing
- PDF/DOCX extraction libraries
- AI-powered data extraction
- Queue-based processing
- Admin review interface

### Phase 5: MCP Chatbot
- LLM integration (OpenAI/local)
- Knowledge base retrieval
- Rate limiting
- Chat history

### Phase 6: Personalization
- GeoIP detection
- Locale-specific content
- Currency/date formatting
- Regional project highlights

### Phase 7: AI Demos
- Interactive model playground
- Code generation examples
- Evaluation metrics dashboard
- Project timeline visualization

### Phase 8: Optimization
- Image optimization
- Lazy loading
- SEO enhancements
- Lighthouse 90+ score

### Phase 9: Production
- Security hardening
- Monitoring setup
- Deployment pipeline
- Documentation

## 🤝 Contributing

This is a personal portfolio project, but suggestions and feedback are welcome!

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Acknowledgments

Built with:
- [Laravel](https://laravel.com) - The PHP Framework for Web Artisans
- [Livewire](https://livewire.laravel.com) - A full-stack framework for Laravel
- [TailwindCSS](https://tailwindcss.com) - A utility-first CSS framework
- [Laravel Breeze](https://github.com/laravel/breeze) - Minimal authentication scaffolding

---

**Status**: 🚧 Phase 1 Complete - Active Development

For questions or collaboration opportunities, please open an issue or contact through the portfolio website.

