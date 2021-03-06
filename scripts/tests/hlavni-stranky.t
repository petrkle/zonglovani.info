#!/usr/bin/perl
use strict;
use warnings;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 66;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my @stranky = (
	{'a'=>'/kontakt.html', 't'=>'Kontakt', 'o'=>'<h3>Petr Kletečka<\/h3>'},
	{'a'=>'/micky/', 't'=>'Žonglování s míčky', 'o'=>'Rychlý návod jak začít házet se dvěma'},
	{'a'=>'/micky/jak-zacit.html', 't'=>'Jak začít žonglovat s míčky', 'o'=>'Když první míček míjí tvůj nos je čas vyhodit druhý míček'},
	{'a'=>'/micky/3/kaskada.html', 't'=>'Žonglování se třemi míčky - Kaskáda', 'o'=>'A když je druhý míček na vrcholu své dráhy'},
	{'a'=>'/micky/2/', 't'=>'Žonglování se dvěma míčky', 'o'=>'<a href="40303.html" title="Zobrazit 40303">40303'},
	{'a'=>'/micky/2/noha.html', 't'=>'Žonglování se dvěma míčky - Prohození míčku pod nohou', 'o'=>'Prohodit si míček pod nohou můžeš'},
	{'a'=>'/micky/3/', 't'=>'Žonglování se třemi míčky', 'o'=>'<a href="koleno.html" title="Zobrazit Odražení míčku kolenem">Odražení míčku kolenem<'},
	{'a'=>'/micky/4/', 't'=>'Žonglování se čtyřmi míčky', 'o'=>'<li><a href="krabice.html" title="Zobrazit Krabice">Krabice<'},
	{'a'=>'/micky/4/sprcha-polovicni.html', 't'=>'Žonglování se čtyřmi míčky - Poloviční sprcha', 'o'=>'Těsně za ním i druhý'},
	{'a'=>'/micky/5/', 't'=>'Žonglování s pěti míčky', 'o'=>'<li><a href="sprcha-polovicni.html" title="Zobrazit Poloviční sprcha">Poloviční sprcha<'},
	{'a'=>'/micky/5/kaskada.html', 't'=>'Žonglování s pěti míčky - Kaskáda', 'o'=>'Kaskáda s pěti míčky je obtížný trik.'},
	{'a'=>'/micky/6/', 't'=>'Žonglování se šesti míčky', 'o'=>'<a href="\/animace\/6-fountain.html" title="Animace házení šesti míčků"><img src="\/img\/a\/animace.png"'},
	{'a'=>'/kruhy/', 't'=>'Žonglování s kruhy', 'o'=>'<li><a href="\/kruhy\/3\/kaskada.html" title="snadné">Kaskáda<'},
	{'a'=>'/kruhy/3/sloupy.html', 't'=>'Žonglování se třemi kruhy - Sloupy', 'o'=>'V momentě kdy první kruh dosáhne vrcholu své dráhy'},
	{'a'=>'/kuzely/', 't'=>'Žonglování s kužely', 'o'=>'Překulení kuželky přes hlavu'},
	{'a'=>'/kuzely/rotace.html', 't'=>'Rotace kuželu', 'o'=>'Těžko zvládnutelné, ale může se hodit'},
	{'a'=>'/kuzely/3/', 't'=>'Žonglování se třemi kužely', 'o'=>'<li><a href="nuzky.html" title="Zobrazit Nůžky">Nůžky<'},
	{'a'=>'/kuzely/3/pul-otocky.html', 't'=>'Žonglování se třemi kužely - Půl otočky', 'o'=>'Další tři hody jsou z normálního držení'},
	{'a'=>'/kuzely/passing/', 't'=>'Passing', 'o'=>'<li><a href="star.html" title="těžší">Hvězda<'},
	{'a'=>'/kuzely/passing/4count.html', 't'=>'Passing - 4 count', 'o'=>'Dobře hozený pass přilétá držadlem kuželu'},
	{'a'=>'/kuzely/passing/hody.html', 't'=>'Passing - Druhy hodů při passování', 'o'=>'<a name="podnohou"><\/a><h2>Pod nohou<\/h2>'},
	{'a'=>'/ostatni.html', 't'=>'Další informace o žonglování', 'o'=>'rec.juggling'},
	{'a'=>'/nacini.html', 't'=>'Žonglérské náčiní', 'o'=>'<a name="zvony"><\/a><h3>Záchodové zvony<\/h3>'},
	{'a'=>'/animace/', 't'=>'Animace žonglování', 'o'=>'<li><a href="3-cascade.html" title="3-cascade">Kaskáda</a><'},
	{'a'=>'/animace/oy-oy.html', 't'=>'Oj-oj - animovaný návod na žonglování', 'o'=>'<img src="\/animace\/img\/oy-oy.gif" width="374" height="483" alt="Oj-oj" \/>'},
	{'a'=>'/animace/siteswap/', 't'=>'Siteswap', 'o'=>'<li><a href="63623.html" title="63623">63623<'},
	{'a'=>'/animace/en/', 't'=>'Animace žonglování - anglické názvy', 'o'=>'<li><a href="no-through-mills-mess.html" title="no-through-mills-mess">no through mills mess<'},
	{'a'=>'/animace/en/statue-of-liberty-b.html', 't'=>'statue of liberty b - animovaný návod na žonglování', 'o'=>'<img src="\/animace\/img\/statue-of-liberty-b.gif" width="375" height="486" alt="statue of liberty b" \/>'},
	{'a'=>'/navody/', 't'=>'Návody na žonglování', 'o'=>'<h3>Žonglování se třemi míčky<'},
	{'a'=>'/mapa-stranek.html', 't'=>'Mapa stránek', 'o'=>'<li><a href="\/juggling-tv.html">juggling.tv<'},
	{'a'=>'/podporte-zongleruv-slabikar.html', 't'=>'Podpoř žonglérův slabikář', 'o'=>'Provoz adresy zonglovani.info stojí 1500 Kč ročně'},
	{'a'=>'/ulita/', 't'=>'Žonglování v Ulitě', 'o'=>'<a href="cesta.html" title="Podrobný popis cesty.">Místo konání<'},
	{'a'=>'/chudy/', 't'=>'Chůdy', 'o'=>'Sežeň někoho kdo tě bude chytat'},
);

foreach my $stranka (@stranky){
	my $response = $bot->get("https://zongl.info".$stranka->{'a'});
	ok($response->content() =~ /<title>$stranka->{'t'}<\/title>/, $stranka->{'a'}." má správný titulek $stranka->{'t'}");
	ok($response->content() =~ /<title>$stranka->{'t'}<\/title>/, $stranka->{'a'}." obsahuje $stranka->{'o'}");
}
