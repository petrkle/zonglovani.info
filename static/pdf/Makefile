VERSION=0.3

book:
	./priprav-obrazky.sh
	./pdf.sh ${VERSION}
	pdflatex zongleruv-slabikar-${VERSION}.tex 2>/dev/null
	pdflatex zongleruv-slabikar-${VERSION}.tex 2>/dev/null

help:
	@echo "help     - napoveda"
	@echo "obr      - priprava obrazku"
	@echo "book     - vytvori pdf soubor"
	@echo "clean    - smaze docasne soubory"

obr:
	./priprav-obrazky.sh

clean:
	rm -rf zongleruv-slabikar-0.3.* ctyri-micky.* tri-micky.* pet-micku.* texput.log img
