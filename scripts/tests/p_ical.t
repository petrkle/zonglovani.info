#!/usr/bin/perl
use strict;
use warnings;
use WWW::Mechanize;
use LWP::ConnCache;
use iCal::Parser;
use Test::More tests => 4;
my $minimalitems=3;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->conn_cache(LWP::ConnCache->new);
$bot->add_header( 'Accept-Encoding' => '' );

my $response = $bot->get("https://zongl.info/kalendar/kalendar.ics");
my $content=$response->content();
ok($bot->status() == 200, "Návratový kód 200");
ok($response->content_type() =~ /text\/calendar/, "Správný mime typ");

my $count=0;
while ($content =~ /DTSTART/g) { $count++ };
ok($count>=$minimalitems,"Ical obsahuje alespoň $minimalitems události");

my $parser=iCal::Parser->new(
        start => '20090101',
        end => '22220101',
);

my $hash=$parser->parse_strings($content);
ok($hash,"Ical jde načíst pomocí iCal::Parser");
