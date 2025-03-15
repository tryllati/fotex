.PHONY: up down restart migrate seed cache logs

# Docker konténerek indítása
up:
	docker-compose up -d --build

# Konténerek leállítása és törlése
down:
	docker-compose down -v

# Újraindítás teljes körű migrációval
restart: down up

# Csak migráció és seed
migrate:
	docker-compose exec php php artisan migrate

seed:
	docker-compose exec php php artisan db:seed

# Cache törlése és frissítése
cache:
	docker-compose exec php php artisan cache:clear
	docker-compose exec php php artisan config:clear
	docker-compose exec php php artisan route:clear
	docker-compose exec php php artisan view:clear

# Logok megtekintése
logs:
	docker-compose logs -f
