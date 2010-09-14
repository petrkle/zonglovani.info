help:
	@echo "help     - napoveda"
	@echo "sitemap  - aktualizuje mapu stranek"
	@echo "upload   - nahraje zmenene soubory na ftp"
	@echo "time     - soubory zmenene pred timto datem nebudou nahrany na ftp"
	@echo "fupdate  - aktualizuje db pro fulltextove hledani"
	@echo "tests    - otestuje html validitu stranek"
	@echo "backup   - vytvori zalohu na flash disk"
	@echo "archiv   - vytvori archiv se zmenenymi soubory"
	@echo "clean    - smaze archiv se zmenenymi soubory"

sitemap:
	./scripts/sitemap.sh

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

archiv:
	./scripts/archiv.sh

clean:
	rm -v ????-??-??.tar.gz