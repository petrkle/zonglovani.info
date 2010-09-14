help:
	@echo "help     - napoveda"
	@echo "sitemap  - aktualizuje mapu stranek"
	@echo "archiv   - vytvori archiv se zmenenymi soubory"
	@echo "upload   - nahraje zmenene soubory na ftp"
	@echo "time     - soubory zmenene pred timto datem nebudou nahrany na ftp"
	@echo "fupdate  - aktualizuje db pro fulltextove hledani"
	@echo "tests    - otestuje html validitu stranek"
	@echo "backup   - vytvori zalohu na flash disk"

sitemap:
	./scripts/sitemap.sh

archiv:
	./scripts/archiv.sh

upload:
	./scripts/upload.sh

time:
	./scripts/set-date.sh

fupdate:
	./scripts/fulltext-update.sh

tests:
	./scripts/tests.sh

backup:
	./scripts/backup.sh
