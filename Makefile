help:
	@echo "help     - napoveda"
	@echo "sitemap  - aktualizuje mapu stranek"
	@echo "obrmap   - aktualizuje mapu obrázků"
	@echo "trikimg  - aktualizuje mapu obrázků z triků"
	@echo "fupdate  - aktualizuje db pro fulltextove hledani"
	@echo "test     - otestuje funkčnost stranek"
	@echo "backup   - vytvori zalohu na flash disk"
	@echo "datasync - zalohuje data uzivatelu"
	@echo "clean    - smaze archiv se zmenenymi soubory"

sitemap:
	./scripts/sitemap.sh

obrmap:
	./scripts/sitemap-obrazky.sh

trikimg:
	./scripts/sitemap-trik-img.sh

fupdate:
	./scripts/fulltext-update.sh

test:
	./scripts/tests/zavislosti.sh
	./scripts/tests/tests.pl

backup:
	./scripts/backup.sh

datasync:
	./scripts/datasync.sh
