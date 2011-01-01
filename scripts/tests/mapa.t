#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 70;
my $minimalitems=3;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());

my $response = $bot->get("http://zongl.info/mapa/");
my $content=$response->content();
ok($bot->status() == 200, "Návratový kód 200");
ok($content =~ /google.maps.LatLng\(49\.453567975668975,16\.816765\)/,"Správné souřadnice československa");
ok($content =~ /zoom: 6/,"Správné zoom československa");

open T, '</home/www/zonglovani.info/mapa/kraje.txt' or die $!;
my @radky = <T>;
close T;

foreach my $kraj(@radky){
	chomp($kraj);
	my @kraj=split(/:/,$kraj);
	ok($content =~ />$kraj[2]<\/a>/, "Odkaz na $kraj[2]");
	my $id = $kraj[1];
	$id =~ s/kr\-//;
	my $poz = $bot->get("http://zongl.info/mapa/kraj/$id/");
	ok($poz->content() =~ /google.maps.LatLng\($kraj[3],$kraj[4]\)/,"Kraj $id - správné souřadnice");
	ok($poz->content() =~ /zoom: 9/,"Kraj $id - správný zoom");
}

my $cr = $bot->get("http://zongl.info/mapa/cr.html");
ok($cr->content() =~ /google.maps.LatLng\(50\.0,15\.5\)/,"ČR - správné souřadnice");
ok($cr->content() =~ /zoom: 7/,"ČR - správný zoom");

my $sk = $bot->get("http://zongl.info/mapa/sk.html");
ok($sk->content() =~ /google.maps.LatLng\(49\.0,19\.5\)/,"SK - správné souřadnice");
ok($sk->content() =~ /zoom: 7/,"SK - správný zoom");
