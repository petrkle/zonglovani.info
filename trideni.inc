<?php

$trans = array("ì" => "ez","¹" => "sz","è" => "cz","ø" => "rz","¾" => "zz","ý" => "yz","á" => "az","í" => "iz","é" => "ez","ú" => "uz","ù" => "uz","ï" => "dz","»" => "tz","ò" => "nz","Ì" => "Ez","©" => "Sz","È" => "Cz","Ø" => "Rz","®" => "Zz","Ý" => "Yz","Á" => "Az","Í" => "Iz","É" => "Ez","Ú" => "Uz","Ù" => "Uz","Ï" => "Dz","«" => "Tz","Ò" => "Nz"," " => "_z");

function mojes($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle názvu triku
  */
 global $trans;

  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);


  return strcmp($a[1], $b[1]);
};

function mojes2($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle poètu míèkù a názvu triku
  */
 global $trans;

  $a[2] = strtr($a[2], $trans);
  $b[2] = strtr($b[2], $trans);

 $navrat = strcmp($a[2],$b[2]);
  if(!$navrat){
  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);
	$navrat=strcmp($a[1],$b[1]);
	};
return $navrat;
}

function mojes3($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle siteswaps
  */
 global $trans;

  $a[3] = strtr($a[3], $trans);
  $b[3] = strtr($b[3], $trans);


  return strcmp($a[3], $b[3]);
};

function mojes4($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle obtí¾nosti
  */
global $trans;
$stupnice=array("snadné","nároèné","obtí¾né","tì¾ko proveditelné","neproveditelné");

	$foo = array_search($a[4],$stupnice);
  $bar = array_search($b[4],$stupnice);

  $navrat=strcmp($foo,$bar);

	if($navrat==0){
  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);
	$navrat=strcmp($a[1],$b[1]);
	};

return $navrat;
};


?>
