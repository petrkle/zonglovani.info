#!/usr/bin/perl -w
use strict;
use LWP::ConnCache;
use WWW::Mechanize;
use Test::More tests => 13;
use String::MkPasswd qw(mkpasswd);

my $now=time();
my $warn_after=335;
my $lock_after=365;

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

system("mkdir $DATA_LIDE/$login");
system("mkdir -p $DATA_LIDE_BY_MAIL/$maildomain/$fl/$mailuser");
system("echo -n $login > $DATA_LIDE_BY_MAIL/$maildomain/$fl/$mailuser/login");
system("touch $DATA_LIDE/$login/$mail.mail");
system("echo -n $jmeno > $DATA_LIDE/$login/jmeno.txt");
system("echo -n $now > $DATA_LIDE/$login/registrace.txt");
system("echo -n formular  > $DATA_LIDE/$login/soukromi.txt");
system("echo -n $vzkaz > $DATA_LIDE/$login/vzkaz.txt");
system("echo -n \"$heslo$login\" | sha1sum | awk '{printf \$1}' > $DATA_LIDE/$login/passwd.sha1");

my $datum_varovani=$now-(($warn_after*24*3600)+(24*3600));
my $datum_zruseni=$now-(($lock_after*24*3600)+(24*3600));

my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime($datum_varovani);
$year = $year + 1900;
my $mesic = $mon+1;

if($mday<10){
	$mday="0$mday";
}

if($mesic<10){
	$mesic="0$mesic";
}

my $warn_time="$year$mesic$mday";

system("touch -t $warn_time"."1200.00 $DATA_LIDE/$login/prihlaseni.txt");
system("chmod -R oug+w $DATA_LIDE/$login");

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->conn_cache(LWP::ConnCache->new);
$bot->cookie_jar(HTTP::Cookies->new());
$bot->add_header( 'Accept-Encoding' => '' );

my $pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');
ok($bot->status() == 200,'Spuštění cronu');

ok(-f "/home/fakemail/$mail.1.eml", 'Připomínací email přišel');

ok(-f "/home/www/zonglovani.info/data/sendmails/$mail.spici", 'Záznam o odeslání připomínacího emailu');

$pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');

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

$pozadavek = $bot->get('https://zongl.info/lide/odhlaseni.php');
$pozadavek = $bot->get('https://zongl.info/cron/old-accounts.php');

ok(!-f "/home/www/zonglovani.info/data/sendmails/$mail.spici", 'Smazání záznam o odeslání připomínacího emailu');

$pozadavek = $bot->get('https://zongl.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí po přihlášení');


($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime($datum_zruseni);
$year = $year + 1900;
$mesic = $mon+1;

if($mday<10){
	$mday="0$mday";
}

if($mesic<10){
	$mesic="0$mesic";
}

system("touch -t $year$mesic$mday"."1200.00 $DATA_LIDE/$login/prihlaseni.txt");

$pozadavek = $bot->get('https://zongl.info/cron/old-accounts.php');

$zs_prihlaseni = $bot->get('https://zongl.info/lide/prihlaseni.php');
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => {'login'=>$mail,'heslo'=>$heslo});

ok($zs_prihlaseni->content() =~ /Účet je zrušen/,'Neaktivní účet je zrušený');

system("touch -t $warn_time"."1200.00 $DATA_LIDE/$login/prihlaseni.txt");
$pozadavek = $bot->get('https://zongl.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí na účty zrušené uživateli');
unlink("$DATA_LIDE/$login/LOCKED");

system("touch $DATA_LIDE/$login/REVOKED");
$pozadavek = $bot->get('https://zongl.info/cron/old-accounts.php');

ok(!-f "/home/fakemail/$mail.2.eml", 'Připomínací email nechodí na zablokované účty zlobivých uživatelů');

system("rm -rf $DATA_LIDE/$login");
system("rm -rf $DATA_LIDE_BY_MAIL/$maildomain");
system("sudo /bin/bash /home/www/zonglovani.info/scripts/tests/clean.sh");
