#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 44;
$ENV{PERL_LWP_SSL_VERIFY_HOSTNAME} = 0;

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
$bot->add_header( 'Accept-Encoding' => '' );

foreach my $url(@adresy){
	my $response = $bot->get("https://zongl.info/$url");
	my $content=$response->content();
	ok(defined($response), "Stránka 403 pro $url");
	ok($bot->status() == 403, "Návratový kód 403 pro $url");
	ok($content =~ /<title>Přístup zakázán<\/title>/, "Správný titulek pro $url");
	ok($content =~ /požadovanou stránku nelze zobrazit/, "Stránku https://zongl.info/$url nelze zobrazit");
}
