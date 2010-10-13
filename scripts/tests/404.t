#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 4;

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->cookie_jar(HTTP::Cookies->new());
my $response = $bot->get('http://zongl.info/nesmysl');
my $content=$response->content();

ok(defined($response), 'Stránka 404');
ok($bot->status() == 404, 'Návratový kód 404.');
ok($content =~ /<title>Stránka nalezena<\/title>/, 'Správný titulek');
ok($content =~ /Můžeš zkusit následující/, 'Další možnosti');
