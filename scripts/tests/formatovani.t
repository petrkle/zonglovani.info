#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 10;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());

my $zs_kotvy = $bot->get('http://zongl.info/kuzely/passing/hody.html');

my $kotvy=$zs_kotvy->content();

ok($kotvy =~ /<a name="single"><\/a><h2>Jedna otočka<\/h2>/, 'Kotva u nadpisu');

my $zs_nadpisy = $bot->get('http://zongl.info/micky/3/mm.html');

my $nadpisy = $zs_nadpisy->content();

ok($nadpisy =~ /<h2>Mills mess<\/h2>/, 'Nadpis druhé úrovně');

ok($nadpisy =~ /<p>\nTak a teď stačí přidat už jen jeden míček.\n<\/p>/, 'Odstavec bez obrázku');

ok($nadpisy =~ /<p>\n<img src="\/img\/m\/mmi.png" width="200" height="200" title="" alt="" \/>\nPravou ruku máš vlevo nahoře a zachytíš do ní první míček. Zároveň levou rukou vyhoď třetí míček.\n<\/p>/, 'Odstavec s obrázkem');

ok($nadpisy =~ /<!-- start -->\n<p class="animace">\n<a href="\/animace\/standard-mills-mess\.html"/, 'Odkaz na animaci');
ok($nadpisy =~ /<p class="animace">\n<a href="\/video\/navod\/micky-3-mm.html" title="Video"/, 'Odkaz na video');
ok($nadpisy =~ /<div class="kamdal">\n<a name="kam-dal"><\/a><h5>Kam dál<\/h5>\n<ul>\n<li><a href="\/micky\/passing-mm\.html"/, 'Odkaz na další stránku');

my $zs_formatovani = $bot->get('http://zongl.info/kuzely/passing/pickup.html');

my $formatovani = $zs_formatovani->content();

ok($formatovani =~ /Žongléři <b>A<\/b> a <b>B<\/b> hází/, 'Převod na tučný text');
ok($formatovani =~ / hází <a href="4count\.html" title="Základ passování.">4 count<\/a>\./, 'Převod na odkaz');

my $zs_odkazy = $bot->get('http://zongl.info/micky/vyroba-tenisak.html');

my $odkazy = $zs_odkazy->content();

ok($odkazy =~ /<a href="\/img\/n\/nuzky\.jpg"><img src="\/img\/n\/nuzky\.s\.jpg" width="200" height="125" title="" alt="" \/>/, 'Odkaz na obrázek');
