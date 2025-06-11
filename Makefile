# 🔧 Projekt-Setup für eMatChef

start:
	docker-compose up --build

stop:
	docker-compose down

backend-shell:
	docker exec -it ematchef_backend bash

migrate:
	docker exec -it ematchef_backend php bin/console doctrine:migrations:migrate --no-interaction

reset-db:
	docker exec -it ematchef_backend php bin/console doctrine:database:drop --force
	docker exec -it ematchef_backend php bin/console doctrine:database:create
	docker exec -it ematchef_backend php bin/console doctrine:migrations:migrate --no-interaction

logs:
	docker-compose logs -f

clean:
	docker-compose down -v
	docker system prune -f

.PHONY: start stop migrate reset-db logs clean backend-shell