#!/usr/bin/perl
use strict;
use warnings;

use WWW::Mechanize;
use Test::More tests => 13;
use Net::Netrc;
use POSIX;
use File::Compare;

my $loginurl = 'http://zongl.info/lide/prihlaseni.php';
my $mach = Net::Netrc->lookup($loginurl);
my ($login, $password, $account) = $mach->lpa;

my $prihl_udaj = {
	'login' => $login,
	'heslo' => $password
};

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $zs_prihlaseni = $bot->get($loginurl);
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihl_udaj);

my $content=$zs_prihlaseni->content();

ok(defined($content), 'Přihlašovací stránka je dostupná');
ok($content =~ />Odhlásit<\/a>/, 'Odkaz na odhlášení');
ok($content =~ />Nastavení<\/a>/, 'Odkaz na nastavení');

my $zs_navody = $bot->get('http://zongl.info/navody/');
my $navody=$zs_navody->content();

ok(defined($zs_navody), 'Stránka s návody je dostupná');

my @soubory=('navod-na-zonglovani','vyroba-micku');

foreach my $soubor(@soubory){
	ok($navody =~ /<a href="download\/$soubor.pdf/, "Odkaz na $soubor.pdf");
	my $zs_navod_pdf = $bot->get("http://zongl.info/navody/download/$soubor.pdf");
	ok($zs_navod_pdf->content_type() =~ /application\/octet-stream/, "Mime typ application/octet-stream u $soubor.pdf");

	my $navod_tmp_filename = tmpnam();
	open NAVOD, "> $navod_tmp_filename";
	print NAVOD $zs_navod_pdf->content();
	close NAVOD;

	ok(compare($navod_tmp_filename,"/home/www/zonglovani.info/navody/doc/$soubor.pdf")==0,"Stažený soubor $soubor.pdf je v pořádku");
	unlink("$navod_tmp_filename");
}

my $zs_logout = $bot->get('http://zongl.info/lide/odhlaseni.php');
my $odhlaseni=$zs_logout->content();

ok(defined($odhlaseni), 'Odhlašovací stránka je dostupná');

foreach my $soubor(@soubory){
	my $zs_navod = $bot->get("http://zongl.info/navody/download/$soubor.pdf");
	my $navod=$zs_navod->content();
	ok($navod =~ /Pro zobrazení požadované stránky je nutné přihlášení/, "Soubor $soubor.pdf je po odhlášení nepřístupný");
}
