FROM php:8.4.27-cli

# Herramientas que necesita Composer para descomprimir paquetes
RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip git \
    && rm -rf /var/lib/apt/lists/*

# Composer desde su imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Dependencias de ejecución (sin las de desarrollo)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts --no-autoloader

# Código de la aplicación
COPY src/ ./src/
COPY public/ ./public/
RUN composer dump-autoload --optimize --no-dev

# Usuario sin privilegios
RUN useradd --system --no-create-home appuser
USER appuser

EXPOSE 8000

HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
  CMD php -r "exit(@file_get_contents('http://127.0.0.1:8000/health') === false ? 1 : 0);"

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public", "public/index.php"]