#!/usr/bin/perl
use strict;
use warnings;

use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 4;
use Test::JSON;
my $minimalitems=3;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $response = $bot->get("https://zongl.info/kalendar/next.json");
my $content=$response->content();
ok($bot->status() == 200, "Návratový kód 200");
ok($response->content_type() =~ /application\/javascript/, "Správný mime typ");

my $count=0;
while ($content =~ /"start"/g) { $count++ };
ok($count>=$minimalitems, "JSON obsahuje alespoň $minimalitems události");
is_valid_json( $content, "Soubor obsahuje dobře naformátovaný JSON");