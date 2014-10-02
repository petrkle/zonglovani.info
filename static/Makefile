VERSION=$(shell cat VERSION).0

help:
	@echo "help     - napoveda"
	@echo "offline  - vytvori offline verzi"
	@echo "book     - vytvori elektronickou knihu - soubor mobi"
	@echo "msiprep  - priprava pro vytvoreni msi baliku"
	@echo "pdfprep  - priprava pro vytvoreni pdf souboru"
	@echo "clean    - smaze generovane adresare"

offline:
	./stahni.sh
	./uprav.sh
	./mobile/fixlinks.sh
	./zabal.sh ${VERSION}

msiprep:
	./stahni.sh
	./uprav.sh
	./mobile/fixlinks.sh
	rm -rf msi/zongleruv-slabikar
	mv -vi zongleruv-slabikar msi

pdfprep:
	./stahni.sh
	./uprav.sh

book:
	./book.sh ${VERSION}
	find zs/img/ -name "*.png" -exec convert -colorspace Gray -shave 1x1 -bordercolor black -border 1 \{\} \{\} \;
	find zs/img/ -name "*.jpg" -exec convert -colorspace Gray -shave 1x1 -bordercolor black -border 1 \{\} \{\} \;
	cd zs && kindlegen -c1 slabikar.opf -o zongleruv-slabikar-${VERSION}.mobi && cd ..

clean:
	rm -rf zongleruv-slabikar zongleruv-slabikar*.tar.bz2 zs msi/zongleruv-slabikar
