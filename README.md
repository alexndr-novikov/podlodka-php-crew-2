# Podlodka PHP Crew #2 livecoding "Just Dockerize it!" code example

## To launch the example

1) Make sure ports 80, 443 and 5432 are not allocated yet (Traefik requires them in current configuration)
2) Install [mkcert](https://github.com/FiloSottile/mkcert)
3) Run `make up`. It will:
    - copy .env and .env.app from samples
    - generate certificates
    - run docker with docker-compose.yml configuration (without volumes)
    - copy vendor dir from running php container to host
    -
