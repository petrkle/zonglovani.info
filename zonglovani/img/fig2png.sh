
#!/bin/bash



while [ "$1" != "" ]
		
do 

	SOUBOR=`basename $1 .fig`

	fig2dev -L png -b 5 -S 4 -m 2 $SOUBOR.fig $SOUBOR.png

	echo -ne "."

	convert -filter box -type optimize -strip -quantize rgb -resize 50% -depth 8 -quality 100 -colors 32 -treedepth 4 $SOUBOR.png $SOUBOR.png	
#convert -filter box -type optimize -strip -quantize rgb -resize 50% -depth 8 -quality 100 -colors 64 -treedepth 4 $SOUBOR.png $SOUBOR.png	
	
	echo -ne "."	
	
	shift

done
echo -ne "\n"
