install:
	composer install

setup: install
	composer run-script --working-dir=vendor/felixfbecker/language-server parse-stubs

lint:
	composer run-script phpcs -- --standard=PSR12 src tests

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src tests

test:
	composer run-script phpunit tests
