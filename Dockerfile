FROM php:8.1.3

RUN apt-get update -y && apt-get install -y openssl zip unzip git procps iputils-ping npm
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY . .

##Install requirements
RUN composer install
RUN npm install

##Prepare environment
COPY .env.example .env
RUN php artisan key:generate
RUN php artisan optimize
RUN php artisan migrate
RUN php artisan db:seed

## Initialize server
CMD php artisan serve --host=0.0.0.0 

EXPOSE 80