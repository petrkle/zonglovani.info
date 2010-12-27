#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 3;
my $minimalitems=3;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());

my $response = $bot->get("http://zongl.info/kalendar/kalendar.ics");
my $content=$response->content();
ok($bot->status() == 200, "Návratový kód 200");
ok($response->content_type() =~ /text\/calendar/, "Správný mime typ");

my $count=0;
while ($content =~ /DTSTART/g) { $count++ };
ok($count>=$minimalitems,"Ical obsahuje alespoň $minimalitems události");
