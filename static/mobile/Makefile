COMPRESS=java -jar $(HOME)/lib/htmlcompressor-1.5.3.jar --compress-js --compress-css --remove-surrounding-spaces min -r -m '*.html' -o
VERSION=1.3

help:
	@echo "cordova   - vytvori offline verzi pro Apache Cordova"
	@echo "firefox   - vytvori offline verzi pro Firefox OS"
	@echo "clean - smaze generovane adresare"
	@echo "help  - napoveda"

cordova:
	./stahni.sh
	./uprav.sh
	./fixlinks.sh
	$(COMPRESS) zongleruv-slabikar zongleruv-slabikar
	./a-img.sh
	rm -rf android/assets && mkdir android/assets && mv zongleruv-slabikar android/assets/www
	cd android/ && gradle assembleRelease

clean:
	rm -rf zongleruv-slabikar zongleruv-slabikar-*.zip
	cd android && gradle clean
