#!/usr/bin/make
SHELL = /bin/bash

init:
	cp .env.sample .env && cp .app.env.sample .app.env &&  make tls && docker-compose -f docker-compose.yml up -d --build && docker-compose cp cron:/app/vendor . && make up
tls:
	mkcert -cert-file .docker/traefik/certs/local-cert.pem -key-file .docker/traefik/certs/local-key.pem "podlodka.localhost" "*.podlodka.localhost" && mkcert -install
up:
	docker-compose up -d
build:
	 docker build --build-arg UID=$(id -u) --build-arg GID=$(id -g) -f .docker/php/Dockerfile .
lint:
	 docker run --rm -i hadolint/hadolint < .docker/php/Dockerfile
blint1:
	docker run --rm -i hadolint/hadolint < .docker/examples/badlint/Dockerfile
blint2:
	 docker run --rm -i hadolint/hadolint < .docker/examples/badlint/Dockerfile1
dive:
	dive crew-cron:latest
trivy:
	trivy image crew-cron:latest
mail:
	docker-compose exec cron php app.php mail Name
pdf:
	docker-compose exec cron php app.php pdf https://wikipedia.org
target1:
	docker build --target=app_php --tag=crew:0.0.1 -f .docker/php/Dockerfile .
target2:
	docker build --target=app_php_dev --tag=crew:0.0.1 -f .docker/php/Dockerfile .
