VERSION=0.4

help:
	@echo "zip   - vytvori offline verzi pro nahrani na phonegap.com"
	@echo "clean - smaze generovane adresare"
	@echo "help  - napoveda"

zip:
	./stahni.sh
	./uprav.sh
	./fixlinks.sh
	./zabal.sh ${VERSION}

clean:
	rm -rf zongleruv-slabikar zongleruv-slabikar*.zip
