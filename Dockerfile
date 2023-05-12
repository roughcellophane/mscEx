FROM php:apache

COPY ;/main/index.php

RUN docker-php-ext-install mysqli

EXPOSE 80
