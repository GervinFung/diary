## start
start:
	php artisan serve

start-watch:
	(trap 'kill 0' INT; make start & yarn watch)
