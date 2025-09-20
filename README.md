# Socially - A Social Blogging Platform

A modern social blogging platform built with Laravel 12, featuring user authentication, post creation, following system, and interactive features like clapping on posts.

## 🚀 Features

### Core Functionality
- **User Authentication & Registration** - Complete user management with email verification
- **Blog Post Management** - Create, edit, delete, and view blog posts
- **Media Management** - Image uploads with automatic resizing and optimization
- **Social Features** - Follow/unfollow users, clap on posts
- **Category System** - Organize posts by categories
- **User Profiles** - Public and private profile management
- **Responsive Design** - Mobile-first design with Tailwind CSS

### Technical Features
- **Laravel 12** - Latest Laravel framework
- **SQLite Database** - Lightweight database for development
- **Spatie Media Library** - Advanced media management
- **Slug Generation** - SEO-friendly URLs
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Modern build tool
- **Pest Testing** - Modern PHP testing framework

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite (or MySQL/PostgreSQL)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd socially
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
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
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

## 🗄️ Database Schema

### Users Table
- `id` - Primary key
- `username` - Unique username
- `name` - Display name
- `email` - Email address (unique)
- `email_verified_at` - Email verification timestamp
- `image` - Profile image path
- `bio` - User biography
- `password` - Hashed password
- `remember_token` - Remember me token
- `created_at`, `updated_at` - Timestamps

### Posts Table
- `id` - Primary key
- `image` - Post image path (nullable)
- `title` - Post title
- `slug` - SEO-friendly URL slug (unique)
- `content` - Post content (long text)
- `category_id` - Foreign key to categories
- `user_id` - Foreign key to users
- `published_at` - Publication timestamp (nullable)
- `created_at`, `updated_at` - Timestamps

### Categories Table
- `id` - Primary key
- `name` - Category name
- `created_at`, `updated_at` - Timestamps

### Followers Table
- `id` - Primary key
- `user_id` - User being followed
- `follower_id` - User doing the following
- `created_at` - Follow timestamp

### Claps Table
- `id` - Primary key
- `post_id` - Post being clapped
- `user_id` - User doing the clapping
- `created_at` - Clap timestamp

### Media Table (Spatie Media Library)
- `id` - Primary key
- `model_type` - Model type (polymorphic)
- `model_id` - Model ID (polymorphic)
- `uuid` - Unique identifier
- `collection_name` - Media collection name
- `name` - Original file name
- `file_name` - Stored file name
- `mime_type` - File MIME type
- `disk` - Storage disk
- `size` - File size
- `manipulations` - Image manipulations (JSON)
- `custom_properties` - Custom properties (JSON)
- `generated_conversions` - Generated conversions (JSON)
- `responsive_images` - Responsive images (JSON)
- `order_column` - Sort order
- `created_at`, `updated_at` - Timestamps

## 🎯 Key Features Explained

### User Management
- **Registration & Login** - Standard Laravel Breeze authentication
- **Email Verification** - Required for account activation
- **Profile Management** - Users can update their profile information
- **Avatar Upload** - Profile pictures with automatic resizing (128x128px)

### Post Management
- **CRUD Operations** - Full create, read, update, delete functionality
- **Image Upload** - Post images with multiple conversion sizes (400px preview, 1200px large)
- **Slug Generation** - Automatic SEO-friendly URL generation
- **Category Assignment** - Posts must be assigned to a category
- **Publishing Control** - Posts can be scheduled for future publication
- **Read Time Calculation** - Automatic reading time estimation

### Social Features
- **Follow System** - Users can follow/unfollow other users
- **Clap System** - Users can clap on posts (like system)
- **Feed Algorithm** - Dashboard shows posts from followed users
- **Public Profiles** - View other users' profiles and posts

### Media Management
- **Spatie Media Library** - Advanced media handling
- **Image Conversions** - Automatic image resizing and optimization
- **Multiple Collections** - Separate collections for avatars and post images
- **File Validation** - Image type and size validation

## 🧪 Testing

The application uses Pest for testing with the following test coverage:

### Authentication Tests
- Login screen rendering
- User authentication
- Invalid password handling
- User logout

### Profile Tests
- Profile page display
- Profile information updates
- Email verification status
- Account deletion
- Password validation for deletion

### Running Tests
```bash
php artisan test
# or
./vendor/bin/pest
```

## 🎨 Frontend

### Technologies
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Modern build tool
- **Blade Templates** - Laravel's templating engine

### Key Components
- **Post Item** - Reusable post display component
- **User Avatar** - Profile picture display
- **Follow Controller** - Follow/unfollow functionality
- **Clap Button** - Post clapping functionality
- **Category Tabs** - Category navigation
- **Navigation** - Main site navigation

## 🔧 Development

### Available Commands
```bash
# Start development server with queue and Vite
composer run dev

# Run migrations
php artisan migrate

# Run tests
php artisan test

# Build assets
npm run build

# Watch assets
npm run dev
```

### Code Structure
```
app/
├── Http/
│   ├── Controllers/     # Application controllers
│   └── Requests/        # Form request validation
├── Models/              # Eloquent models
└── View/                # View components

resources/
├── css/                 # Tailwind CSS
├── js/                  # Alpine.js and JavaScript
└── views/               # Blade templates

database/
├── migrations/          # Database migrations
└── factories/           # Model factories

tests/
├── Feature/             # Feature tests
└── Unit/                # Unit tests
```

## 📱 API Endpoints

### Public Routes
- `GET /` - Dashboard (shows posts from followed users)
- `GET /@{username}` - Public user profile
- `GET /@{username}/{post-slug}` - Individual post view
- `GET /category/{category}` - Posts by category

### Authenticated Routes
- `GET /post/create` - Create post form
- `POST /post/create` - Store new post
- `GET /post/{post-slug}` - Edit post form
- `PUT /post/{post}` - Update post
- `DELETE /post/{post}` - Delete post
- `GET /my-posts` - User's own posts
- `POST /follow/{user}` - Follow/unfollow user
- `POST /clap/{post}` - Clap on post

### Profile Routes
- `GET /profile` - Edit profile
- `PATCH /profile` - Update profile
- `DELETE /profile` - Delete account

## 🔒 Security Features

- **CSRF Protection** - All forms protected against CSRF attacks
- **Authentication Required** - Sensitive operations require login
- **Email Verification** - Account activation required
- **Authorization** - Users can only edit their own posts
- **File Validation** - Strict image upload validation
- **SQL Injection Protection** - Eloquent ORM prevents SQL injection

## 🚀 Deployment

1. **Production Environment Setup**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Database Configuration**
   - Update `.env` with production database credentials
   - Run migrations: `php artisan migrate`

3. **Web Server Configuration**
   - Point document root to `public/` directory
   - Configure URL rewriting for Laravel

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests for new functionality
5. Submit a pull request

## 📞 Support

For support and questions, please open an issue in the repository.

---

**Built with ❤️ using Laravel 12, Tailwind CSS, and Alpine.js**
