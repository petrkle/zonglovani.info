#!/usr/bin/php
<?php
if (PHP_SAPI != 'cli') {
    echo 'run it from command line';
    exit();
}

if (!isset($argv[1]) or !is_numeric($argv[1])) {
    echo "Usage: $argv[0] 123\n";
    exit;
}

define('API', 'http://api-jtv.rhcloud.com');
define('JTV', 'http://juggling.tv');
define('TMP', 'tmp');

$v = json_decode(file_get_contents(API.'/v/'.$argv[1]));

$xml = '<?xml version="1.0"?>
<klip>
	<nazev>'.$v->{'title'}.'</nazev>
	<link>http://juggling.tv:'.$v->{'swf_key'}.'</link>
	<typ>juggling.tv</typ>
	<popis>'.$v->{'description'}.'</popis>
	<download>'.$v->{'mp4'}.'</download>
	<delka>'.$v->{'duration'}.'</delka>
	<rozliseni>'.$v->{'width'}.'x'.$v->{'height'}.'</rozliseni>
	<velikost>'.$v->{'size'}.' '.$v->{'size_unit'}.'</velikost>
</klip>';

if (!is_dir(TMP)) {
    mkdir(TMP);
}

$filename = preg_replace('/[^-a-z]/', '', preg_replace('/ /', '-', strtolower($v->{'title'})));

echo "Saving: $filename.xml\n";

file_put_contents(TMP.'/'.$filename.'.xml', $xml);

system('wget -O '.TMP."/$filename.jpg ".JTV.'/thumb/l-0_'.$argv[1].'.jpg');
system('convert -verbose -resize 480x '.TMP."/$filename.jpg ".TMP."/$filename.jpg");
