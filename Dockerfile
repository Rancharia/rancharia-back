# Dockerfile
FROM php:8.2-fpm

# 1) Instala dependências do sistema e extensões PHP
RUN apt-get update \
    && apt-get install -y \
       git \
       unzip \
       libzip-dev \
       libpng-dev \
       libonig-dev \
       libxml2-dev \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

    # 2) Instala Node.js (v22.x) e npm via NodeSource
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
&& apt-get update \
&& apt-get install -y nodejs \
&& rm -rf /var/lib/apt/lists/*

# 2) Composer sem cache de memória e sem warnings de superuser
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_MEMORY_LIMIT=-1

# 3) Instala Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4) Define diretório de trabalho
WORKDIR /var/www/html

# 5) Copia apenas composer.json/composer.lock para cache
COPY composer.json composer.lock ./

# 6) Instala dependências sem rodar scripts (artisan ainda não está aqui)
RUN composer install \
    --no-dev \
    --no-scripts \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist

# 7) Copia o restante do código (inclui artisan, rotas, etc)
COPY . .

# 8) Agora que o artisan está presente, execute os scripts que precisam dele
RUN composer dump-autoload --optimize \
 && php artisan package:discover --ansi


# 9) Ajusta permissões de pasta
RUN chown -R www-data:www-data storage bootstrap/cache

RUN npm install && npm run build

# 10) Port e comando padrão
EXPOSE 9000
CMD ["php-fpm"]
