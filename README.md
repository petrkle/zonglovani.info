# Žonglérův slabikář #

Obrázková učebnice žonglování s míčky, kruhy a kužely.

http://zonglovani.info

# Vývoj #

## Získání zdrojových kódů ##

	git clone https://github.com/petrkle/zonglovani.info.git /home/www/zonglovani.info

## Nastavení hesel ##

	cp site-secrets.dist.php site-secrets.php

## Lokální doména pro testovaní ##

	echo "127.0.0.1 zongl.info smtp.zongl.info" >> /etc/hosts

## Nastavení apache ##

	<VirtualHost *:80>
		DocumentRoot "/home/www/zonglovani.info"
		ServerName zongl.info
		ServerAlias www.zongl.info
		ErrorLog "/var/log/httpd/zonglovani.info-error_log"
		CustomLog "/var/log/httpd/zonglovani.info-access_log" combinedio
	</VirtualHost>

## Postfix ##

https://gist.github.com/petrkle/4983929

## fakemail ##

https://github.com/petrkle/fakemail-slack

## MySQL ##

vyhledavani/search-zonglovan.sql

## Testování ##

	cpanm < scripts/tests/pm.txt

	make test
