#!/usr/bin/perl
use strict;
use warnings;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 28;

my @adresy=(
"tmp",
"lib",
"xml",
"navody/doc",
".htaccess",
"templates",
"scripts/tests",
);

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

foreach my $url(@adresy){
	my $response = $bot->get("https://zongl.info/$url");
	my $content=$response->content();
	ok(defined($response), "Stránka 403 pro $url");
	ok($bot->status() == 403, "Návratový kód 403 pro $url");
	ok($content =~ /<title>Přístup zakázán<\/title>/, "Správný titulek pro $url");
	ok($content =~ /požadovanou stránku nelze zobrazit/, "Stránku https://zongl.info/$url nelze zobrazit");
}
