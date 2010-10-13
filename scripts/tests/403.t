#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 4;

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->cookie_jar(HTTP::Cookies->new());
my $response = $bot->get('http://zongl.info/data');
my $content=$response->content();

ok(defined($response), 'Stránka 403');
ok($bot->status() == 403, 'Návratový kód 403.');
ok($content =~ /<title>Přístup zakázán<\/title>/, 'Správný titulek');
ok($content =~ /požadovanou stránku nelze zobrazit/, 'Stránku nelze zobrazit');
