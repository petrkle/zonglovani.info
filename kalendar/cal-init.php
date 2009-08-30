<?php

$mesice=array ('Leden','Únor','Bøezen','Duben','Kvìten','Èerven','Èervenec','Srpen','Záøí','Øíjen','Listopad','Prosinec');

require_once CALENDAR_ROOT.'Calendar.php';
require_once CALENDAR_ROOT.'Month.php';
require_once CALENDAR_ROOT.'Day.php'; 
require_once CALENDAR_ROOT.'Month/Weekdays.php';
require_once CALENDAR_ROOT.'Decorator.php';

class DiaryEvent extends Calendar_Decorator { 
    var $entries = array();
     
    function addEntry($entry) { 
        $this->entries[] = $entry; 
    } 

    function getEntry() { 
        $entry = each($this->entries); 
        if ($entry) { 
            return $entry['value']; 
        } else { 
            reset($this->entries); 
            return false; 
        } 
    }
    function entryCount() {
        return count($this->entries);
    }
} 

class MonthPayload_Decorator extends Calendar_Decorator {
    function build($selectedDays=array(),$events=array()) {
        parent::build($selectedDays); 
        foreach ($this->calendar->children as $i=> $child) {
            // be very careful since we are passing $child by reference to DiaryEvent
            $this->calendar->children[$i] = &new DiaryEvent($child);
            unset($child); // unset the pointer!
        }
        if (count($events) > 0) { 
            $this->setSelection($events); 
        }
        return true; 
    }
    function setSelection($events) {
        foreach ($this->calendar->children as $i=> $child) { 
            $stamp1 = $this->calendar->cE->dateToStamp(
                $child->thisYear(), $child->thisMonth(), $child->thisDay());
            $stamp2 = $this->calendar->cE->dateToStamp(
                $child->thisYear(), $child->thisMonth(), $child->nextDay());
            foreach ($events as $event) {
                if (($stamp1 >= $event['start'] && $stamp1 < $event['end']) ||
                    ($stamp2 > $event['start'] && $stamp2 < $event['end']) ||
                    ($stamp1 <= $event['start'] && $stamp2 > $event['end'])
                /*if (($stamp1 >= $event['start'] && $stamp1 < $event['end']) || 
                    ($stamp1 <= $event['start'] && $stamp2 > $event['end'])*/ ) {
                        $this->calendar->children[$i]->addEntry($event);
                        $this->calendar->children[$i]->setSelected();
                }
            }
        }
    }
}

function get_event_data($id,$storage=CALENDAR_DATA,$charset="iso-8859-2"){
			$udalost=array();
			$navrat=false;
	if(is_readable($storage."/".$id)){
			$file=basename($id);
			$filename=explode("-",$file);

			$udalost["zacatek"]=substr($filename[0],0,4)."-".substr($filename[0],4,2)."-".substr($filename[0],6,2);
			$udalost["konec"]=substr($filename[1],0,4)."-".substr($filename[1],4,2)."-".substr($filename[1],6,2);
			$udalost["id"]=ereg_replace("\.cal$","",$id);
			$udalost["insert"]=ereg_replace("\.cal$","",$filename[3]);
			$udalost["vlozil"]=$filename[2];
			$udalost["month_url"]=CALENDAR_URL.substr($filename[0],0,4)."-".substr($filename[0],4,2).".html";

			$db=file("$storage/$file");
			foreach($db as $radek){
				$radek=trim($radek);
				$zac=strpos($radek,":");
				$prop=substr($radek,0,$zac);
				$value=iconv("iso-8859-2",$charset,substr($radek,$zac+1));
				$udalost[$prop]=$value;
			}

		if(isset($udalost["update"])){
			$udalost["update"]=strtotime($udalost["update"]);
			$udalost["update_hr"]=date("j. n. Y",$udalost["update"]);
		}
		$udalost["zacatek"].=" ".$udalost["time_start"];
		$udalost["konec"].=" ".$udalost["time_end"];
		$udalost["start"]=strtotime($udalost["zacatek"]);
		$udalost["start_hr"]=date("j. n. Y G.i",strtotime($udalost["zacatek"]));
		$udalost["start_ical"]=date("Ymd\THis\Z",(strtotime($udalost["zacatek"])-date("Z",strtotime($udalost["zacatek"]))));
		$udalost["time"]=strtotime($udalost["time_start"]);
		$udalost["end"]=strtotime($udalost["konec"]);
		$udalost["end_hr"]=date("j. n. Y G.i",strtotime($udalost["konec"]));
		$udalost["end_ical"]=date("Ymd\THis\Z",(strtotime($udalost["konec"])-date("Z",strtotime($udalost["konec"]))));
		$udalost["insert_hr"]=date("j. n. Y",$udalost["insert"]);
		$udalost["insert_mr"]=date("c",$udalost["insert"]);
		$navrat=$udalost;

}
return $navrat;
}

