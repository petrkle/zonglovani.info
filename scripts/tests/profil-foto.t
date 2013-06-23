#!/usr/bin/perl
use strict;
use warnings;

use WWW::Mechanize;
use Test::More tests => 14;
use Net::Netrc;
use POSIX;
use File::Compare;
use Image::Size;

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

my $crashbot = WWW::Mechanize->new(autocheck => 0);
$crashbot->cookie_jar(HTTP::Cookies->new());

my $zs_prihlaseni = $bot->get($loginurl);
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => $prihl_udaj);

my $content=$zs_prihlaseni->content();
ok($content =~ />Nastavení<\/a>/, 'Úspěšné přihlášení');

my $zs_fotka = $bot->get('http://zongl.info/lide/nastaveni/foto');
ok($zs_fotka->content() =~ /<legend>Fotografie<\/legend>/,'Formulář - fotografie');

if($zs_fotka->content() =~ /<input type="submit" name="smazat" value="Smazat"/){
	# smazat původní foto
	my $zs_foto = $bot->submit_form(form_number => 0 , button=>'smazat');
}

$zs_fotka = $bot->get('http://zongl.info/lide/nastaveni/foto');

my $zs_foto = $bot->submit_form(form_number => 0 , fields => {'foto'=> '/home/www/zonglovani.info/scripts/tests/img/pek-s.jpg' }, button=>'odeslat');

ok($zs_foto->content() =~ /Fotografie byla uložena/, 'Nahrání malé fotky');

my $pic = $bot->get('http://zongl.info/lide/foto/pek.jpg');

my $fotka_tmp_filename = tmpnam();
open F, "> $fotka_tmp_filename";
print F $pic->content();
close F;

ok(compare($fotka_tmp_filename,"/home/www/zonglovani.info/scripts/tests/img/pek-s.jpg")==0,"Stažená fotka je stejná jako předloha");
unlink("$fotka_tmp_filename");

$zs_fotka = $bot->get('http://zongl.info/lide/nastaveni/foto');

ok($zs_fotka->content() =~ /<input type="submit" name="smazat" value="Smazat"/,'Možnost smazat fotku');

$zs_fotka = $bot->submit_form(form_number => 0 , button=>'smazat');

ok($zs_fotka->content() =~ /Fotografie je smazaná/, 'Smazání malé fotky');

my $obrazek = $crashbot->get('http://zongl.info/lide/foto/pek.jpg');
ok($crashbot->status() == 404, "Fotka po smazání není dostupná");

$zs_fotka = $bot->get('http://zongl.info/lide/nastaveni/foto');
ok($zs_fotka->content() =~ /<legend>Fotografie<\/legend>/,'Formulář pro další nahrání fotografie');

$zs_foto = $bot->submit_form(form_number => 0 , fields => {'foto'=> '/home/www/zonglovani.info/scripts/tests/img/800x600.png' }, button=>'odeslat');
ok($zs_foto->content() =~ /Špatný formát souboru. Přidávat jde pouze obrázky formátu JPG/, 'Nahrát jde jen JPG');

$zs_foto = $bot->submit_form(form_number => 0 , fields => {'foto'=> '/home/www/zonglovani.info/scripts/tests/img/800x600.jpg' }, button=>'odeslat');
ok($zs_foto->content() =~ /Fotografie byla uložena/, 'Nahrání velké fotky');

$pic = $bot->get('http://zongl.info/lide/foto/pek.jpg');
my $fig = $pic->content();

my ($buf_x, $buf_y) = imgsize(\$fig);

ok($buf_x==300 && $buf_y==225,'Zmenšení velké fotografie');

$zs_fotka = $bot->get('http://zongl.info/lide/nastaveni/foto');
ok($zs_fotka->content() =~ /<input type="submit" name="smazat" value="Smazat"/,'Možnost smazat zmenšenou fotku');
$zs_fotka = $bot->submit_form(form_number => 0 , button=>'smazat');
ok($zs_fotka->content() =~ /Fotografie je smazaná/, 'Smazání zmenšené fotky');


$zs_fotka = $bot->get('http://zongl.info/lide/nastaveni/foto');
$zs_foto = $bot->submit_form(form_number => 0 , fields => {'foto'=> '/home/www/zonglovani.info/scripts/tests/img/pek-s.jpg' }, button=>'odeslat');
ok($zs_foto->content() =~ /Fotografie byla uložena/, 'Nahrání původní fotky');
