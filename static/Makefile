VERSION=0.4

help:
	@echo "help     - napoveda"
	@echo "offline  - vytvori offline verzi"
	@echo "book     - vytvori elektronickou knihu - soubor mobi"
	@echo "msiprep  - priprava pro vytvoreni msi baliku"
	@echo "pdfprep  - priprava pro vytvoreni msi baliku"
	@echo "clean    - smaze generovane adresare"

offline:
	./stahni.sh
	./uprav.sh
	./zabal.sh ${VERSION}

msiprep:
	./stahni.sh
	./uprav.sh
	rm -rf msi/zongleruv-slabikar
	mv -vi zongleruv-slabikar msi

pdfprep:
	./stahni.sh
	./uprav.sh
	rm -rf pdfa5//zongleruv-slabikar
	mv -vi zongleruv-slabikar pdfa5

book:
	./book.sh ${VERSION}
	find zs/img/ -name "*.png" -exec convert -colorspace Gray -shave 1x1 -bordercolor black -border 1 \{\} \{\} \;
	find zs/img/ -name "*.jpg" -exec convert -colorspace Gray -shave 1x1 -bordercolor black -border 1 \{\} \{\} \;
	cd zs && kindlegen -c1 -rebuild slabikar.opf -o zongleruv-slabikar-${VERSION}.mobi && cd ..

clean:
	rm -rf zongleruv-slabikar zongleruv-slabikar*.tar.bz2 zs
