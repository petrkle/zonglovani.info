#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 6;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
my $response = $bot->get('http://zongl.info/micky/3');
my $content=$response->content();

ok(defined($response), 'Stránka triků s míčky je dostupná');
ok($content =~ /.*<title>Žonglování se třemi míčky<\/title>/, 'Správný titulek');
ok($content =~ /Čím začít\?/, 'Úvod');
ok($content =~ /Dvojitá krabice/, 'Trik se třemi míčky');
ok($content =~ /Kaskáda/, 'Základní trik');
ok($content =~ /Pro pokročilé/, 'Pokračování');
