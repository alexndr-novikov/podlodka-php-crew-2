# Container to build frontend
FROM node:16-alpine3.16 as builder

RUN apk update \
    && apk add --no-cache \
    nss \
    curl  \
    libcurl \
    yarn \
    git \
    openssh-client \
    wget \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

COPY ./package.json /var/www
COPY ./yarn.lock /var/www

RUN yarn install --silent

COPY ./ /var/www
RUN yarn build

FROM nginx:1.23-alpine as fe-server

COPY --from=builder /var/www/build /usr/share/nginx/html
COPY ./docker/nginx/server.conf /etc/nginx/conf.d/default.conf
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

EXPOSE 11211
