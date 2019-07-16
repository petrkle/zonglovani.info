# Žonglérův slabikář #

Obrázková učebnice žonglování s míčky, kruhy a kužely.

https://zonglovani.info

# Vývoj #

## Získání zdrojových kódů ##

	git clone https://github.com/petrkle/zonglovani.info.git /home/www/zonglovani.info

## Lokální doména pro testovaní ##

	echo "127.0.0.1 zongl.info" >> /etc/hosts

## Nastavení nginx ##

	scripts/nginx.zongl.info.conf

## Testování ##

	cpanm --installdeps .

	make test
