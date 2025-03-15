# PHP 8.4 fpm
FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    unzip \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*  # Takarítjuk az apt cache-t
	
# Futtasd a composer install-t (csak a szükséges csomagokat telepíti)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Másold be a vendor mappát
COPY . .

# Jogosultságok beállítása
RUN chown -R www-data:www-data /var/www/html

# Telepítjük a composer csomagokat
RUN composer install
