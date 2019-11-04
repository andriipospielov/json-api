COMPOSE_PROJECT_NAME?=json-api
COMPOSE_FILE?=docker/docker-compose.yml


build:
	docker-compose -p ${COMPOSE_PROJECT_NAME} -f ${COMPOSE_FILE} build --no-cache --force-rm

run:
	docker-compose -p ${COMPOSE_PROJECT_NAME} -f ${COMPOSE_FILE} up --detach

stop:
	docker-compose -p ${COMPOSE_PROJECT_NAME} -f ${COMPOSE_FILE} down

cli:
	docker exec -it  json-api-php-fpm bash
