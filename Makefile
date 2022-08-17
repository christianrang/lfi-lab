export DOCKER_IMAGE_NAME := "lfi-lab"

build:
	docker-compose build

run: build
	docker-compose up -d

connect:
	docker-compose exec -it nginx bash

stop:
	docker-compose down
