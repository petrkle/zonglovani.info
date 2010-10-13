#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 3;
use String::MkPasswd qw(mkpasswd);

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());
my $zs_homepage = $bot->get('http://zongl.info');
my $zs_search = $bot->submit_form(form_number => 0,fields => {'query'=>'Jitka','search'=>'1'});
my $neexistujici = 'tst_'.mkpasswd(-length => 14, -minnum => 0, -minlower => 4, -minupper => 5, -minspecial => 0);

my $content=$zs_search->content();

ok(defined($content), 'Úvodní stránka je dostupná');
ok($content =~ /Stránka výsledků:/, 'Jitka - nalezeno');

$zs_search = $bot->submit_form(form_number => 0,fields => {'query'=>$neexistujici,'search'=>'1'});
ok($zs_search->content() =~ /Nebyl nelezen žádný dokument vyhovující výrazu/, "$neexistujici nenalezeno");
