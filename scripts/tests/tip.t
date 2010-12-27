#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 1;
use Time::Local;
use Date::Parse;

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->cookie_jar(HTTP::Cookies->new());

my $now = time();

open T, '</home/www/zonglovani.info/tip/tipy.inc' or die $!;
my @radky = <T>;
close T;

my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
$year = $year + 1900;
my $mesic = $mon+1;

my $spravne_tipy = 0;

foreach my $tip(@radky){
	chomp($tip);
	my @parts = split(/\*/,$tip);
	my $pocet = @parts;
	if($pocet==5){
		my @datum=split(/-/,$parts[0]);
		my $cas=str2time($parts[0]);
		if($cas && $cas>$now){
			my $chyby = 0;
			my $titulek=$parts[1];
			my $url=$parts[2];
			my $img=$parts[3];
			my $fl=$img;
			$fl =~ s/^(.).*/$1/;
			my $popis=$parts[4];
			if(length($titulek)<=0 || length($popis)<=0){
				$chyby++;
			}
			$bot->get("http://zongl.info$url");
			if($bot->status() !~ /(200|301|302)/){
				$chyby++;
			}
			$bot->get("http://zongl.info/img/$fl/$img");
			if($bot->status() !~ /(200|301|302)/){
				$chyby++;
			}
			if($chyby==0){
				$spravne_tipy++;
			}
		}
	}
}

ok($spravne_tipy>5,"$spravne_tipy správných tipů v zásobě");
