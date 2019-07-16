help:
	@echo "help     - napoveda"
	@echo "test     - otestuje funkčnost stranek"
	@echo "fix      - php coding style fix"

test:
	./scripts/tests/zavislosti.sh
	./scripts/tests/tests.pl

fix:
	rm -f tmp/templates_c/*
	php-cs-fixer fix .
