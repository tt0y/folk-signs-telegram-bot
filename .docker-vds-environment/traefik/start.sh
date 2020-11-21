#!/usr/bin/env bash

# more info
# https://habr.com/ru/post/508636/
# https://www.digitalocean.com/community/tutorials/how-to-use-traefik-as-a-reverse-proxy-for-docker-containers-on-ubuntu-18-04-ru

# create network
docker network create web

#run the traefik container
docker run -d \
  -v /var/run/docker.sock:/var/run/docker.sock \
  -v $PWD/traefik.toml:/traefik.toml \
  -v $PWD/acme.json:/acme.json \
  -p 80:80 \
  -p 443:443 \
  -l traefik.frontend.rule=Host:monitor.thesigns.ru \
  -l traefik.port=8080 \
  --network web \
  --name traefik \
  traefik:1.7.26-alpine

#run all other conainers
docker-compose up -d

echo "
===================== 🚀 Done 🚀 ===================
    You are now in a php container. Available here:
	composer
	php artisan
	crontab
	supervisor
	npm

    --------------------------------------------

    Web server:   	https://primetki.ru
    Adminer:	   	https://db-admin.primetki.ru
    Traefic dashboard	https://monitor.primetki.ru
===================== 🚀 Done 🚀 ===================
"

docker exec -t -i dphp bash
