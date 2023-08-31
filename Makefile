build-local:
	docker-compose build

up-local:
	docker-compose up -d

down-local:
	docker-compose down

bl: build-local
ul: up-local
dl: down-local

dump-autoload:
	composer dump-autoload

test:
	composer test

test-cov-text:
	composer exec --verbose phpunit tests -- --coverage-text

test-cov-html:
	composer exec --verbose phpunit tests -- --coverage-html coverage
