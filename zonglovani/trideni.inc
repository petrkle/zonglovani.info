<?php

$trans = array("�" => "ez","�" => "sz","�" => "cz","�" => "rz","�" => "zz","�" => "yz","�" => "az","�" => "iz","�" => "ez","�" => "uz","�" => "uz","�" => "dz","�" => "tz","�" => "nz","�" => "Ez","�" => "Sz","�" => "Cz","�" => "Rz","�" => "Zz","�" => "Yz","�" => "Az","�" => "Iz","�" => "Ez","�" => "Uz","�" => "Uz","�" => "Dz","�" => "Tz","�" => "Nz"," " => "_z");

function mojes($a, $b){
  /*
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle n�zvu triku
  */
 global $trans;

  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);


  return strcmp($a[1], $b[1]);
};

function mojes2($a, $b){
  /*
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle po�tu m��k� a n�zvu triku
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
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle siteswaps
  */
 global $trans;

  $a[3] = strtr($a[3], $trans);
  $b[3] = strtr($b[3], $trans);


  return strcmp($a[3], $b[3]);
};

function mojes4($a, $b){
  /*
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle obt��nosti
  */
global $trans;
$stupnice=array("snadn�","n�ro�n�","obt��n�","t�ko provediteln�","neprovediteln�");

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