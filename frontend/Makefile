up:
	@echo "App Frontend Up"
	docker-compose up -d

bash:
	@echo "App Frontend bash"
	docker-compose exec bookskingdom-frontend bash

log:
	@echo "App Frontend Logs"
	docker-compose logs

down:
	@echo "App Frontend down"
	docker-compose down --remove-orphans

build:
	@echo "App Frontend compose build"
	docker-compose build

full_build:
	@echo "Start Frontend local full build"
	make build
	make up

deploy:
	@echo "Start Frontend local deploy"
	make full_build
	docker-compose restart bookskingdom-frontend

restart:
	docker-compose restart bookskingdom-frontend
