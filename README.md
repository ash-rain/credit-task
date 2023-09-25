# Credit Task

## 1. Installation

### 1.1. Copy and modify .env
`cp .env.example .env`

### 1.2. Install dependencies
```
composer install
./vendor/bin/sail up -d
./vendor/bin/sail php artisan migrate
./vendor/bin/sail npm run build
```
