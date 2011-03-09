VERSION=0.2

help:
	@echo "help     - napoveda"
	@echo "offline  - vytvori offline verzi"
	@echo "book     - vytvori opf soubor"
	@echo "mobi     - vytvori mobi soubor"
	@echo "img      - prida ramecek k obrazkum"
	@echo "clean    - smaze generovane adresare"

offline:
	./stahni.sh
	./uprav.sh
	./zabal.sh

book:
	./book.sh ${VERSION}

mobi:
	cd zs && kindlegen -c1 -unicode slabikar.opf -o zongleruv-slabikar-${VERSION}.mobi && cd ..

img:
	find zs/img/ -name "*.png" -o -name "*.jpg" -exec convert \{\} -colorspace Gray -shave 1x1 -bordercolor black -border 1 \{\} \;

clean:
	rm -rf zongleruv-slabikar zongleruv-slabikar*.tar.bz2 zs
