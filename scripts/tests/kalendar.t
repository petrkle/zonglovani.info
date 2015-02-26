#!/usr/bin/perl
use strict;
use warnings;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 27;
use Time::Local;
use Date::Format;
use Net::Netrc;
use Encode;

my $loginurl = 'https://zongl.info/lide/prihlaseni.php';
my $mach = Net::Netrc->lookup($loginurl);
my ($login, $password, $account) = $mach->lpa;

my $prihl_udaj = {
	'login' => $login,
	'heslo' => $password
};

my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
$year = $year + 1900;
my $mesic = $mon+1;
my @abbr = qw( Leden Únor Březen Duben Květen Červen Červenec Srpen Září Říjen Listopad Prosinec );
my $mesicrok = "$abbr[$mon] $year";

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );
my $response = $bot->get('https://zongl.info/kalendar');
my $content=$response->content();

ok(defined($response), 'Stránka kalendáře je dostupná');
ok($content =~ /<strong class="add">Přidat novou<\/strong>/, 'Přidávat mohou přihlášení uživatelé.');
ok($content =~ /<td colspan="3" class="caption">$mesicrok<\/td>/, 'Aktuální měsíc');
ok($content =~ /Dnes je: $mday\. $mesic\. $year/, 'Dnešní den');

my $zs_prihlaseni = $bot->get($loginurl);
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihl_udaj);

my $prihlstranka=$zs_prihlaseni->content();

ok($prihlstranka =~ /Odhlásit<\/a>/, 'Úspěšné přihlášení');

$response = $bot->get("https://zongl.info/kalendar/");
ok($response->content() =~ /<a href="\/kalendar\/add.php"/, "Odkaz na přidání události");

$response = $bot->get("https://zongl.info/kalendar/add.php");
ok($response->content() =~ /<form action="\/kalendar\/add\.php"/, "Formulář pro přidání události");

my $zacatek=time()+(7*24*3600);
my $konec=time()+(8*24*3600);

my $zs_udalost = $bot->submit_form(form_number => 0 ,fields => {
		'title'=>decode_utf8('Testovací nadpis'),
		'desc'=>decode_utf8('Testovací popis'),
		'misto'=>decode_utf8('Nějaká vesnice'),
		'zacatek'=>time2str("%Y-%m-%d %H:%M",$zacatek),
		'konec'=>time2str("%Y-%m-%d %H:%M",$konec),
		'url'=>decode_utf8('http://nekde.cz'),
		'mapa'=>decode_utf8('http://mapy.cz/obrazek.jpg'),
		'obrazek'=>'/home/www/zonglovani.info/scripts/tests/img/600x800.jpg',
	}, button=>'odeslat');

my $event=$zs_udalost->content();
my $event_url=$bot->uri();
my $idpart=$event_url;
$idpart =~ s/.*\/kalendar\/udalost-(.+)\.html/$1/;
my $zacatek_hr=time2str("%e\.",$zacatek);
$zacatek_hr =~ s/^ //;

my $konec_hr=time2str("%e\. %L\. %Y",$konec);
$konec_hr =~ s/^ //;

ok($event =~ /<title>Testovací nadpis $zacatek_hr.* až $konec_hr - kalendář žonglování<\/title>/,'Správný titulek');
ok($event =~ /<h1>Testovací nadpis</,'Správný nadpis');
ok($event =~ /<span class="description">Testovací popis</,'Správný popis');
ok($event =~ /<a href="http:\/\/nekde.cz"/,'Správný odkaz na web');
ok($event =~ /<a href="http:\/\/mapy.cz\/obrazek.jpg"/,'Odkaz na mapu');
ok($event =~ /<img src="\/kalendar\/obrazek-[0-9]+-ts-[0-9]+-[0-9]+-.+-[0-9]+\.jpg" alt="Testovací popis" style="width:98%;max-width:450px;" \/>/,'Obrázek');
ok($event =~ /<input type="hidden" name="id"/,'Skryté pole');
ok($event =~ /<input type="submit" name="odeslat" value="Upravit"/,'Knoflík na úpravu');
ok($event =~ /<input type="submit" name="smazat" value="Smazat"/,'Knoflík na smazání');

$zs_udalost = $bot->submit_form(form_number => 0 , button=>'smazat');

ok($zs_udalost->content() =~ /<h3>Smazané události<\/h3>/, 'Seznam smazaných událostí');

my $mazani = $bot->follow_link(url_regex => qr/.*smazane-$idpart.*/, n=>1);
my $vymaz = $mazani->content();

ok($vymaz =~ /<title>Testovací nadpis $zacatek_hr.*- kalendář žonglování<\/title>/,'Správný titulek - smazaná událost');
ok($vymaz =~ /<h1>Testovací nadpis</,'Správný nadpis - smazaná událost');
ok($vymaz =~ /<span class="description">Testovací popis</,'Správný popis - smazaná událost');
ok($vymaz =~ /<a href="http:\/\/nekde.cz"/,'Správný odkaz na web - smazaná událost');
ok($vymaz =~ /<a href="http:\/\/mapy.cz\/obrazek.jpg"/,'Odkaz na mapu - smazaná událost');
ok($vymaz =~ /<img src="\/kalendar\/obrazek-[0-9]+-ts-[0-9]+-[0-9]+-.+-[0-9]+\.jpg" alt="Testovací popis" style="width:98%;max-width:450px;" \/>/,'Obrázek - smazaná událost');
ok($vymaz =~ /<input type="hidden" name="deleted"/,'Skryté pole - smazaná událost');
ok($vymaz =~ /<input type="submit" name="shred" value="Smazat nadobro"/,'Knoflík na úplné smazání');
ok($vymaz =~ /<input type="submit" name="restore" value="Obnovit"/,'Knoflík na obnovu');

$zs_udalost = $bot->submit_form(form_number => 0 , button=>'shred');

ok($zs_udalost->content() !~ /.*$idpart.*/, 'Uspěšně smazáno');
