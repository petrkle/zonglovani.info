#!/usr/bin/perl -w
use strict;
use warnings;

use WWW::Mechanize;
use Test::More tests => 9;
use Net::Netrc;
$ENV{PERL_LWP_SSL_VERIFY_HOSTNAME} = 0;

my $loginurl = 'https://zongl.info/lide/prihlaseni.php';
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

my $zs_loginy = $bot->get('https://zongl.info/lide/pristupy.php');
ok($zs_loginy->content() =~ /WWW-Mechanize/,'Výpis přihlášení');

my $zs_logout = $bot->get('https://zongl.info/lide/odhlaseni.php');
my $odhlaseni=$zs_logout->content();

ok(defined($odhlaseni), 'Odhlašovací stránka je dostupná');
ok($odhlaseni =~ />Přihlášení<\/a>/, 'Odkaz na přihlášení');
ok($odhlaseni =~ /Odhlášení proběhlo úspěšně/, 'Odhlášení proběhlo úspěšně');
ok($odhlaseni =~ />Založit účet<\/a>/, 'Odkaz na založení účtu');

my $zs_nastaveni = $bot->get('https://zongl.info/lide/nastaveni');
my $nastaveni=$zs_nastaveni->content();
ok($nastaveni =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Nastavení je po odhlášení nepřístupné');
