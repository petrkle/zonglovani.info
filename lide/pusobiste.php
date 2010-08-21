<?php
$pusobiste=array();
$db=file('../mapa/mista.txt');
foreach($db as $line){
	$line=trim($line);
	$line=preg_split('/:/',$line);
	if(count($line)==8){
		$pusobiste[$line[0]]=array('nazev'=>$line[1],'odkud'=>$line[2],'kde'=>$line[3],'kraj'=>$line[4],'stat'=>$line[5],'lat'=>$line[6],'lng'=>$line[7]);
	}
}
?>
