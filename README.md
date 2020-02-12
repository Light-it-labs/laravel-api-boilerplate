# Laravel API Template
Laravel API template is a boilerplate Laravel project. It follows the community best practices in terms of standards, security and maintainability, integrating a variety of testing and code quality tools. It's based on Laravel 5.8.


## Installed packages
- [Backpack](https://backpackforlaravel.com/) for easy administration.
- [Laravel Telescope](https://laravel.com/docs/5.8/telescope) for easy debugging.
- [Laravel Query Detector](https://github.com/beyondcode/laravel-query-detector) to detect N+1 and increase performance.

## Detecting and fixing coding standard violations
Checking coding standard violations:
```bash
php artisan l:check
```
Fixing coding standard violations
```bash
php artisan l:fix
```

## Build Setup

```bash
# create .env configuration file
$ cp .env.example .env

# setup docker containers
$ docker-compose up -d

# install dependices
$ make install

# generate laravel app key
$ make key-generate

# generate symlink to storage
$ make storage-link

# run migration and seeders
make fresh-seed

# install passport client keys
make passport-install
```

## About Lightit
[Light-it](https://lightit.io) is a software development company with offices in Uruguay and Paraguay. 

![alt text](https://lightit.io/images/solo-logo.png)
