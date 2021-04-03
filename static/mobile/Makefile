COMPRESS=java -jar $(HOME)/lib/htmlcompressor-1.5.3.jar --compress-js --compress-css --remove-surrounding-spaces min -r -m '*.html' -o
ASSETS=android/app/src/main/assets

help:
	@echo "apk    - vytvoří apk soubor"
	@echo "bundle - vytvoří bundle"
	@echo "clean  - smaže generovane adresare"
	@echo "help   - napoveda"

apk:
	./stahni.sh
	./uprav.sh
	./fixlinks.sh
	$(COMPRESS) zongleruv-slabikar zongleruv-slabikar
	./a-img.sh
	rm -rf $(ASSETS) && mkdir -p $(ASSETS) && mv zongleruv-slabikar $(ASSETS)/www
	cd android/ && gradle assembleRelease

bundle:
	cd android/ && gradle bundle

clean:
	rm -rf zongleruv-slabikar zongleruv-slabikar-*.zip
	cd android && gradle clean
