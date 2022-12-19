cp_env:
	@echo "Coping Backend local envs"
	cp ../.env.local ../.env
	cp .env.local .env
	cp nginx/sites/local.conf.example nginx/sites/default.conf

up:
	@echo "App Backend Up"
	docker-compose up -d

bash:
	@echo "App Backend workspace bash"
	docker-compose exec workspace bash

log:
	@echo "App Backend Logs"
	docker-compose logs

down:
	@echo "App Backend down"
	docker-compose down --remove-orphans

composer_install:
	@echo "Composer Backend Install"
	docker-compose run --rm workspace composer install --optimize-autoloader --no-interaction --ansi

composer_dump:
	@echo "Composer Backend dumpautoload"
	docker-compose run --rm workspace composer dumpautoload --no-interaction --ansi

build:
	@echo "App Backend compose build"
	docker-compose build

full_build:
	@echo "Start local Backend full build"
	make cp_env
	make build
	make composer_install
	make up

install:
	@echo "App Backend install"
	make full_build
	docker-compose run --rm workspace php artisan migrate:fresh
	docker-compose run --rm workspace php artisan db:seed --class=BookSeeder

deploy:
	@echo "Start local Backend deploy"
	make full_build
	docker-compose run --rm workspace php artisan view:cache
	docker-compose run --rm workspace php artisan config:cache
	docker-compose run --rm workspace php artisan down
	docker-compose run --rm workspace php artisan migrate
	docker-compose run --rm workspace php artisan queue:restart
	docker-compose run --rm workspace php artisan up
	docker-compose restart workspace
