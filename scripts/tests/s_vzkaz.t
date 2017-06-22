#!/usr/bin/perl

use strict;
use warnings;
use LWP::ConnCache;
use WWW::Mechanize;
use List::Util qw(shuffle);
use File::Slurp;
use File::Basename;
use Test::More tests => 14;
use Net::Netrc;
use Encode;

require('./scripts/tests/func.pl');

my $loginurl = 'https://zongl.info/lide/prihlaseni.php';
my $mach = Net::Netrc->lookup($loginurl);
my ($login, $password, $account) = $mach->lpa;

my $prihl_udaj = {
	'login' => $login,
	'heslo' => $password
};

my @lide=shuffle(glob('/home/www/zonglovani.info/data/lide/*'));
my $clovek_formular='';
my $clovek_mail='';
my $clovek_formular_mail='';
my $clovek_mail_mail='';

foreach my $clovek(@lide){
	if(! -f "$clovek/LOCKED" && ! -f "$clovek/REVOKED"){
		my $soukromi = read_file("$clovek/soukromi.txt") ;
		if($soukromi =~ /formular/){
			$clovek_formular = basename($clovek);
			$clovek_formular_mail = basename(glob("$clovek/*.mail"),(".mail"));
		}
		if($soukromi =~ /mail/){
			$clovek_mail = basename($clovek);
			$clovek_mail_mail = basename(glob("$clovek/*.mail"),(".mail"));
		}
	}
}

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $response = $bot->get("https://zongl.info/lide/$clovek_formular.html");
my $content=$response->content();

ok($content =~ /<input type="submit" name="vzkaz" value="Poslat vzkaz"/, "Tlačítko pro odeslání vzkazu pro $clovek_formular");

my $zs_vzkaz = $bot->submit_form(form_number => 0, fields => {'komu'=>"$clovek_formular"});
$content=$zs_vzkaz->content();
ok($content =~ /<h1>Vzkaz pro uživatele<\/h1>/, "Správný nadpis stránky s formulářem pro odeslání vzkazu.");
ok($content =~ /<input type="hidden" name="komu" value="$clovek_formular"/,"Skryté pole komu má správnou hodnotu: $clovek_formular");

my $antispam = get_vypocet($content);
my $udaje ={
	'komu'=>$clovek_formular,
	'email'=>$clovek_mail_mail,
	'vzkaz'=>decode_utf8("Ahoj, žluťoučký kůň pěl ďábelské ódy.\nS pozdravem $clovek_mail"),
	'antispam'=>"$antispam",
};
my $zs_posli_vzkaz = $bot->submit_form(form_number => 0 ,fields => $udaje, button=>'odeslat');

my $navrat = $zs_posli_vzkaz->content();
ok($navrat =~ /Na tvůj e-mail byla odeslána zpráva potřebná k dokončení zaslání vzkazu\./,"Odeslání potvrzovacího mailu na $clovek_mail_mail ($clovek_mail)");

ok(-f "/home/fakemail/$clovek_mail_mail.1.eml", 'Potvrzovaci mail přišel');

my $text = read_file("/home/fakemail/$clovek_mail_mail.1.eml", binmode => ':utf8');
my $email = Email::MIME->new(encode_utf8($text));
my @zprava = split(/\n/, get_html_part($email));

my @odkazy = grep /https:\/\/zongl.*\.info\/lide\/sendmail\//, @zprava;
my $pocetodkazu = @odkazy;

ok($pocetodkazu == 1, "Odkaz na odeslání vzkazu");
my $zs_aktivace = $bot->get($odkazy[0]);
ok($zs_aktivace->content() =~ /Vzkaz byl odeslán./,"Vzkaz byl odeslán na $clovek_formular_mail ($clovek_formular).");

ok(-f "/home/fakemail/$clovek_formular_mail.1.eml", "Vzkaz od $clovek_mail_mail ($clovek_mail) přišel na $clovek_formular_mail ($clovek_formular) přišel.");

my $zs_prihlaseni = $bot->get($loginurl);
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihl_udaj);

my $prihlstranka=$zs_prihlaseni->content();

ok(defined($prihlstranka), 'Přihlašovací stránka je dostupná');


$response = $bot->get("https://zongl.info/lide/$clovek_formular.html");
$content=$response->content();

ok($content =~ /<input type="submit" name="vzkaz" value="Poslat vzkaz"/, "Tlačítko pro odeslání vzkazu pro $clovek_formular od přihlášeného uživatele");

my $zs_vzkaz_prihl = $bot->submit_form(form_number => 0, fields => {'komu'=>"$clovek_formular"});
$content=$zs_vzkaz_prihl->content();

ok($content =~ /<h1>Vzkaz pro uživatele<\/h1>/, "Správný nadpis stránky s formulářem pro odeslání vzkazu od přihlášeného uživatele.");
ok($content =~ /<input type="hidden" name="komu" value="$clovek_formular"/,"Skryté pole komu má správnou hodnotu: $clovek_formular od přihlášeného uživatele.");

$udaje->{'antispam'}=get_vypocet($content);

my $zs_posli_vzkaz_prihl = $bot->submit_form(form_number => 0 ,fields => $udaje, button=>'odeslat');
my $odpoved = $zs_posli_vzkaz_prihl->content();

ok($odpoved =~ /Vzkaz byl úspěšně odeslán/,'Vzkaz od přihlášeného uživatele byl úspěšně odeslán.');

ok(-f "/home/fakemail/$clovek_formular_mail.2.eml", "Vzkaz od přihlášeného uživatele přišel na $clovek_formular_mail ($clovek_formular).");

system "sudo", "/bin/bash", "/home/www/zonglovani.info/scripts/tests/clean.sh";
