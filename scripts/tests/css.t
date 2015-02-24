#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 36;
$ENV{PERL_LWP_SSL_VERIFY_HOSTNAME} = 0;

my @adresy=(
"/a.css",
"/kpopup.css",
"/m.css",
"/r.css",
"/s.css",
"/t.css",
"/z.css",
"/zt.css",
"/css/w-light.css",
"/css/ww-light.css",
"/css/w-dark.css",
"/zw.css"
);

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header('Accept-Encoding'=>'text/html');
$bot->add_header( 'Accept-Encoding' => '' );

foreach my $url(@adresy){
	my $response = $bot->get("https://zongl.info$url");
	my $content=$response->content();
	ok($bot->status() == 200, "Návratový kód 200 pro $url");
	ok($response->content_type() =~ /text\/css/, "Správný mime typ pro $url");
	my $chybneodkazy = 0;
	foreach my $radek(split("\n",$content)){
		if($radek =~ /url/){
			my $url = $radek;
			$url =~ s/.*url\(([^\)]*)\).*/$1/;
			$url =~ s/https:\/\/zonglovani.info//;
			$url =~ s/["']//g;
			$url =~ s/^\///;
			my $pozadavek = $bot->get("https://zongl.info/$url");
				if($bot->status() !~ /(200|301|302)/){
					$chybneodkazy++;
				}
				if($pozadavek->content_type() !~ /image/){
					$chybneodkazy++;
				}
			}
		}
	ok($chybneodkazy == 0,"CSS styl $url neobsahuje chybné odkazy na obrázky.");
}
