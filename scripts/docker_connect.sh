#!/bin/bash
# This script handles connecting to the docker container

# This really should be done using the envvar DOCKER_IMAGE_NAME but I can't figure it out
docker exec -it $(docker ps | grep lfi-lab | awk {'print $1'}) bash
