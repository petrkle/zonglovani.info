VERSION=$(shell cat ../VERSION)

help:
	@echo "help     - napoveda"
	@echo "book     - vytvori pdf soubor"
	@echo "clean    - smaze docasne soubory"

book:
	./priprav-obrazky.sh
	./pdf.sh ${VERSION}
	vlna -s -l -m -n zongleruv-slabikar-${VERSION}.tex tri-micky.tex ctyri-micky.aux pet-micku.tex kruhy.aux kuzely.tex passing.tex
	pdflatex -interaction=batchmode zongleruv-slabikar-${VERSION}.tex
	pdflatex -interaction=batchmode zongleruv-slabikar-${VERSION}.tex
	sed -i "/PTEX.Fullbanner.*/d" zongleruv-slabikar-${VERSION}.pdf
	pdftk zongleruv-slabikar-${VERSION}.pdf output zs-${VERSION}.pdf encrypt_128bit allow Printing CopyContents ScreenReaders owner_pw $(shell echo $RANDOM | sha512sum | sed "s/ .*//")
	mv zs-${VERSION}.pdf zongleruv-slabikar-${VERSION}.pdf

clean:
	rm -rf zongleruv-slabikar-${VERSION}.* ctyri-micky.* tri-micky.* pet-micku.* kruhy.* kuzely.* passing.* texput.log img
