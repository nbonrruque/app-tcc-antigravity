#!/bin/bash

# Se não houver banco SQLite, cria um vazio (se for o caso)
if [ "$DB_CONNECTION" = "sqlite" ] && [ "$DB_DATABASE" = "/var/www/html/database/database.sqlite" ]; then
    if [ ! -f /var/www/html/database/database.sqlite ]; then
        touch /var/www/html/database/database.sqlite
        chown www-data:www-data /var/www/html/database/database.sqlite
    fi
fi

# Gera a chave se não existir (Render passará via variável, mas é bom ter fallback)
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --show
fi

# Roda as migrações (importante para o deploy)
php artisan migrate --force

# Limpa e gera cache das configurações
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Inicia o Apache em primeiro plano
exec apache2-foreground
