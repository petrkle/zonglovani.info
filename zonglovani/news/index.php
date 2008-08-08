<?

if(isset($_POST["saveit"])){
$fp = fopen ($_POST["filename"], "w+");
fwrite($fp,$_POST["obsah"]);
fclose($fp);
header("Location: .");
exit();
}

if(isset($_POST["deleteit"])){
unlink($_POST["filename"]);
header("Location: .");
exit();
}


?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
<title>news - slabikář</title>
</head>
<body>
<?php
function get_news(){
	$newsdir=".";

	if(is_dir($newsdir) and opendir($newsdir)){
	$vypis=array();
	$adr=opendir($newsdir);
	while (false!==($file = readdir($adr))) {
		if(ereg("^[0-9]{8}\.[0-9]{4}\-[0-9]{8}\.[0-9]{4}\.txt$",$file)){

			$zrok=substr($file,14,4);
			$zmesic=substr($file,18,2);
			$zden=substr($file,20,2);
			$zhod=substr($file,23,2);
			$zmin=substr($file,25,2);

			$krok=substr($file,0,4);
			$kmesic=substr($file,4,2);
			$kden=substr($file,6,2);
			$khod=substr($file,9,2);
			$kmin=substr($file,11,2);

			$zacatek=strtotime("$zrok/$zmesic/$zden $zhod:$zmin:00");
			$konec=strtotime("$krok/$kmesic/$kden $khod:$kmin:00");

			$vypis["$konec$zacatek"]=array(
				"soubor"=>$file,
				"obsah"=>file_get_contents("$newsdir/$file"),
				"zacatek"=>$zacatek,
				"konec"=>$konec
				);
		}
		};
	};
	krsort($vypis);
	return $vypis;
}

$news=get_news();

?>

<table border=\"1\">
<tr>
<th>Soubor</th>
<th>Začátek</th>
<th>Konec</th>
<th>Text</th>
<th>Úpravy</th>
</tr>


<?
foreach($news as $novinka){
	print "<form method=\"post\">";

	print "<tr>
		<td><input type=\"text\" value=\"".$novinka["soubor"]."\" name=\"filename\" class=\"filename\"/></td>
		<td>".date("j. n. Y H:i",$novinka["zacatek"])."</td>
		<td>".date("j. n. Y H:i",$novinka["konec"])."</td>
		<td><textarea name=\"obsah\">".htmlspecialchars(stripslashes($novinka["obsah"]))."</textarea></td>
		<th>
		<input type=\"submit\" name=\"saveit\" value=\"Uložit\" class=\"knoflik\" /><br />
		<input type=\"reset\" name=\"restart\" value=\"Původní\" class=\"knoflik\" /><br />
		<input type=\"submit\" name=\"deleteit\" value=\"Smazat\" class=\"knoflik\" />
		</th>
		</tr>";
	print "</form>";
}

?>

</table>

<br />
<br />
<br />
<br />
<br />
<br />
<hr />

<!--WZ-REKLAMA-1.0-STRICT-->

<style>
.filename {
	width: 250px;
}
textarea {
	width: 600px;
	height: 150px;
}
.knoflik {
	width: 80px;
	padding: 2px 0;
	margin: 5px 0;
}
</style>
</body>
</html>
