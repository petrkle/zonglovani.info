VERSION=0.3

book:
	./priprav-obrazky.sh
	./pdf.sh ${VERSION}
	vlna -l -m -n zongleruv-slabikar-${VERSION}.tex
	pdflatex zongleruv-slabikar-${VERSION}.tex 2>/dev/null
	pdflatex zongleruv-slabikar-${VERSION}.tex 2>/dev/null
	pdftk zongleruv-slabikar-${VERSION}.pdf output zs-${VERSION}.pdf encrypt_128bit allow Printing CopyContents ScreenReaders owner_pw DAjfjqu26v5ljnVHl3xgPjnZ22n
	mv zs-${VERSION}.pdf zongleruv-slabikar-${VERSION}.pdf

help:
	@echo "help     - napoveda"
	@echo "obr      - priprava obrazku"
	@echo "book     - vytvori pdf soubor"
	@echo "clean    - smaze docasne soubory"

obr:
	./priprav-obrazky.sh

clean:
	rm -rf zongleruv-slabikar-0.3.* ctyri-micky.* tri-micky.* pet-micku.* texput.log img
