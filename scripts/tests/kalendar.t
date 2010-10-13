#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 5;
use Time::Local;

my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
$year = $year + 1900;
my $mesic = $mon+1;
my @abbr = qw( Leden Únor Březen Duben Květen Červen Červenec Srpen Září Říjen Listopad Prosinec );
my $mesicrok = "$abbr[$mon] $year";


my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
my $response = $bot->get('http://zongl.info/kalendar');
my $content=$response->content();

ok(defined($response), 'Stránka kalendáře je dostupná');
ok($content =~ /.*<title>Kalendář žonglování<\/title>/, 'Správný titulek');
ok($content =~ /<strong class="add">Přidat novou<\/strong>/, 'Přidávat mohou přihlášení uživatelé.');
ok($content =~ /<caption>$mesicrok<\/caption>/, 'Aktuální měsíc');
ok($content =~ /Dnes je: $mday\. $mesic\. $year/, 'Dnešní den');
