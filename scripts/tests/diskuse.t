#!/usr/bin/perl
use strict;
use warnings;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 1;


my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $response = $bot->get("https://zongl.info/diskuse/add.php");

ok($bot->status() == 410, "Návratový kód 410 pro přidávání příspěvků");
