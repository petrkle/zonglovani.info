#!/usr/bin/perl
use strict;
use warnings;
use WWW::Mechanize;
use LWP::ConnCache;
use Test::More tests => 4;
use String::MkPasswd qw(mkpasswd);
use Encode;

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->conn_cache(LWP::ConnCache->new);
$bot->add_header( 'Accept-Encoding' => '' );

my $zs_homepage = $bot->get('https://zongl.info');
my $zs_search = $bot->submit_form(form_number => 0,fields => {'query'=>decode_utf8('Míčky')});
my $neexistujici = 'tst_'.mkpasswd(-length => 14, -minnum => 0, -minlower => 4, -minupper => 5, -minspecial => 0);

my $content=$zs_search->content();

ok(defined($content), 'Úvodní stránka je dostupná');
ok($content =~ /Stránkování:/, 'Míčky - nalezeno');

my $zs_search_lide = $bot->submit_form(form_number => 0,fields => {'query'=>'Jitka'});

ok($zs_search_lide->content() =~ /<a href="\/lide\/jitka.html" class="title">/, 'Jitka - nalezeno');

$zs_search = $bot->submit_form(form_number => 0,fields => {'query'=>$neexistujici});
ok($zs_search->content() =~ /Vyhledávací robot nenašel žádnou stránku podobnou tvému dotazu/, "$neexistujici nenalezeno");
