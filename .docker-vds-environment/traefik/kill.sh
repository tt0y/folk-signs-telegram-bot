#!/usr/bin/env bash

docker-compose down && docker stop traefik && docker rm traefik
