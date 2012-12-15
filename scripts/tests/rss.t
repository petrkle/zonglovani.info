#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 64;
my $minimalitems=3;
my @adresy=(
"/zonglovani.rss",
"/zonglovani.xml",
"/kalendar/kalendar.rss",
"/kalendar/kalendar.xml",
"/diskuse/zpravy.rss",
"/diskuse/zpravy.xml",
"/lide/uzivatele.rss",
"/lide/uzivatele.xml",
"/ostatni/changelog.rss",
"/ostatni/changelog.xml",
"/obrazky/obrazky.rss",
"/obrazky/obrazky.xml",
"/tip/tip.rss",
"/tip/tip.xml",
"/novinky/agregator.xml",
"/stat.xml"
);

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());

foreach my $url(@adresy){
	my $response = $bot->get("http://zongl.info$url");
	my $content=$response->content();
	ok($bot->status() == 200, "Návratový kód 200 pro $url");
	ok($response->content_type() =~ /application\/xml/, "Správný mime typ pro $url");
	my $count = 0;
	my $chybneodkazy = 0;
	while ($content =~ /<\/item>/g) { $count++ };
	ok($count>=$minimalitems,"RSS kanál $url obsahuje alespoň $minimalitems položky");
	foreach my $radek(split("\n",$content)){
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
