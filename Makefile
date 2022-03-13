php=php artisan
## start
start:
	${php} serve

start-watch:
	(trap 'kill 0' INT; make start & yarn watch)

## migration
migration:
	@read -p "What is your migration name: " MIGRATE\
		&& ${php} make:migration "$${MIGRATE}"

migrate:
	${php} migrate

rollback:
	${php} migrate:rollback
