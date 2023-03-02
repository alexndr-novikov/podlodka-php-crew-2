FROM golang:1.13-alpine3.12 as builder

COPY ./go.mod go.mod
RUN go mod download

COPY ./main.go .
RUN go build -v -o rr main.go

FROM php:8.2-cli-alpine3.17

COPY --from=builder /var/www/aim/rr ./
