# Folio Adrien

Personal finance dashboard powered by Laravel, Tailwind, and Alpine. It aggregates accounts, categories, and movements to provide a quick snapshot of spending and income trends.

## Stack

-   Laravel 11 + PHP 8.4
-   PostgreSQL for persistence
-   Tailwind CSS + Vite for the front-end pipeline

## Local Setup

```sh
cp .env.example .env
composer install --optimize-autoloader
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Docker Build & Push

When building on Apple Silicon and deploying to an `amd64` VPS, publish a multi-arch image so the remote host can pull a compatible manifest:

```sh
docker buildx create --use --name folio-builder
docker buildx inspect --bootstrap

docker buildx build \
	--platform linux/amd64,linux/arm64 \
	-t josemokeni/folio-adrien \
	-f Dockerfile.prod \
	--push .

docker buildx rm folio-builder
```

Drop `linux/arm64` if you only need `amd64`. Removing the temporary builder switches Docker back to its default builder.
