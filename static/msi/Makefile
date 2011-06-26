VERSION=0.3

zongleruv-slabikar-${VERSION}.exe: zongleruv-slabikar-${VERSION}.msi zonglovani.conf zonglovani.7z
	copy /b 7zSD.sfx + zonglovani.conf + zonglovani.7z zongleruv-slabikar-${VERSION}.exe
zonglovani.7z: zongleruv-slabikar-${VERSION}.msi
	7z a zonglovani.7z zongleruv-slabikar-${VERSION}.msi
zongleruv-slabikar-${VERSION}.msi: zonglovani.wixobj img/*.bmp img/*.ico
	light.exe -ext WixUIExtension -cultures:cs-cz -out zongleruv-slabikar-${VERSION}.msi zonglovani.wixobj
zonglovani.wixobj: zonglovani.wsx
	candle.exe zonglovani.wsx
clean:
	del /F /Q zonglovani.wixobj zonglovani.7z \
	zongleruv-slabikar-${VERSION}.wixpdb \
	zongleruv-slabikar-${VERSION}.msi \
	zongleruv-slabikar-${VERSION}.exe
#heat dir ccleaner -gg -out clean.files
