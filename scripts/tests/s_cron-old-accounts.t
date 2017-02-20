#!/usr/bin/perl -w
use strict;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 13;
use String::MkPasswd qw(mkpasswd);
use File::Touch;
use File::Path qw(make_path remove_tree);
use File::Slurper 'write_text';
use Digest::SHA1 qw(sha1_hex);
use File::chmod::Recursive;

my $now=time();
my $warn_after=335;
my $lock_after=365;
my $day = 24*60*60;

my $DATA_LIDE='/home/www/zonglovani.info/data/lide';
my $DATA_LIDE_BY_MAIL='/home/www/zonglovani.info/data/lide.by.mail';
my $heslo = mkpasswd(-length => 13, -minnum => 4, -minlower => 4, -minupper => 2, -minspecial => 0);
my $nove_heslo = mkpasswd(-length => 13, -minnum => 4, -minlower => 4, -minupper => 2, -minspecial => 0);
my $jmeno = mkpasswd(-length => 10, -minnum => 0, -minlower => 4, -minupper => 2, -minspecial => 0);
my $login = 'tst'.mkpasswd(-length => 7, -minnum => 0, -minlower => 4, -minupper => 0, -minspecial => 0);

my $tld = mkpasswd(-length => 2, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $domain = 'tst'.mkpasswd(-length => 7, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $mailuser = mkpasswd(-length => 5, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $fl = $mailuser;
$fl =~ s/^(.).*/$1/;
my $mail="$mailuser\@$domain.$tld";
my $maildomain="$domain.$tld";

my $vzkaz = mkpasswd(-length => 50, -minnum => 0, -minlower => 20, -minupper => 20, -minspecial => 0);

# vytvořit fiktivní účet

mkdir "$DATA_LIDE/$login";
make_path "$DATA_LIDE_BY_MAIL/$maildomain/$fl/$mailuser";
write_text "$DATA_LIDE_BY_MAIL/$maildomain/$fl/$mailuser/login", $login;
touch "$DATA_LIDE/$login/$mail.mail";
write_text "$DATA_LIDE/$login/jmeno.txt", $jmeno;
write_text "$DATA_LIDE/$login/registrace.txt", $now;
write_text "$DATA_LIDE/$login/soukromi.txt", "formular";
write_text "$DATA_LIDE/$login/vzkaz.txt", $vzkaz;
write_text "$DATA_LIDE/$login/passwd.sha1", sha1_hex "$heslo$login";

my $ref = File::Touch->new(time => ($now - ($warn_after*$day) - $day));
$ref->touch(("$DATA_LIDE/$login/prihlaseni.txt"));

chmod_recursive 0777, "$DATA_LIDE/$login";

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');
ok($cron == 0,'Spuštění cronu');

sleep(1);

ok(-f "/home/fakemail/$mail.1.eml", 'Připomínací email přišel');

ok(-f "/home/www/zonglovani.info/data/sendmails/$mail.spici", 'Záznam o odeslání připomínacího emailu');

$cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí dvakrát');

open MAIL, "/home/fakemail/$mail.1.eml";
my @zprava = <MAIL>;
close MAIL;

my @odkazy = grep /https:\/\/zongl\.info\/lide\/nastaveni/, @zprava;
my $pocetodkazu = @odkazy;

ok($pocetodkazu > 0,"Email obsahuje odkaz na nastavení");

my $zs_nastave = $bot->get('https://zongl.info/lide/nastaveni/');
ok($zs_nastave->content() =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Nastavení je bez přihlášení nepřístupné');

my $zs_prihlaseni = $bot->submit_form(form_number => 0,fields => {'login'=>$mail,'heslo'=>$heslo});

my $zs_nastaveni_uziv = $zs_prihlaseni->content();

ok($zs_nastaveni_uziv =~ /title="Tvůj účet.">$jmeno<\/a>/,'Úspěšné přihlášení - jméno souhlasí');
ok($zs_nastaveni_uziv =~ /E-mail: <strong>$mail<\/strong>/,'Úspěšné přihlášení - email souhlasí');

my $pozadavek = $bot->get('https://zongl.info/lide/odhlaseni.php');

$cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');

ok(!-f "/home/www/zonglovani.info/data/sendmails/$mail.spici", 'Smazání záznam o odeslání připomínacího emailu');

$cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí po přihlášení');


$ref = File::Touch->new(time => ($now - ($lock_after*$day) - $day));
$ref->touch(("$DATA_LIDE/$login/prihlaseni.txt"));

$cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');

$zs_prihlaseni = $bot->get('https://zongl.info/lide/prihlaseni.php');
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => {'login'=>$mail,'heslo'=>$heslo});

ok($zs_prihlaseni->content() =~ /Účet je zrušen/,'Neaktivní účet je zrušený');

$ref = File::Touch->new(time => ($now - ($warn_after*$day) - $day));
$ref->touch(("$DATA_LIDE/$login/prihlaseni.txt"));

$cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí na účty zrušené uživateli');
unlink("$DATA_LIDE/$login/LOCKED");

touch "$DATA_LIDE/$login/REVOKED";

$cron = system('php /home/www/zonglovani.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí na zablokované účty zlobivých uživatelů');

remove_tree "$DATA_LIDE/$login", "$DATA_LIDE_BY_MAIL/$maildomain";
system "sudo", "/bin/bash", "/home/www/zonglovani.info/scripts/tests/clean.sh";
