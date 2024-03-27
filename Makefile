install:
	composer install
validate:
	composer validate
fix:
	composer exec --verbose phpcbf src bin
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-games:
	./bin/brain-games
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc
brain-nod:
	./bin/brain-calc
brain-progression:
	./bin/brain-progression