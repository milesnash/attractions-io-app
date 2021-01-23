FROM php:8.0-fpm

LABEL name="attractions-io-app"

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip

RUN docker-php-ext-install \
    zip

WORKDIR /usr/src/app

COPY app /usr/src/app

RUN PATH=$PATH:/usr/src/app/vendor/bin:bin

ENV COMPOSER_VERSION 2.0.8

RUN set -eux; \
    php -r " \
    copy('https://getcomposer.org/installer', 'composer-setup.php'); \
    if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { \
        echo 'Installer verified' . PHP_EOL; \
    } else { \
        echo 'Installer corrupt'; \
        unlink('composer-setup.php'); \
        exit(1); \
    }"; \
    php composer-setup.php --no-ansi --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION}; \
    php -r "unlink('composer-setup.php');";
