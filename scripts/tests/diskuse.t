#!/usr/bin/perl
use strict;
use warnings;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 19;
use Net::Netrc;
require('scripts/tests/func.pl');
use Encode;

my $loginurl = 'https://zongl.info/lide/prihlaseni.php';
my $mach = Net::Netrc->lookup($loginurl);
my ($login, $password, $account) = $mach->lpa;

my $prihl_udaj = {
	'login' => $login,
	'heslo' => $password
};


my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $zs_prihlaseni = $bot->get($loginurl);
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihl_udaj);

my $prihlstranka=$zs_prihlaseni->content();

ok($prihlstranka =~ /Odhlásit<\/a>/, 'Úspěšné přihlášení');

my $response = $bot->get("https://zongl.info/diskuse/");
ok($response->content() =~ /<a href="\/diskuse\/add\.php"/, "Odkaz na přidání zprávy");

$response = $bot->get("https://zongl.info/diskuse/add.php");
ok($response->content() =~ /<form action="\/diskuse\/add\.php"/, "Formulář pro přidání zprávy");

my $zs_vzkaz = $bot->submit_form(form_number => 0 ,fields => {'vzkaz'=>decode_utf8("Žluťoučký kůň pěl ďábelské ódy. http://www.seznam.cz")}, button=>'nahled');

my $nahled=$zs_vzkaz->content();
ok($nahled =~ /<input type="text" name="antispam"/, "Pole pro antispam");
ok($nahled =~ /Žluťoučký kůň pěl ďábelské ódy./, "Náhled zprávy");

$zs_vzkaz = $bot->submit_form(form_number => 0 ,fields => {'antispam'=>get_vypocet($nahled)}, button=>'odeslat');

ok($zs_vzkaz->content() =~ /<h1>Diskuse a komentáře<\/h1>/, 'Zobrazení komentářů');
ok($zs_vzkaz->content() =~ /<td colspan="6">Žluťoučký kůň pěl ďábelské ódy\. http:\/\/www\.seznam\.cz<\/td>/, "Vložení komentáře");

my @vzkazy = (
	{'z'=>'[url=http://nekde.cz]testovací odkaz[/url]', 'v'=>'<a href="http:\/\/nekde.cz" class="external" rel="nofollow">testovací odkaz<\/a>', 't'=>'Externí odkaz'},
	{'z'=>'[url]http://zonglovani.info/mapa[/url]', 'v'=>'<td colspan="6"><a href="http:\/\/zonglovani\.info\/mapa">http:\/\/zonglovani\.info\/mapa<\/a>', 't'=>'Interní odkaz'},
	{'z'=>'[email]petr@kle.cz[/email]', 'v'=>'petr<img src="https:\/\/zongl\.info\/img\/z\/zavinac\.serif\.png" alt="\@" width="16" height="15" \/>kle.cz', 't'=>'Vložení emailu'},
	{'z'=>'Nějaký [b]tučný text[/b].', 'v'=>'Nějaký <b>tučný text<\/b>', 't'=>'Tučný text'},
	{'z'=>'PŘÍLIŠ MNOHO VELKÝCH PÍSMEN!', 'v'=>'zaseklá klávesa Shift', 't'=>'Příliš mnoho VELKÝCH písmen'},
	{'z'=>'[i]Kurzíva[/i]', 'v'=>'<i>Kurzíva<\/i>', 't'=>'Kurzíva'},
	{'z'=>'<h1>Ahoj</h1>', 'v'=>'&lt;h1&gt;Ahoj&lt;\/h1&gt;', 't'=>'Escapování html'},
	{'z'=>'[b]Polotučné [i]mléko[/i][/b]', 'v'=>'<b>Polotučné <i>mléko<\/i><\/b>', 't'=>'Vnořené tagy'},
	{'z'=>'[blink]Nesmysl', 'v'=>'\[blink\]Nesmysl', 't'=>'Neexistující tag'},
	{'z'=>'[b nějaký text', 'v'=>'\[b nějaký text', 't'=>'Neukončený tag'},
	{'z'=>'ahhhhoooojjj', 'v'=>'řaděěě', 't'=>'Opakující se písmena'},
	{'z'=>'[b]Ahoj [i]lidi[/b][/i]', 'v'=>'<b>Ahoj <i>lidi<\/i><\/b>', 't'=>'Překřížené tagy'},
);

foreach my $prispevek (@vzkazy){
	$response = $bot->get("https://zongl.info/diskuse/add.php");
	$zs_vzkaz = $bot->submit_form(form_number => 0 ,fields => {'vzkaz'=>decode_utf8($prispevek->{'z'})}, button=>'nahled');
	$zs_vzkaz = $bot->submit_form(form_number => 0 ,fields => {'antispam'=>get_vypocet($zs_vzkaz->content())}, button=>'odeslat');
	ok($zs_vzkaz->content() =~ /$prispevek->{'v'}/, $prispevek->{'t'});
}

system("sudo /bin/bash /home/www/zonglovani.info/scripts/tests/clean.sh")
