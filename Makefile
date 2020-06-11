.PHONY: up down log tinker artisan
include .env
export

ART=""
artisan:
	@php artisan $(ART)

storage-link:
	@php artisan storage:link

key-generate:
	@php artisan key:generate

install:
	@composer install

migrate:
	@php artisan migrate

fresh-seed:
	@php artisan migrate:fresh --seed

passport-install:
	@php artisan passport:install

l-check:
	@php artisan l:check

l-fix:
	@php artisan l:fix

dump-server:
	@php artisan dump-server

test:
	@vendor/bin/phpunit

test-dusk:
	@php artisan dusk

BRANCH="develop"
pull-and-push:
	@git pull origin $(BRANCH) && git push origin $(BRANCH)
