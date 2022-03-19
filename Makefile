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

## controller
# https://blog.shahednasser.com/implementing-rbac-in-laravel-tutorial/
controller:
	@read -p "What is your controller name: " CONTROLLER\
		&& ${php} make:controller "$${CONTROLLER}"
