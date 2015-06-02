# Žonglérův slabikář #

Obrázková učebnice žonglování s míčky, kruhy a kužely.

https://zonglovani.info

# Vývoj #

## Získání zdrojových kódů ##

	git clone https://github.com/petrkle/zonglovani.info.git /home/www/zonglovani.info

## Nastavení hesel ##

	cp site-secrets.dist.php site-secrets.php

## Lokální doména pro testovaní ##

	echo "127.0.0.1 zongl.info" >> /etc/hosts

## Nastavení nginx ##

	scripts/nginx.zongl.info.conf

## Postfix ##

https://gist.github.com/petrkle/4983929

## fakemail ##

https://github.com/petrkle/fakemail-slack

## MySQL ##

vyhledavani/zonglovan_s.sql

## Testování ##

	cpanm < scripts/tests/pm.txt

	make test
