# Shopee crawler for interview

## Getting Started

### Required
PHP 

### Installation
1. Clone this repository
   ```
   git clone https://github.com/HsiangTseng/ShopeeCrawler.git
   ```
2. Install the libraries by Composer
   ```
   composer install
   ```
3. Copy the .env and generate the application key
   ```
   cp .env.example .env
   php artisan key:generate
   ```

### Usage
1. Turn on the local server
   ```
   php artisan serve
   ```
2. visit the url on browser 
   - http://127.0.0.1:8000/shopee/product/{page}
   - Example: http://127.0.0.1:8000/shopee/product/1
   - or visit the page which I deployed on heroku https://big-go-shopee-crawler.herokuapp.com/shopee/product/1