function write_event_data($udalost){
	$udalost["time_start"]=date("H:i",strtotime($udalost["zacatek"]));
	$udalost["time_end"]=date("H:i",strtotime($udalost["konec"]));
	$filename=$udalost["id"].".cal";
	unset($udalost["id"]);
	unset($udalost["zacatek"]);
	unset($udalost["konec"]);
	unset($udalost["vlozil"]);
	unset($udalost["insert"]);
	$udalost["update"]=date("Ymd H:i",time());

		$foo=fopen(CALENDAR_DATA."/".$filename,"w");
		foreach($udalost as $klic => $hodnota){
			fwrite($foo,"$klic:$hodnota\n");
		}
		fclose($foo);
}

function get_cal_data($rok,$mesic){
	$vypis=array();
  if(is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)){
	$adr=opendir(CALENDAR_DATA);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".cal" and ereg(".*$rok$mesic.*",$file))
		{
			array_push($vypis,get_event_data($file));
		};
	};
	closedir($adr); 
  };

	return $vypis;
}

function get_all_cal_data(){
	$vypis=array();
  if(is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)){
	$adr=opendir(CALENDAR_DATA);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".cal")
		{
			array_push($vypis,get_event_data($file,CALENDAR_DATA,$charset="utf8"));
		};
	};
	closedir($adr); 
  };

	return $vypis;
}

function get_future_data(){
	$vypis=array();
  if(is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)){
	$adr=opendir(CALENDAR_DATA);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".cal")
		{
			$konec=substr($file,9,4)."-".substr($file,13,2)."-".substr($file,15,2);
			if(date("U",strtotime($konec))>time()){
				array_push($vypis,get_event_data($file));
			}
		};
	};
	closedir($adr); 
  };

	return $vypis;
}

function event_validation($udalost,$now){
	$chyby=array();

	if(strlen($udalost["title"])<3){
		array_push($chyby,"Název není zadán, nebo je pøíli¹ krátký.");
	}

	if(strlen($udalost["title"])>100){
		array_push($chyby,"Název je pøíli¹ dlouhý.");
	}
	
	if(strlen($udalost["desc"])<3){
		array_push($chyby,"Popis není zadán, nebo je pøíli¹ krátký.");
	}

	if(strlen($udalost["desc"])>3000){
		array_push($chyby,"Popis je pøíli¹ dlouhý.");
	}

	if(strlen($udalost["misto"])<2){
		array_push($chyby,"Místo není zadané, nebo je pøíli¹ krátké.");
	}

	if(strlen($udalost["misto"])>200200){
		array_push($chyby,"Místo je pøíli¹ dlouhé.");
	}

	if(!ereg("^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$",$udalost["zacatek"])){
		array_push($chyby,"©patný formát zaèátku události.");
		$zacatek_time=false;
	}else{
			$zacatek_time=strtotime($udalost["zacatek"]);

			if($zacatek_time>$now+3600*24*365){
				array_push($chyby,"Zaèátek události za víc jak jeden rok.");
			}
	}

	if(strlen($udalost["url"])>0 and !eregi("^http://",$udalost["url"])){
		array_push($chyby,"©patný formát odkazu.");
	}

	if(strlen($udalost["mapa"])>0 and !eregi("^http://",$udalost["mapa"])){
		array_push($chyby,"©patný formát odkazu na mapu.");
	}

	if(!ereg("^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$",$udalost["konec"])){
		array_push($chyby,"©patný formát konce události.");
		$konec_time=false;
	}else{
		$konec_time=strtotime($udalost["konec"]);
		
		if($konec_time<$now){
				array_push($chyby,"Konec události je v minulosti.");
			}

			if($konec_time>$now+3600*24*365){
				array_push($chyby,"Konec události za víc jak jeden rok.");
			}
	}

	if($zacatek_time and $konec_time){
		if($zacatek_time==$konec_time){
				array_push($chyby,"Událost musí mít nìjakou délku.");
		}
	
		if($zacatek_time>$konec_time){
				array_push($chyby,"Událost konèí døív ne¾ zaèíná.");
		}

		if(($konec_time-$zacatek_time)>3600*24*30){
				array_push($chyby,"Událost je pøíli¹ dlouhá.");
		}
	}

	return $chyby;
}

function get_udalost_post(){
	$udalost=array();
	$promene=array("id","title","desc","misto","zacatek","konec","url","mapa");
	foreach($promene as $foo){
		if(isset($_POST[$foo])){
			$udalost[$foo]=trim($_POST[$foo]);
		}else{
			$udalost[$foo]="";
		}
	}
	return $udalost;
}

function get_deleted_events(){
	$vypis=array();
  if(is_dir(CALENDAR_DELETED) and opendir(CALENDAR_DELETED)){
	$adr=opendir(CALENDAR_DELETED);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".cal" and ereg(".*-".$_SESSION["uzivatel"]["login"]."-.*\.cal$",$file)){
			array_push($vypis,get_event_data($file,CALENDAR_DELETED));
		};
	};
	closedir($adr); 
  };
	return $vypis;
}

?>
