FROM php:7.4-fpm
MAINTAINER Kuznetsov Anton <ajusmith@gmail.com>
WORKDIR /var/www/html/flywert
RUN apt-get -o Acquire::Check-Valid-Until=false update && \
    apt-get install -y curl \
    mc \
    git \
    zlib1g-dev \
    libzip-dev \
    libpq-dev \
    libmagickwand-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_pgsql
RUN docker-php-ext-install pdo pdo_mysql
#Sockets for rabbitmq
RUN docker-php-ext-install sockets
#install imagic
#RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick
# install npm
RUN curl -sL https://deb.nodesource.com/setup_13.x | bash -
RUN apt-get install -y nodejs
RUN npm install
#install composer
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
&& curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
# Make sure we're installing what we think we're installing!
&& php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
&& php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --snapshot \
&& rm -f /tmp/composer-setup.*
RUN composer --version
