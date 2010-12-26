#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 44;

my @adresy=(
"data",
"tmp",
"lib",
"ostatni/personas",
"xml",
"video/klip",
"navody/doc",
".htaccess",
"templates",
"scripts/tests",
"tip/tipy.inc"
);

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->cookie_jar(HTTP::Cookies->new());

foreach my $url(@adresy){
	my $response = $bot->get("http://zongl.info/$url");
	my $content=$response->content();
	ok(defined($response), "Stránka 403 pro $url");
	ok($bot->status() == 403, "Návratový kód 403 pro $url");
	ok($content =~ /<title>Přístup zakázán<\/title>/, "Správný titulek pro $url");
	ok($content =~ /požadovanou stránku nelze zobrazit/, "Stránku http://zongl.info/$url nelze zobrazit");
}
