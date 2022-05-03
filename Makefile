export DOCKER_IMAGE_NAME := "lfi-lab"

build:
	docker-compose build

run:
	docker-compose up -d

connect:
	docker-compose exec -it lfi-lab bash

stop:
	docker-compose down

kill:
	./scripts/docker_kill.sh

