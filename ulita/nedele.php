#!/usr/bin/php
<?php
$buz = 0;
for ($foo = 0; $foo < 150; ++$foo) {
    $bar = strtotime('10/7/2011') + ($foo * 24 * 3600);
    if (date('N', $bar) == 7) {
        $zbytek = $buz % 3;
        if ($zbytek == 0) {
            //print date('Y-m-d',$bar)."\n";
            echo preg_replace('/\. 0/', '.  ', preg_replace('/^0/', ' ', date('d. m. Y', $bar)))." 15-19h\n";
        }
        ++$buz;
    }
}
