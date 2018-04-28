#!/usr/bin/perl
use strict;
use warnings;

use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 55;
use Test::XML;
my $minimalitems=3;
my @adresy=(
"/zonglovani.rss",
"/zonglovani.xml",
"/kalendar/kalendar.rss",
"/kalendar/kalendar.xml",
"/lide/uzivatele.rss",
"/lide/uzivatele.xml",
"/obrazky/obrazky.rss",
"/obrazky/obrazky.xml",
"/tip/tip.rss",
"/tip/tip.xml",
);

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

foreach my $url(@adresy){
	my $response = $bot->get("https://zongl.info$url");
	my $content=$response->content();
	ok($bot->status() == 200, "Návratový kód 200 pro $url");
	ok($response->content_type() =~ /application\/xml/, "Správný mime typ pro $url");
	my $count = 0;
	my $chybneodkazy = 0;
	is_well_formed_xml($content, "$url je dobře naformátované xml");
	while ($content =~ /<\/item>/g) { $count++ };
	ok($count>=$minimalitems,"RSS kanál $url obsahuje alespoň $minimalitems položky");
	foreach my $radek(split("\n",$content)){
		if($radek =~ /xml-stylesheet/){
			ok($radek !~ /smarty\.server/, 'xml-stylesheet obsahuje smarty.server');
		}
		if($radek =~ /<link>/){
			my $odkaz = $radek;
			$odkaz =~ s/.*<link>(.*)<\/link>.*/$1/;
			if($odkaz =~ /^http:\/\/zongl\.info/){
				my $pozadavek = $bot->get($odkaz);
				if($bot->status() !~ /(200|301|302)/){
					$chybneodkazy++;
				}
			}
		}
	}
	ok($chybneodkazy == 0,"RSS kanál $url neobsahuje chybné odkazy");
}
