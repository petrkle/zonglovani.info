<?php
require($_SERVER['DOCUMENT_ROOT'].'/vyhledavani/settings/database.php');
$PASSWD='e6wcHTth6';
$file = $_SERVER['DOCUMENT_ROOT'].'/data/dump.sql.bz2';
if(is_file($file) and isset($_POST['updatedb']) and isset($_POST['passwd']) and $_POST['passwd']==$PASSWD){
	$handle = @fopen('compress.bzip2://'.$file, 'r');
	$count = 0;
	$sql = '';
	while (!feof($handle)) {
			$s = fgets($handle);
			$sql .= $s;
			if (substr(rtrim($s), -1) === ';') {
					mysql_query($sql);
					$sql = '';
					$count++;
					print $count.' ';
			}
	}
}else{
	require('../404.php');
	exit();
}
?>