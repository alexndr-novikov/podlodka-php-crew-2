# Podlodka PHP Crew #2 Livecoding Example: "Just Dockerize it!"

## Launching the Example

1) Install Docker (tested on Docker version 20.10.22 and Docker Compose version v2.15.1).
2) Ensure that ports 80, 443, and 5432 are not already allocated (Traefik requires them in the current configuration).
2) Install [mkcert](https://github.com/FiloSottile/mkcert)
3) Run `make init`. This will:
    - copy `.env` and `.env.app` from samples
    - generate certificates
    - run Docker with the `docker-compose.yml` configuration (without volumes)
    - copy the `vendor` directory from the running PHP container to the host
    - run Docker with both the `docker-compose.yml` and `docker-compose.local.yml` configurations (with volumes)
4) Visit [http://localhost:8082/](http://localhost:8082/) to view the Traefik admin dashboard.
5) Visit [https://podlodka.localhost/](https://podlodka.localhost/) to view the application.
6) Visit [https://mail.podlodka.localhost/](https://mail.podlodka.localhost/) to view the Mailhog admin.
7) Visit [https://s3.podlodka.localhost/](https://s3.podlodka.localhost/) to view the Minio admin (use `AWS_KEY` and `AWS_SECRET` from `.env` as credentials)
8) Create a `podlodka` bucket in Minio if you plan to test the code later.

#### To test linting with Hadolint, run:
```bash
make lint
make blint1
make blint2
```


#### To test security, run:
```bash
make trivy
```


#### To check image layers, run:
```bash
make dive
```


#### To test mail sending, run:
```bash
make mail
```


#### To test PDF generation + S3 combo (don't forget to create the podlodka bucket first in Minio), run:
```bash
make pdf
```

#### To turn off the local setup, run:
```bash
make down
```
