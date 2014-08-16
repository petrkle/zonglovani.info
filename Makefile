help:
	@echo "help     - napoveda"
	@echo "sitemap  - aktualizuje mapu stranek"
	@echo "fupdate  - aktualizuje db pro fulltextove hledani"
	@echo "test     - otestuje funkčnost stranek"
	@echo "backup   - vytvori zalohu na flash disk"
	@echo "datasync - zalohuje data uzivatelu"

sitemap:
	./scripts/sitemap.sh

fupdate:
	./scripts/fulltext-update.sh

test:
	./scripts/tests/zavislosti.sh
	./scripts/tests/tests.pl

backup:
	./scripts/backup.sh

datasync:
	./scripts/datasync.sh
