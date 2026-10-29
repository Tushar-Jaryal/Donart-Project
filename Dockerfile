FROM php:8.3-apache

RUN apt-get update \
	&& apt-get install -y --no-install-recommends libjpeg62-turbo-dev libpng-dev libfreetype6-dev \
	&& docker-php-ext-configure gd --with-jpeg --with-freetype \
	&& docker-php-ext-install -j"$(nproc)" gd mysqli \
	&& rm -rf /var/lib/apt/lists/* \
	&& a2enmod rewrite \
	&& sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf \
	&& { echo "upload_max_filesize=10M"; echo "post_max_size=12M"; echo "date.timezone=UTC"; } > /usr/local/etc/php/conf.d/donart.ini

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/uploads

EXPOSE 80
