VERSION=$(shell grep "^Version: " zonglovani-info-kalendar.php | sed "s/[^0-9\.]//g")
DIR=$(shell basename "${PWD}")


help:
	@echo "help     - napoveda"
	@echo "dist     - vytvori zip archiv"

dist:
	cd .. && zip -r ../download/wp-zonglovani-info-kalendar-${VERSION}.zip ${DIR} -x ${DIR}/Makefile && cd -
