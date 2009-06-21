<?php
define('CALENDAR_URL','/cal/'); 
define('CALENDAR_ROOT',$lib.'/calendar/'); 
define('CALENDAR_DATA',$_SERVER['DOCUMENT_ROOT'].CALENDAR_URL.'data'); 


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
                    ($stamp2 >= $event['start'] && $stamp2 < $event['end']) ||
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

function get_event_data($id){
			$udalost=array();
	if(is_readable(CALENDAR_DATA."/".$id)){
			$file=basename($id);
			$filename=explode("-",$file);

			$udalost["zacatek"]=substr($filename[0],0,4)."-".substr($filename[0],4,2)."-".substr($filename[0],6,2);
			$udalost["konec"]=substr($filename[1],0,4)."-".substr($filename[1],4,2)."-".substr($filename[1],6,2);
			$udalost["id"]=basename($file,".cal");

			$db=file(CALENDAR_DATA."/$file");
			foreach($db as $radek){
				$radek=trim($radek);
				$zac=strpos($radek,":");
				$prop=substr($radek,0,$zac);
				$value=substr($radek,$zac+1);
				$udalost[$prop]=$value;
			}

		$udalost["start"]=strtotime($udalost["zacatek"]." ".$udalost["time_start"]);
		$udalost["time"]=strtotime($udalost["time_start"]);
		$udalost["end"]=strtotime($udalost["konec"]." ".$udalost["time_end"]);

}
return $udalost;
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
?>
