#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 7;
use Net::Netrc;

my $loginurl = 'http://zongl.info/lide/prihlaseni.php';
my $mach = Net::Netrc->lookup($loginurl);
my ($login, $password, $account) = $mach->lpa;

my $prihl_udaj = {
	'login' => $login,
	'heslo' => $password
};

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
my $zs_prihlaseni = $bot->get($loginurl);
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihl_udaj);

my $content=$zs_prihlaseni->content();

ok(defined($content), 'Přihlašovací stránka je dostupná');
ok($content =~ />Odhlásit<\/a>/, 'Odkaz na odhlášení');
ok($content =~ />Nastavení<\/a>/, 'Odkaz na nastavení');

my $zs_logout = $bot->get('http://zongl.info/lide/odhlaseni.php');
my $odhlaseni=$zs_logout->content();

ok(defined($odhlaseni), 'Odhlašovací stránka je dostupná');
ok($odhlaseni =~ />Přihlášení<\/a>/, 'Odkaz na přihlášení');
ok($odhlaseni =~ />Nový účet<\/a>/, 'Odkaz na založení účtu');

my $zs_nastaveni = $bot->get('http://zongl.info/lide/nastaveni');
my $nastaveni=$zs_nastaveni->content();
ok($nastaveni =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Nastavení je po odhlášení nepřístupné');
