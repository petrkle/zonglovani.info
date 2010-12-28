#!/usr/bin/perl -w
use strict;
use WWW::Mechanize;
use Test::More tests => 11;
use String::MkPasswd qw(mkpasswd);

my $now=time();
my $warn_after=335;
my $lock_after=365;

my $DATA_LIDE='/home/www/zonglovani.info/data/lide';
my $heslo = mkpasswd(-length => 13, -minnum => 4, -minlower => 4, -minupper => 2, -minspecial => 0);
my $nove_heslo = mkpasswd(-length => 13, -minnum => 4, -minlower => 4, -minupper => 2, -minspecial => 0);
my $jmeno = mkpasswd(-length => 10, -minnum => 0, -minlower => 4, -minupper => 2, -minspecial => 0);
my $login = 'tst'.mkpasswd(-length => 7, -minnum => 0, -minlower => 4, -minupper => 0, -minspecial => 0);

my $tld = mkpasswd(-length => 2, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $domain = mkpasswd(-length => 7, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $mailuser = mkpasswd(-length => 5, -minnum => 0, -minlower => 2, -minupper => 0, -minspecial => 0);
my $mail="$mailuser\@$domain.$tld";

my $vzkaz = mkpasswd(-length => 50, -minnum => 0, -minlower => 20, -minupper => 20, -minspecial => 0);

# vytvořit fiktivní účet

system("mkdir $DATA_LIDE/$login");
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

system("touch -t $year$mesic$mday"."1200.00 $DATA_LIDE/$login/prihlaseni.txt");
system("chmod -R oug+w $DATA_LIDE/$login");

my $bot = WWW::Mechanize->new(autocheck => 1);
$bot->cookie_jar(HTTP::Cookies->new());

my $pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');
ok($bot->status() == 200,'Spuštění cronu');

sleep 1;
ok(-f "/home/fakemail/$mail.1", 'Připomínací email přišel');

ok(-f "/home/www/zonglovani.info/data/sendmails/$mail.spici", 'Záznam o odeslání připomínacího emailu');

$pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');
sleep 1;
ok(!-f "/home/fakemail/$mail.2", 'Připomínací email nechodí dvakrát');

open MAIL, "/home/fakemail/$mail.1";
my @zprava = <MAIL>;
close MAIL;

my @odkazy = grep /http:\/\/zongl\.info\/lide\/nastaveni/, @zprava;
my $pocetodkazu = @odkazy;

ok($pocetodkazu == 3,"Email obsahuje odkaz na nastavení");

my $zs_nastave = $bot->get('http://zongl.info/lide/nastaveni/');
ok($zs_nastave->content() =~ /Pro zobrazení požadované stránky je nutné přihlášení/, 'Nastavení je bez přihlášení nepřístupné');

my $zs_prihlaseni = $bot->submit_form(form_number => 0,fields => {'login'=>$login,'heslo'=>$heslo});

my $zs_nastaveni_uziv = $zs_prihlaseni->content();

ok($zs_nastaveni_uziv =~ /Login: <strong>$login<\/strong>/,'Úspěšné přihlášení - login souhlasí');
ok($zs_nastaveni_uziv =~ /E-mail: <strong>$mail<\/strong>/,'Úspěšné přihlášení - email souhlasí');

$pozadavek = $bot->get('http://zongl.info/lide/odhlaseni.php');
$pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');

sleep 1;
ok(!-f "/home/www/zonglovani.info/data/sendmails/$mail.spici", 'Smazání záznam o odeslání připomínacího emailu');

$pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');
sleep 1;
ok(!-f "/home/fakemail/$mail.2", 'Připomínací email nechodí po přihlášení');


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

$pozadavek = $bot->get('http://zongl.info/cron/old-accounts.php');

$zs_prihlaseni = $bot->get('http://zongl.info/lide/prihlaseni.php');
$zs_prihlaseni = $bot->submit_form(form_number => 0,fields => {'login'=>$login,'heslo'=>$heslo});

ok($zs_prihlaseni->content() =~ /Účet byl zrušen/,'Neaktivní účet je zrušený');

system("rm -rf $DATA_LIDE/$login");
system("sudo /bin/bash /home/www/zonglovani.info/scripts/tests/clean.sh");