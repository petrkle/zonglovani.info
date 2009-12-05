<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
require('pusobiste.php');

if(is_logged()){
	$smarty->assign('titulek','Nastavení');
	$chyby=array();

	if(isset($_GET['uprav'])){
		$uprav=$_GET['uprav'];

		if($uprav=='jmeno'){
			if(isset($_POST['jmeno']) and isset($_POST['odeslat'])){
				$jmeno=trim($_POST['jmeno']);

				if(strlen($jmeno)<3){
					array_push($chyby,'Jméno není zadané, nebo je příliš krátké.');
				}elseif(strlen($jmeno)>256){
					array_push($chyby,"Jméno je příliš dlouhé.");
				}elseif(eregi("[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)'\"_:´ˇ\\|#`~,ß]",$jmeno)){
					array_push($chyby,"Jméno obsahuje nepovolené znaky.");
				}elseif($jmeno==$_SESSION["uzivatel"]["jmeno"]){
					# nic :^)
				}else{
					if(is_zs_jmeno($jmeno)){
						array_push($chyby,'Zadané jméno už používá jiný uživatel.');
					}
				}
				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA."/".$_SESSION["uzivatel"]["login"]."/jmeno.txt","w");
					fwrite($foo,$jmeno);
					fclose($foo);
					$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
				}
			}
				$smarty->assign('titulek','Zobrazované jméno');
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-jmeno.tpl');
				$smarty->display('paticka.tpl');

		}elseif($uprav=='soukromi'){

			if(isset($_POST['soukromi']) and isset($_POST['odeslat'])){
				if($_POST['soukromi']=='formular'){
					$soukromi='formular';
				}else{
					$soukromi='mail';
				}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/soukromi.txt','w');
					fwrite($foo,$soukromi);
					fclose($foo);
					$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
				}
			}
				$smarty->assign('titulek','Zobrazování e-mailu');
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-soukromi.tpl');
				$smarty->display('paticka.tpl');
		}elseif($uprav=='foto'){
			if(isset($_FILES['foto']) and isset($_POST['odeslat'])){
					if($_FILES['foto']['size']>(200*1024)){
						array_push($chyby,'Obrázek je příliš velký.');
					}
					$obrazekinfo=getimagesize($_FILES['foto']['tmp_name']);
					if(is_array($obrazekinfo)){
						if($obrazekinfo[0]>300 or $obrazekinfo[1]>300){
							array_push($chyby,'Rozměry obrázku jsou příliš velké.');
						}
						if($obrazekinfo['mime']!='image/jpeg'){
							array_push($chyby,'Špatný formát souboru.');
						}
					}else{
						array_push($chyby,'Odeslaný soubor není obrázek.');
					}
				if(count($chyby)==0){
					move_uploaded_file($_FILES['foto']['tmp_name'],LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg');
					$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=uploaded');
					exit();
				}

			}
			if(isset($_POST['smazat']) and is_file(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg')){
				unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg');
				$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
				header('Location: '.LIDE_URL.basename(__FILE__).'?result=deleted');
				exit();
			}

				$smarty->assign('titulek','Fotografie');
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-foto.tpl');
				$smarty->display('paticka.tpl');
		
		
		}elseif($uprav=='web'){

			if(isset($_POST['web']) and isset($_POST['odeslat'])){
					$web=$_POST['web'];
					if(strlen($web)>1024){
						array_push($chyby,'Adresa je příliš dlouhá.');
					}
					if(strlen($web)>0 and !preg_match('/^http:\/\/[a-z0-9]+\.[a-z]{2,4}.*/',$web)){
						array_push($chyby,'Špatný formát adresy.');
					}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/web.txt','w');
					fwrite($foo,$web);
					fclose($foo);
					$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
				}
			}else{
				if(isset($_SESSION['uzivatel']['web'])){
					$web=$_SESSION['uzivatel']['web'];
				}else{
					$web='';
				}
			}
				$smarty->assign('titulek','Internetová stránka');
				$smarty->assign('chyby',$chyby);
				$smarty->assign('web',$web);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-web.tpl');
				$smarty->display('paticka.tpl');

		}elseif($uprav=='dovednosti'){


			if(isset($_POST['odeslat'])){
					$pocet=0;
					$foo=fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/dovednosti.txt','w');
					foreach($dovednosti as $nazev=>$obsah){
						if(isset($_POST[$nazev])){
							$bar=$_POST[$nazev];
							if(in_array($bar,$dovednosti[$nazev]['hodnoty']) and $bar!='n'){
								fwrite($foo,"$nazev:$bar\n");
								$pocet++;
							}
						}
					}
					fclose($foo);
					if($pocet==0){
						unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/dovednosti.txt');
					}
					$_SESSION['uzivatel']['dovednosti']=get_user_dovednosti($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
			}

				
				foreach($dovednosti as $nazev=>$obsah){
					if(isset($_SESSION['uzivatel']['dovednosti'][$nazev])){
						$dovednosti[$nazev]['stav']=$_SESSION['uzivatel']['dovednosti'][$nazev];
					}else{
						$dovednosti[$nazev]['stav']='n';
					}
				}

				$smarty->assign('titulek','Žonglérské dovednosti');
				$smarty->assign('dovednosti',$dovednosti);
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-dovednosti.tpl');
				$smarty->display('paticka.tpl');
		
		}elseif($uprav=='pusobiste'){

			if(isset($_POST['odeslat'])){
					$foo=fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/pusobiste.txt','w');
					if(is_array($_POST['misto'])){
						foreach($_POST['misto'] as $nazev){
								if(isset($pusobiste[$nazev])){
									fwrite($foo,"$nazev\n");
								}
							}
						}
					fclose($foo);
					if(count($_POST['misto'])==0){
						unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/pusobiste.txt');
					}
					$_SESSION['uzivatel']['pusobiste']=get_user_pusobiste($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
			}

				foreach($pusobiste as $nazev=>$obsah){
					if(is_array($_SESSION['uzivatel']['pusobiste']) and in_array($nazev,$_SESSION['uzivatel']['pusobiste'])){
						$pusobiste[$nazev]['stav']='y';
					}else{
						$pusobiste[$nazev]['stav']='n';
					}
				}

				$smarty->assign('titulek','Místo(a) kde žongluješ');
				$smarty->assign('pusobiste',$pusobiste);
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-pusobiste.tpl');
				$smarty->display('paticka.tpl');
		
		}elseif($uprav=='zruseni'){
			if(isset($_POST['nechat'])){
					header('Location: '.LIDE_URL.basename(__FILE__));
					exit();
			}

			if(isset($_POST['zrusit'])){
					$tmp=LIDE_TMP.'/'.$_SESSION['uzivatel']['email'];
					$key=abs(crc32($_SESSION['uzivatel']['email'].time().$_SESSION['uzivatel']['login']));
					if(!is_dir($tmp)){
						mkdir($tmp);
					}

					$foo=fopen($tmp.'/locked.key','w');
					fwrite($foo,$key);
					fclose($foo);

					$foo=fopen($tmp.'/locked.time','w');
					fwrite($foo,time());
					fclose($foo);

					$foo=fopen($tmp.'/locked.login','w');
					fwrite($foo,$_SESSION['uzivatel']['login']);
					fclose($foo);

				$subject = "=?utf-8?Q?".preg_replace("/=\r\n/","",quoted_printable_encode("Zrušení účtu"))."?=";

				$headers = 'Return-Path: robot@zonglovani.info' . "\r\n" .
				'From: robot@zonglovani.info' . "\r\n" .
				'Reply-To: robot@zonglovani.info' . "\r\n" .
				'Content-Type: text/plain; charset=utf-8' . "\r\n" .
				'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
				'Precedence: bulk';
$message = 'Ahoj,

pro zrušení účtu v žonglérově slabikáři klikni na tento odkaz:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zruseni.php?m='.$_SESSION['uzivatel']['email'].'&k='.$key.'

Odkaz platí do: '.date("j. n. Y G.i",(time()+TIMEOUT_REGISTRATION)).'

-- 
Petr Kletečka

admin@zonglovani.info
http://zonglovani.info/kontakt.html
';

		$vysledek=mail($_SESSION['uzivatel']['email'], $subject, quoted_printable_encode($message), $headers);
		if($vysledek){
			header('Location: '.LIDE_URL.basename(__FILE__).'?result=send');
		}else{
			header('Location: '.LIDE_URL.basename(__FILE__).'?result=ko');
		}
			}

				$smarty->assign('titulek','Zrušení účtu');
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-zruseni.tpl');
				$smarty->display('paticka.tpl');

		}elseif($uprav=='mail'){

				$smarty->assign('titulek','Změna adresy elektronické pošty');
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-mail.tpl');
				$smarty->display('paticka.tpl');
		
		}elseif($uprav=='vzkaz'){
			if(isset($_POST['vzkaz']) and isset($_POST['odeslat'])){
					$vzkaz=$_POST['vzkaz'];
					if(strlen($vzkaz)>1024){
						array_push($chyby,'Vzkaz je příliš dlouhý.');
					}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/vzkaz.txt','w');
					fwrite($foo,$vzkaz);
					fclose($foo);
					$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
				}
			}
				$smarty->assign('titulek','Nastavení vzkazu');
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-vzkaz.tpl');
				$smarty->display('paticka.tpl');

		}elseif($uprav=='heslo'){
			if(isset($_POST['stareheslo']) and isset($_POST['heslo']) and isset($_POST['heslo2']) and isset($_POST['odeslat'])){
					$stareheslo=$_POST['stareheslo'];
					$heslo=$_POST['heslo'];
					$heslo2=$_POST['heslo2'];

				if(strlen($heslo)<5){
					array_push($chyby,'Heslo není zadané, nebo je příliš krátké.');
				}

				if(eregi('.*'.$_SESSION['uzivatel']['login'].'.*',$heslo) or eregi('.*'.$_SESSION['uzivatel']['jmeno'].'.*',$heslo) or eregi('.*'.$_SESSION['uzivatel']['email'].'.*',$heslo)){
					array_push($chyby,'Zadané heslo je příliš slabé.');
				}

				if($heslo!=$heslo2){
					array_push($chyby,'Nově zadaná hesla se neshodují.');
				}

				if(sha1($stareheslo.$_SESSION['uzivatel']['login'])!=$_SESSION['uzivatel']['passwd_sha1']){
					array_push($chyby,'Špatně zadané aktuální heslo.');
				}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/passwd.sha1','w');
					fwrite($foo,sha1($heslo.$_SESSION['uzivatel']['login']));
					fclose($foo);
					$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
					header('Location: '.LIDE_URL.basename(__FILE__).'?result=ok');
					exit();
				}
			}
				$smarty->assign('titulek','Heslo');
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-heslo.tpl');
				$smarty->display('paticka.tpl');
		}else{
			header('Location: '.LIDE_URL.basename(__FILE__));
			exit();
		}
	
	}else{
		if(isset($_GET['result'])){
			$result=$_GET['result'];
			if($result=='send'){
				array_push($chyby,'Zpráva byla odeslána.');
			}elseif($result=='ok'){
				array_push($chyby,'Nastavení bylo uloženo.');
			}elseif($result=='uploaded'){
				array_push($chyby,'Fotografie byla uložena.');
			}elseif($result=='deleted'){
				array_push($chyby,'Fotografie je smazaná.');
			}else{
				array_push($chyby,'Došlo k chybě.');
			}
			$smarty->assign('chyby',$chyby);
		}
		$smarty->display('hlavicka.tpl');
		$smarty->display('nastaveni.tpl');
		$smarty->display('paticka.tpl');
	}
}else{
	header('Location: '.LIDE_URL.'prihlaseni.php?next='.LIDE_URL.basename(__FILE__).'&notice');
	exit();
}

?>
