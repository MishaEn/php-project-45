install:
	composer install
validate:
	composer validate
fix:
	composer exec --verbose phpcbf src bin
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-games:
	php bin/brain-games.php