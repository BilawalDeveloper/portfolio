# Laravel + Livewire Portfolio Application

This is a Laravel 11 application with Livewire v3, set up with Docker for easy development and deployment.

## Features

- **Laravel 11**: Latest Laravel framework
- **Livewire v3.7**: For reactive components
- **Docker-based Environment**: Complete containerized setup
- **MySQL Database**: Persistent database storage
- **Vite**: Modern asset compilation
- **phpMyAdmin**: Database management interface

## Prerequisites

- Docker Desktop (with Docker Compose)
- Git

## Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/BilawalDeveloper/portfolio.git
cd portfolio/laravel-app
```

### 2. Environment Configuration

The `.env` file is already configured for Docker. Key settings:
- Database connection: MySQL (containerized)
- App URL: http://localhost:8000
- Database credentials are set for Docker containers

### 3. Start Docker Containers

```bash
# Build and start all containers
docker-compose up -d

# View container logs
docker-compose logs -f
```

### 4. Install Dependencies

```bash
# Install PHP dependencies
docker-compose exec app composer install

# Install Node dependencies and build assets
docker-compose exec node npm install
```

### 5. Run Database Migrations

```bash
docker-compose exec app php artisan migrate
```

## Access Points

- **Application**: http://localhost:8000
- **phpMyAdmin**: http://localhost:8080
- **Vite Dev Server**: http://localhost:5173

## Available Services

### Laravel Application (app)
- Port: 8000
- PHP 8.3 with Apache
- All Laravel features enabled

### MySQL Database (db)
- Port: 3306
- Database: `laravel`
- Username: `laravel`
- Password: `secret`

### phpMyAdmin (phpmyadmin)
- Port: 8080
- Easy database management interface

### Node.js (node)
- Port: 5173
- Vite development server for hot module replacement

## Common Commands

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f [service_name]

# Run artisan commands
docker-compose exec app php artisan [command]

# Run composer commands
docker-compose exec app composer [command]

# Run npm commands
docker-compose exec node npm [command]

# Access MySQL CLI
docker-compose exec db mysql -u laravel -psecret laravel

# Clear Laravel cache
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear
```

## Development Workflow

### Making Livewire Components

```bash
# Create a Livewire component
docker-compose exec app php artisan make:livewire ComponentName
```

### Asset Compilation

```bash
# Development mode (with hot reload)
docker-compose exec node npm run dev

# Production build
docker-compose exec node npm run build
```

### Testing

```bash
# Run PHPUnit tests
docker-compose exec app php artisan test
```

## Project Structure

```
laravel-app/
├── app/                    # Application code
├── bootstrap/              # Framework bootstrap
├── config/                 # Configuration files
├── database/              # Migrations and seeders
├── public/                # Public web root
├── resources/             # Views, CSS, JS
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript
│   └── views/            # Blade templates
├── routes/                # Application routes
├── storage/               # Logs, cache, uploads
├── tests/                 # Test files
├── Dockerfile             # Docker image definition
├── docker-compose.yml     # Docker services configuration
├── vite.config.js        # Vite configuration
└── package.json          # Node dependencies
```

## Environment Variables

Key environment variables in `.env`:

- `APP_NAME`: Application name
- `APP_ENV`: Environment (local, production)
- `APP_KEY`: Encryption key (auto-generated)
- `APP_DEBUG`: Debug mode
- `APP_URL`: Application URL
- `DB_CONNECTION`: Database driver
- `DB_HOST`: Database host (set to `db` for Docker)
- `DB_PORT`: Database port
- `DB_DATABASE`: Database name
- `DB_USERNAME`: Database username
- `DB_PASSWORD`: Database password

## Troubleshooting

### Permission Issues

```bash
# Fix storage permissions
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Database Connection Issues

```bash
# Verify database container is running
docker-compose ps

# Check database logs
docker-compose logs db

# Restart database container
docker-compose restart db
```

### Asset Build Issues

```bash
# Clear node modules and reinstall
docker-compose exec node rm -rf node_modules package-lock.json
docker-compose exec node npm install
```

## Phase 1 Completion Checklist

✅ Laravel project created in separate directory
✅ Livewire package installed via Composer
✅ Environment variables configured (.env file)
✅ Database connection set up (MySQL)
✅ Vite installed and configured for asset compilation
✅ Version control set up (Git)
✅ Docker configuration added (Dockerfile, docker-compose.yml)

## Next Steps (Phase 2)

- Migrate existing static HTML/CSS/JS portfolio to Livewire components
- Create database models for portfolio content
- Implement dynamic content management
- Set up authentication if needed
- Deploy to production environment

## Support

For issues or questions, please open an issue on the GitHub repository.

## License

This project is open source and available under the MIT License.
