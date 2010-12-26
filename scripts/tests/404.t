#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 24;

my @adresy=(
"nesmysl",
"admin",
"video/neexistujicivideo.html",
"lide/neexistujiciuzivatel.html",
"diskuse/neexistujicistranka.html",
"obrazky/neexistujiciobrazek.html"
);

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->cookie_jar(HTTP::Cookies->new());

foreach my $url(@adresy){
	my $response = $bot->get("http://zongl.info/$url");
	my $content=$response->content();
	ok(defined($response), "Stránka 404 pro $url");
	ok($bot->status() == 404, "Návratový kód 404 pro $url");
	ok($content =~ /<title>Stránka nenalezena<\/title>/, "Správný titulek pro $url");
	ok($content =~ /Můžeš zkusit následující/, "Další možnosti pro $url");
}
