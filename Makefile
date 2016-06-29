help:
	@echo "help     - napoveda"
	@echo "test     - otestuje funkčnost stranek"
	@echo "datasync - zalohuje data uzivatelu"

test:
	./scripts/tests/zavislosti.sh
	./scripts/tests/tests.pl

datasync:
	./scripts/datasync.sh
