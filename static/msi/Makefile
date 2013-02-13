PRODUCT="¦ongl‚r…v slabik ý"
VERSION=0.5.0
SRC=zongleruv-slabikar

$(SRC)-$(VERSION).exe: $(SRC)-$(VERSION).msi zonglovani.conf zonglovani.7z
	copy /b 7zSD.sfx + zonglovani.conf + zonglovani.7z $(SRC)-$(VERSION).exe

zonglovani.7z: $(SRC)-$(VERSION).msi
	7z a zonglovani.7z $(SRC)-$(VERSION).msi

$(SRC)-$(VERSION).msi: $(SRC)-$(VERSION).wixobj img/*.jpg img/*.ico
	light.exe -sacl -nologo -ext WixUIExtension -ext WixUtilExtension -cultures:cs-cz -out $(SRC)-$(VERSION).msi $(SRC).wixobj

$(SRC)-$(VERSION).wixobj: components.wxs files.wxs
	candle.exe -nologo -dProductVersion=$(VERSION) -dProductName=$(PRODUCT) -dSRC=$(SRC) $(SRC).wxs

clean:
	del /F /Q $(SRC).wixobj zonglovani.7z \
	$(SRC)-$(VERSION).wixpdb \
	$(SRC)-$(VERSION).msi \
	files.wxs \
	components.wxs \
	$(SRC)-$(VERSION).exe

install:
	msiexec /qr /i $(SRC)-$(VERSION).msi

uninstall:
	msiexec /qr /x $(SRC)-$(VERSION).msi

test:
	smoke -nologo $(SRC)-$(VERSION).msi

components.wxs: components.xsl
	heat dir $(SRC) -var var.SRC -indent 1 -nologo -ag -suid -ke -sfrag -t components.xsl -out components.wxs

files.wxs: files.xsl shortcuts.xsl
	heat dir $(SRC) -var var.SRC -indent 1 -nologo -ag -suid -ke -sfrag -t files.xsl -t shortcuts.xsl -out files.wxs
