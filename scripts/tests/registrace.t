#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 30;
use Net::Netrc;
use String::MkPasswd qw(mkpasswd);
require('scripts/tests/func.pl');
use Data::Dumper;

my $nove_heslo = mkpasswd(-length => 13, -minnum => 4, -minlower => 4, -minupper => 2, -minspecial => 3);
my $jmeno = mkpasswd(-length => 10, -minnum => 0, -minlower => 4, -minupper => 2, -minspecial => 0);

my $tld = mkpasswd(-length => 2, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $domain = mkpasswd(-length => 7, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $mailuser = mkpasswd(-length => 5, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $mail="$mailuser\@$domain.$tld";

my $vzkaz = mkpasswd(-length => 50, -minnum => 0, -minlower => 20, -minupper => 20, -minspecial => 0);

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());

my $zs_pravidla = $bot->get('http://zongl.info/lide/novy-ucet.php');

my $content=$zs_pravidla->content();

ok($content =~ /<h1>Založit účet<\/h1>/, 'Formulář pro založení účtu');

my $udaje = {
	'jmeno' => $jmeno,
	'email' => $mail,
	'antispam' => get_vypocet($content)
};

my $zs_udaje = $bot->submit_form(form_number => 0,fields => $udaje);

$content=$zs_udaje->content();

ok($content =~ /Na tvůj e-mail \($mail\) byla odeslána zpráva/, 'Aktivační email odeslán');
sleep 1;
ok(-f "/home/fakemail/$mail.1", 'Aktivační email přišel');

open MAIL, "/home/fakemail/$mail.1";
my @zprava = <MAIL>;
close MAIL;

my @odkazy = grep /^Heslo: /, @zprava;
my $pocetodkazu = @odkazy;

ok($pocetodkazu > 0,"Heslo pro přihlášení");

my $heslo = $odkazy[0];
chomp($heslo);
chop($heslo);
$heslo =~ s/^Heslo: //;

my $zs_nastave = $bot->get('http://zongl.info/lide/nastaveni/');

ok($zs_nastave->content() =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Do nastavení je potřeba přihlášení.');

my $prihlaseni = {
	'login' => $mail,
	'heslo' => $heslo,
};

my $zs_prihlaseni = $bot->submit_form(form_number => 0, fields => $prihlaseni);

$zs_nastave = $bot->get('http://zongl.info/lide/nastaveni/');

my $zs_nastaveni_uziv = $zs_nastave->content();

ok($zs_nastaveni_uziv =~ /E-mail: <strong>$mail<\/strong>/,'Ověření emailu');
ok($zs_nastaveni_uziv =~ />Nastavit fotografii<\/a>./,'Link na nastavení fotky');

my $zs_logout = $bot->get('http://zongl.info/lide/odhlaseni.php');
my $odhlaseni=$zs_logout->content();

ok(defined($odhlaseni), 'Odhlašovací stránka je dostupná');
ok($odhlaseni =~ />Přihlášení<\/a>/, 'Odkaz na přihlášení');
ok($odhlaseni =~ />Založit účet<\/a>/, 'Odkaz na založení účtu');

my $zs_nas= $bot->get('http://zongl.info/lide/nastaveni');
ok($zs_nas->content() =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Nastavení je po odhlášení nepřístupné');

my $prihlaseni_spatne = {
	'login' => $mail,
	'heslo' => $heslo.'navic',
};

my $zs_badlogin = $bot->submit_form(form_number => 0,fields => $prihlaseni_spatne);
ok($zs_badlogin->content() =~ /Špatné jméno nebo heslo/,'Nejde se přihlásit se špatným heslem');

my $prihlaseni_spatne_2 = {
	'login' => $mail,
	'heslo' => '',
};

my $zs_badlogin_2 = $bot->submit_form(form_number => 0,fields => $prihlaseni_spatne_2);
ok($zs_badlogin_2->content() =~ /Špatné jméno nebo heslo/,'Nejde se přihlásit bez hesla');

my $zs_obnova_hesla = $bot->get('http://zongl.info/lide/zapomenute-heslo.php');
my $obnova=$zs_obnova_hesla->content();

my $obnovit = {
	'email' => $mail,
	'antispam' => get_vypocet($obnova),
};

my $zs_obnova = $bot->submit_form(form_number => 0,fields => $obnovit, button => 'odeslat');

ok($zs_obnova->content() =~ /Na tvůj e-mail byla odeslána zpráva potřebná k obnovení hesla/,'Odeslán email pro obnovu hesla.');

sleep 1;
ok(-f "/home/fakemail/$mail.2", 'Email pro obnovu hesla přišel');

open MAIL, "/home/fakemail/$mail.2";
my @zprava_z = <MAIL>;
close MAIL;

my @odkazy_o = grep /http:\/\/zongl.*\.info\/lide\/z\//, @zprava_z;
my $pocetodkazu_o = @odkazy_o;

ok($pocetodkazu_o > 0,"Odkaz na obnovu hesla");

my $zs_zapomenka = $bot->get($odkazy_o[0]);
ok ($zs_zapomenka->content() =~ /<legend>Obnova hesla<\/legend>/,'Formulář pro zadání nového hesla');

my $zs_noveheslo = $bot->submit_form(form_number => 0,fields => {'heslo'=>$nove_heslo,'heslo2'=>$nove_heslo}, button => 'odeslat');

ok($zs_noveheslo->content() =~ /Nové heslo je nastavené/,'Nové heslo nastaveno');

my $nove_prihlaseni = {
	'login' => $mail,
	'heslo' => $nove_heslo,
};

my $zs_logout2 = $bot->get('http://zongl.info/lide/odhlaseni.php');

ok($zs_logout2->content() =~ /Přihlášení/,'Odhlášení po nastavení hesla');

my $zs_login_form= $bot->get('http://zongl.info/lide/nastaveni');
my $zs_nove_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihlaseni);

ok($zs_nove_prihlaseni->content() =~ /Špatné jméno nebo heslo/,'Staré heslo nefunguje');

$zs_nove_prihlaseni = $bot->submit_form(form_number => 0,fields => $nove_prihlaseni);

ok($zs_nove_prihlaseni->content() =~ /Nastavit znamení zvěrokruhu<\/a>/,'Nové heslo funguje');

my $zs_heslomen = $bot->get('http://zongl.info/lide/nastaveni/heslo');
$zs_heslomen = $bot->submit_form(form_number => 0,fields => {'stareheslo'=>$nove_heslo,'heslo'=>$heslo,'heslo2'=>$heslo}, button => 'odeslat');

ok($zs_heslomen->content() =~ /Nové heslo je nastavené\./,'Změna hesla na původní');
$zs_logout = $bot->get('http://zongl.info/lide/odhlaseni.php');

my $zs_na = $bot->get('http://zongl.info/lide/nastaveni/');
ok($zs_na->content() =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Nastavení je bez odhlášení nepřístupné');

my $zs_prihlaska = $bot->submit_form(form_number => 0,fields => $prihlaseni);

ok($zs_prihlaska->content() =~ />Upravit vzkaz<\/a>/,'Link na nastavení vzkazu');

ok($zs_prihlaska->content() =~ />Internetová stránka<\/a>/,'Link na nastavení webu');

my $zs_ruseni = $bot->get('http://zongl.info/lide/nastaveni/zruseni');

$zs_ruseni = $bot->click_button(name=>'zrusit');
ok($zs_ruseni->content() =~ /E-mail s instrukcemi jak zrušit účet odeslán\./,'Odeslání zprávy s odkazem na zrušení.');

sleep 1;
ok(-f "/home/fakemail/$mail.3", 'Rušící email přišel');

open MAIL, "/home/fakemail/$mail.3";
my @zprava_r = <MAIL>;
close MAIL;

my @odkazy_r = grep /http:\/\/zongl.*\.info\/lide\/e\//, @zprava_r;
my $pocetodkazu_r = @odkazy_r;

ok($pocetodkazu > 0,"Odkaz na zrušení");

my $zs_zruseni = $bot->get($odkazy_r[0]);
ok($zs_zruseni->content() =~ /<li>Účet byl zrušen.<\/li>/,'Účet byl zrušen');
$zs_zruseni = $bot->get($odkazy_r[0]);
ok($zs_zruseni->content() =~ /<li>Neplatný odkaz pro zrušení účtu.<\/li>/,'Účet nejde zrušit dvakrát');

my $ignore_bot = WWW::Mechanize->new(autocheck => 0);

#my $response = $ignore_bot->get("http://zongl.info/lide/$login.html");
#ok($ignore_bot->status() == 404, 'Stránka uživatele neexistuje');

system("sudo /bin/bash /home/www/zonglovani.info/scripts/tests/clean.sh")
