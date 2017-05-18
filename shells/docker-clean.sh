#!/bin/bash

docker-compose down
docker volume rm $(docker volume ls -q)
docker rmi $(docker images -a)
docker network rm $(docker network ls -q)