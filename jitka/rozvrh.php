<?php
require('table-extractor.php');
# spouštět každý den v 7 a 10 hodin

$trida='6.B';
$predmety=array('Cm','Aj','M','Nj','Ek','Tv','Čj','Ms','Ak','Ls1','Jzsm','OdkA');

$datum=date('ymd',time()+(24*3600));

if(date('N')!=7 and date('G',time())>9){
	# pozdeji spouštět jen v neděli
	exit();
}else{
	$datum=date('ymd',time());
}

if(date('N')==6){
	# sobota
	exit();
}

$url='http://www.gvp.cz/supl/su'.$datum.'.htm';
$prijemce='jitka.novotna@t-email.cz';

$tx = new tableExtractor;
$tx->source = iconv('windows-1250','utf-8',file_get_contents($url));
$tx->anchor = 'tb_suplucit_3';
$tx->stripTags = true;
$suply = $tx->extractTable();

$sp=start_points($suply);
$zprava=array();

if(isset($sp[$trida]['zacatek']) and isset($sp[$trida]['konec'])){
	for($foo=$sp[$trida]['zacatek'];$foo<=$sp[$trida]['konec'];$foo++){
		$hodina=trim(preg_replace('/\.hod$/','.h',$suply[$foo]['Změny v rozvrzích tříd: (2)']));
		$predmet=trim($suply[$foo]['Změny v rozvrzích tříd: (3)']);
		if(in_array($predmet,$predmety)){
			$bar=$hodina.'-'.$predmet;
			array_push($zprava,$bar);
		}
	}
}

if(count($zprava)>0){
	$headers = 'From: web@gvp.cz' . "\r\n" .
	'Reply-To: web@gvp.cz' . "\r\n" .
	'Precedence: bulk' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($prijemce,'Supl-'.$trida,join(';',$zprava), $headers);
}

function start_points($suplovani){
	$navrat=array();
	$foo=1;
	foreach($suplovani as $radek){
		$trida=trim($radek['Změny v rozvrzích tříd:']);
		if(strlen($trida)!=0){
			$navrat[$trida]['zacatek']=$foo;
			$trida_aktualni=$trida;
		}else{
			$navrat[$trida_aktualni]['konec']=$foo;
		}
		$foo++;
	}
	return $navrat;
}
?>
