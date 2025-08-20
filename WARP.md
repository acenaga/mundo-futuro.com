# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Overview
This is a Laravel 12 blog application built with PHP 8.2+. The application features posts, categories, comments, courses, and user authentication. It uses Livewire for interactive components, TailwindCSS for styling, and includes a content management dashboard.

## Common Development Commands

### Setup & Environment
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies  
npm install

# Copy environment file (if needed)
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### Development Server
```bash
# Start Laravel development server
php artisan serve

# Start Vite development server (for assets)
npm run dev

# Build production assets
npm run build
```

### Code Quality & Testing
```bash
# Run code formatter (Laravel Pint)
composer run format
# OR
./vendor/bin/pint

# Run static analysis (PHPStan at level 5)
composer run analyse
# OR  
./vendor/bin/phpstan analyse

# Run all tests
php artisan test
# OR
./vendor/bin/phpunit

# Run specific test file
./vendor/bin/phpunit tests/Feature/ExampleTest.php

# Run specific test method
./vendor/bin/phpunit --filter testBasicTest
```

### Database Operations
```bash
# Create new migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Refresh database with seeds
php artisan migrate:refresh --seed

# Create seeder
php artisan make:seeder TableSeeder
```

### Laravel Artisan Commands
```bash
# Create model with migration and factory
php artisan make:model ModelName -mf

# Create controller
php artisan make:controller ControllerName

# Create Livewire component
php artisan make:livewire ComponentName

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Architecture Overview

### Core Models & Relationships
The application follows Laravel's Eloquent ORM patterns with these main entities:

- **User**: Authentication model with roles (using Spatie/Laravel-Permission)
  - hasMany: Posts, Comments
  - Uses: HasRoles trait

- **Post**: Blog posts with slugs and tags
  - belongsTo: User, Category
  - hasMany: Comments
  - Uses: Sluggable, HasTags traits

- **Category**: Post categorization with slugs
  - hasMany: Posts
  - Uses: Sluggable trait

- **Comment**: User comments on posts
  - belongsTo: User, Post

- **Course**: Educational content (appears to be in development)

### Key Packages & Features
- **Sluggable URLs**: Uses `cviebrock/eloquent-sluggable` for SEO-friendly URLs
- **Tagging System**: Uses `spatie/laravel-tags` for post tagging
- **Permissions**: Uses `spatie/laravel-permission` for user roles
- **Code Highlighting**: Uses `torchlight/torchlight-laravel` for syntax highlighting
- **Livewire Components**: Interactive frontend components without JavaScript
- **Laravel Breeze**: Authentication scaffolding

### Frontend Stack
- **TailwindCSS**: Utility-first CSS framework
- **Alpine.js**: Minimal JavaScript framework  
- **Vite**: Build tool and dev server
- **CKEditor 5**: Rich text editor for content creation

### Directory Structure
- `app/Http/Controllers/`: Standard Laravel controllers
- `app/Livewire/`: Livewire components (FormNewsletter, Slider)
- `app/Models/`: Eloquent models with relationships
- `resources/views/`: Blade templates organized by feature
- `routes/web.php`: Web routes with auth middleware groups

### Authentication & Authorization
The application uses Laravel Breeze for authentication with role-based permissions. Protected routes are grouped under `auth` middleware, leading to a `/dashboard` area for content management.

### Content Management
The dashboard provides CRUD operations for:
- Posts (with image uploads and CKEditor)
- Categories 
- Tags
- Image management for posts

## Code Standards
- **Strict Types**: All PHP files use `declare(strict_types=1)`
- **Laravel Pint**: Code formatting with custom rules for class attribute separation
- **PHPStan**: Static analysis at level 5 with Larastan extension
- **PSR-4**: Autoloading following Laravel conventions

## Testing Setup
- PHPUnit configuration with Feature and Unit test suites
- Laravel Breeze authentication tests included
- Test environment configured for array cache/session drivers
- Database seeding available via factories for all models
