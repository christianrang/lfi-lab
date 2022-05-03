#!/bin/bash
docker kill $(docker ps | grep lfi-lab | awk {'print $1'})
