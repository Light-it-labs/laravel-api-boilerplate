.PHONY: up down log tinker artisan
include .env
export

containers:
	docker-compose -f docker-compose.yml up -d

kill-containers:
	docker-compose down --remove-orphans

ART=""
artisan:
	@docker-compose exec --user=apache app php artisan $(ART)

storage-link:
	@docker-compose exec --user=apache app php artisan storage:link

key-generate:
	@php artisan key:generate

install:
	@docker-compose exec --user=apache app composer install
	@docker-compose exec --user=apache app yarn

migrate:
	@php artisan migrate

fresh-seed:
	@docker-compose exec --user=apache app php artisan migrate:fresh --seed

passport-install:
	@docker-compose exec --user=apache app php artisan passport:install

l-check:
	@docker-compose exec --user=apache app php artisan l:check

l-fix:
	@docker-compose exec --user=apache app php artisan l:fix

dump-server:
	@php artisan dump-server

test:
	@docker-compose exec --user=apache app vendor/bin/phpunit

test-dusk:
	@docker-compose exec --user=apache app php artisan dusk

BRANCH="develop"
pull-and-push:
	@git pull origin $(BRANCH) && git push origin $(BRANCH)
