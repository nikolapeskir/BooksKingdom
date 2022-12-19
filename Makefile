BACKEND_DIR = '--directory=backend/laradock'
FRONTEND_DIR = '--directory=frontend'
BASE_URL = 'local.bookskingdom.io'
BACKEND_URL = 'https://${BASE_URL}'
FRONTEND_URL = 'http://${BASE_URL}:8082'

be_up:
	make ${BACKEND_DIR} up

be_down:
	make ${BACKEND_DIR} down

be_bash:
	make ${BACKEND_DIR} bash

fe_up:
	make ${FRONTEND_DIR} up

fe_down:
	make ${FRONTEND_DIR} down

fe_bash:
	make ${FRONTEND_DIR} bash

down:
	make be_down
	make fe_down

up:
	make be_up
	make fe_up
	@echo ${FRONTEND_URL}

deploy:
	@echo "Start local deploy"
	git reset --hard origin/main
	git pull
	make ${BACKEND_DIR} deploy
	make ${FRONTEND_DIR} deploy

install:
	make ${FRONTEND_DIR} up
	make ${BACKEND_DIR} install
	@echo "Frontend url:"
	@echo ${FRONTEND_URL}
	@echo "Backend url:"
	@echo ${BACKEND_URL}
