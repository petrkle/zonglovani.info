help:
	@echo "help     - napoveda"
	@echo "test     - otestuje funkčnost stranek"
	@echo "datasync - zalohuje data uzivatelu"
	@echo "fix      - php coding style fix"

test:
	./scripts/tests/zavislosti.sh
	./scripts/tests/tests.pl

datasync:
	./scripts/datasync.sh

fix:
	rm -f tmp/templates_c/*
	php-cs-fixer fix .
