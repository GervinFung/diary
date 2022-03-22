## setup
install:
	yarn && composer install

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
controller:
	@read -p "What is your controller name: " CONTROLLER\
		&& ${php} make:controller "$${CONTROLLER}"
## model
model:
	@read -p "What is your model name: " MODEL\
		&& ${php} make:model "$${MODEL}"
