#!/usr/bin/perl
use strict;
use warnings;

use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 2;
use Time::Local;
use Date::Parse;
use File::Temp     qw/tempfile/;

my $bot = WWW::Mechanize->new(autocheck => 0);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $now = time();

open T, '</home/www/zonglovani.info/tip/tipy.inc' or die $!;
my @radky = <T>;
close T;

my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
$year = $year + 1900;
my $mesic = $mon+1;

my $spravne_tipy = 0;
my $spatne_tipy = 0;

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

			(undef, my $temp) = tempfile;

			$fl =~ s/^(.).*/$1/;
			my $popis=$parts[4];
			if(length($titulek)<=0){
				$chyby++;
				diag("Chybějící titulek $tip");
			}
			if(length($popis)<=0){
				$chyby++;
				diag("Chybějící popis $tip");
			}
			if(length($img)<=0){
				$chyby++;
				diag("Chybějící obrázek $tip");
			}
			if(length($url)<=0){
				$chyby++;
				diag("Chybějící odkaz $tip");
			}
			$bot->get("https://zongl.info$url");
			if($bot->status() !~ /(200|301|302)/){
				$chyby++;
				diag("https://zongl.info$url return ".$bot->status());
			}
			$bot->get("https://zongl.info/img/$fl/$img", ':content_file' => $temp);

			if($bot->status() !~ /(200|301|302)/){
				$chyby++;
				diag("https://zongl.info/img/$fl/$img return ".$bot->status());
			}
			if($chyby==0){
				$spravne_tipy++;
			}else{
				$spatne_tipy++;
			}
		}
	}
}

my $min_tips = 6;

ok($spravne_tipy>=$min_tips,"Počet tipů v zásobě $spravne_tipy. Doporučené minimum je $min_tips");
ok($spatne_tipy==0,"Tipy neobsahují chybný odkaz, obrázek, text nebo popis");
