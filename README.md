# CodeIgniter 4 Installation Guide

## Overview

CodeIgniter 4 is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.

## System Requirements

Before installing CodeIgniter 4, ensure your system meets the following requirements:

- **PHP Version**: 7.4 or newer (PHP 8.1+ recommended)
- **Extensions Required**:
  - `intl` extension
  - `mbstring` extension
  - `json` extension (usually enabled by default)
- **Extensions Recommended**:
  - `mysqlnd` (if using MySQL)
  - `curl`
  - `gd` or `imagick` (for image manipulation)
  - `fileinfo`
  - `xml`

## Installation Methods

### Method 1: Composer Installation (Recommended)

#### Prerequisites
- Install [Composer](https://getcomposer.org/) on your system

#### Steps
1. **Create a new CodeIgniter 4 project:**
   ```bash
   composer create-project codeigniter4/appstarter project-name
   ```

2. **Navigate to your project directory:**
   ```bash
   cd project-name
   ```

3. **Start the development server:**
   ```bash
   php spark serve
   ```

4. **Access your application:**
   - Open your browser and go to `http://localhost:8080`

### Method 2: Manual Installation

1. **Download CodeIgniter 4:**
   - Visit the [CodeIgniter 4 releases page](https://github.com/codeigniter4/CodeIgniter4/releases)
   - Download the latest stable release

2. **Extract and setup:**
   ```bash
   unzip CodeIgniter4-x.x.x.zip
   cd CodeIgniter4-x.x.x
   ```

3. **Install dependencies:**
   ```bash
   composer install
   ```

4. **Start the development server:**
   ```bash
   php spark serve
   ```

### Method 3: Git Clone

1. **Clone the repository:**
   ```bash
   git clone https://github.com/codeigniter4/CodeIgniter4.git
   cd CodeIgniter4
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Copy environment file:**
   ```bash
   cp env .env
   ```

4. **Start the development server:**
   ```bash
   php spark serve
   ```

## Initial Configuration

### Environment Configuration

1. **Copy the environment file:**
   ```bash
   cp env .env
   ```

2. **Edit the `.env` file:**
   ```bash
   nano .env
   ```

3. **Configure basic settings:**
   ```env
   # Environment
   CI_ENVIRONMENT = development

   # Application
   app.baseURL = 'http://localhost:8080'
   app.indexPage = ''

   # Database
   database.default.hostname = localhost
   database.default.database = your_database_name
   database.default.username = your_username
   database.default.password = your_password
   database.default.DBDriver = MySQLi
   ```

### Database Setup (Optional)

If you're using a database, configure it in your `.env` file:

```env
database.default.hostname = localhost
database.default.database = ci4_database
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix = 
database.default.port = 3306
```

## Project Structure

```
project-name/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   ├── Config/
│   └── ...
├── public/
│   ├── index.php
│   ├── css/
│   ├── js/
│   └── ...
├── writable/
├── tests/
├── vendor/
├── .env
├── spark
└── composer.json
```

## Important Directories

- **`app/`**: Contains your application code (controllers, models, views, config)
- **`public/`**: Web-accessible directory (document root)
- **`writable/`**: Directory for logs, cache, sessions, uploads
- **`vendor/`**: Composer dependencies
- **`tests/`**: Unit and integration tests

## Security Configuration

### 1. Set Proper Permissions

```bash
# Make writable directory writable
chmod -R 755 writable/
```

### 2. Environment Security

- Never commit your `.env` file to version control
- Set `CI_ENVIRONMENT = production` in production
- Generate encryption key:
  ```bash
  php spark key:generate
  ```

### 3. Hide Index.php (Apache)

Create/modify `.htaccess` in your public directory:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

For Nginx, add this to your server configuration:

```nginx
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
```

## Useful Commands

### Spark CLI Commands

```bash
# List all available commands
php spark list

# Create a controller
php spark make:controller UserController

# Create a model
php spark make:model UserModel

# Run migrations
php spark migrate

# Create a migration
php spark make:migration CreateUsersTable

# Clear cache
php spark cache:clear

# Start development server
php spark serve

# Start on specific host/port
php spark serve --host 0.0.0.0 --port 8081
```

## Troubleshooting

### Common Issues

1. **"intl extension not loaded"**
   - Install PHP intl extension: `sudo apt-get install php-intl` (Ubuntu/Debian)

2. **Permission denied on writable directory**
   - Fix permissions: `chmod -R 755 writable/`

3. **Database connection failed**
   - Check database credentials in `.env`
   - Ensure database server is running

4. **404 errors with clean URLs**
   - Check your `.htaccess` file
   - Enable mod_rewrite in Apache

### Debug Mode

For development, enable debug mode in `.env`:

```env
CI_ENVIRONMENT = development
```

This will display detailed error messages.

## Next Steps

1. **Read the Documentation**: Visit [CodeIgniter 4 User Guide](https://codeigniter.com/user_guide/)
2. **Create Your First Controller**: Start building your application
3. **Set Up Database**: Configure and create your database schema
4. **Explore Features**: Learn about routing, middleware, libraries, and helpers

## Resources

- **Official Documentation**: https://codeigniter.com/user_guide/
- **GitHub Repository**: https://github.com/codeigniter4/CodeIgniter4
- **Community Forum**: https://forum.codeigniter.com/
- **Discord Chat**: https://discord.gg/codeigniter

## Contributing

To contribute to CodeIgniter 4:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

CodeIgniter 4 is licensed under the MIT License. See the LICENSE file for details.

---

**Happy Coding with CodeIgniter 4!** 🚀
