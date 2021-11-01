## NoOne

```bash
# Установка зависимостей
composer install

# ФАйл настроек
cp .env.example .env

# Установка NPM пакетов
npm ci

# Сборка 
npm run prod

# Установка ключа
php artisan key:generate

# Миграция
php artisan migrate --seed

# Запуск сервера
php artisan serve

# Запуск воркера очередей
php artisan queue:work
```