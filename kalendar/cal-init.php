<?php

$mesice = array('Leden', 'Únor', 'Březen', 'Duben', 'Květen', 'Červen', 'Červenec', 'Srpen', 'Září', 'Říjen', 'Listopad', 'Prosinec');
$dny_zkratky = array('Po', 'Út', 'St', 'Čt', 'Pá', 'So', 'Ne');

require_once CALENDAR_ROOT.'Calendar.php';
require_once CALENDAR_ROOT.'Month.php';
require_once CALENDAR_ROOT.'Day.php';
require_once CALENDAR_ROOT.'Month/Weekdays.php';
require_once CALENDAR_ROOT.'Decorator.php';

class DiaryEvent extends Calendar_Decorator
{
    public $entries = array();

    public function addEntry($entry)
    {
        $this->entries[] = $entry;
    }

    public function getEntry()
    {
        $entry = each($this->entries);
        if ($entry) {
            return $entry['value'];
        } else {
            reset($this->entries);

            return false;
        }
    }
    public function entryCount()
    {
        return count($this->entries);
    }
}

class MonthPayload_Decorator extends Calendar_Decorator
{
    public function build($selectedDays = array(), $events = array())
    {
        parent::build($selectedDays);
        foreach ($this->calendar->children as $i => $child) {
            // be very careful since we are passing $child by reference to DiaryEvent
            $this->calendar->children[$i] = new DiaryEvent($child);
            unset($child); // unset the pointer!
        }
        if (count($events) > 0) {
            $this->setSelection($events);
        }

        return true;
    }
    public function setSelection($events)
    {
        foreach ($this->calendar->children as $i => $child) {
            $stamp1 = $this->calendar->cE->dateToStamp($child->thisYear(), $child->thisMonth(), $child->thisDay());
            $stamp2 = $stamp1 + (3600 * 24);
            foreach ($events as $event) {
                if ($event['title'] == 'aaa') {
                    //print '<pre>';
                                //var_dump($event);
                                //exit();
                }
                if (
                                ($event['start'] >= $stamp1 and $event['start'] < $stamp2) or
                                ($event['end'] > $stamp1 and $event['end'] <= $stamp2) or
                                ($stamp1 > $event['start'] and $stamp2 < $event['end'] and $stamp2 > $event['start']) and $stamp1 < $event['end']) {
                    //print date('Y-m-d H.i',$stamp1).'<br>';
                        $this->calendar->children[$i]->addEntry($event);
                    $this->calendar->children[$i]->setSelected();
                }
            }
        }
    }
}

function get_event_data($id, $storage = CALENDAR_DATA)
{
    global $mesice;
    $udalost = array();
    $navrat = false;
    if (is_readable($storage.'/'.$id)) {
        $file = basename($id);
        $filename = explode('-', $file);

        $udalost['zacatek'] = substr($filename[0], 0, 4).'-'.substr($filename[0], 4, 2).'-'.substr($filename[0], 6, 2);
        $udalost['konec'] = substr($filename[1], 0, 4).'-'.substr($filename[1], 4, 2).'-'.substr($filename[1], 6, 2);
        $udalost['id'] = preg_replace('/\.cal$/', '', $id);
        $udalost['insert'] = preg_replace('/\.cal$/', '', $filename[3]);
        $udalost['vlozil'] = $filename[2];
        $udalost['vlozil_hr'] = get_name($filename[2]);
        $udalost['month_url'] = CALENDAR_URL.substr($filename[0], 0, 4).'-'.substr($filename[0], 4, 2).'.html';

        $db = file("$storage/$file");
        foreach ($db as $radek) {
            $radek = trim($radek);
            $zac = strpos($radek, ':');
            $prop = substr($radek, 0, $zac);
            $value = substr($radek, $zac + 1);
            $udalost[$prop] = $value;
        }

        if (isset($udalost['update'])) {
            $udalost['update'] = strtotime($udalost['update']);
            $udalost['update_hr'] = date('j. n. Y', $udalost['update']);
        }
        if (isset($udalost['url'])) {
            $udalost['url_hr'] = preg_replace('/^http:\/\/zonglovani.info/', '', $udalost['url']);
        }

        if (isset($udalost['img']) and is_readable(CALENDAR_IMG.'/'.$udalost['img'])) {
            $obrazekinfo = getimagesize(CALENDAR_IMG.'/'.$udalost['img']);
            $udalost['img_ts'] = filemtime(CALENDAR_IMG.'/'.$udalost['img']);
            if (is_array($obrazekinfo)) {
                $udalost['img_sirka'] = $obrazekinfo[0];
                $udalost['img_vyska'] = $obrazekinfo[1];
            } else {
                $udalost['img_sirka'] = '';
                $udalost['img_vyska'] = '';
            }
        } else {
            unset($udalost['img']);
        }
        $udalost['zacatek'] .= ' '.$udalost['time_start'];
        $udalost['konec'] .= ' '.$udalost['time_end'];
        $udalost['start'] = strtotime($udalost['zacatek']);
        $udalost['start_hr'] = date('j. n. Y G.i', strtotime($udalost['zacatek']));
        $udalost['month_name'] = $mesice[date('n', strtotime($udalost['zacatek'])) - 1].' '.date('Y', strtotime($udalost['zacatek']));
        $udalost['start_ical'] = date('Ymd\THis\Z', (strtotime($udalost['zacatek']) - date('Z', strtotime($udalost['zacatek']))));
        $udalost['time'] = strtotime($udalost['time_start']);
        $udalost['end'] = strtotime($udalost['konec']);
        $udalost['end_hr'] = date('j. n. Y G.i', strtotime($udalost['konec']));
        $udalost['end_ical'] = date('Ymd\THis\Z', (strtotime($udalost['konec']) - date('Z', strtotime($udalost['konec']))));
        $udalost['insert_hr'] = date('j. n. Y', $udalost['insert']);
        $udalost['insert_ical'] = date('Ymd\THis\Z', (strtotime($udalost['insert']) - date('Z', strtotime($udalost['insert']))));
        $udalost['insert_mr'] = date('c', $udalost['insert']);
        $udalost['insert_rss2'] = date('r', $udalost['insert']);
        $udalost['start_micro'] = date('c', $udalost['start']);
        $udalost['end_micro'] = date('c', $udalost['end']);
        $navrat = $udalost;
    }

    return $navrat;
}

function write_event_data($udalost)
{
    $udalost['time_start'] = date('H:i', strtotime($udalost['zacatek']));
    $udalost['time_end'] = date('H:i', strtotime($udalost['konec']));
    $filename = $udalost['id'].'.cal';
    if (isset($udalost['obrazek'])) {
        $obrazek = $udalost['obrazek'];
        if ($obrazek['type'] == 'image/png') {
            $pripona = '.png';
        } else {
            $pripona = '.jpg';
        }
        move_uploaded_file($obrazek['tmp_name'], CALENDAR_IMG.'/'.$udalost['id'].$pripona);
        $obrazekinfo = getimagesize(CALENDAR_IMG.'/'.$udalost['id'].$pripona);
        if ($obrazekinfo[0] > 500 or $obrazekinfo[1] > 600) {
            // moc velký obrázek - potřebuje zmenšit
            include $_SERVER['DOCUMENT_ROOT'].'/lib/SimpleImage.php';
            $image = new SimpleImage();
            $image->load(CALENDAR_IMG.'/'.$udalost['id'].$pripona);
            $image->resizeToMax(500, 600);
            $image->save(CALENDAR_IMG.'/resized-'.$udalost['id'].$pripona);
            rename(CALENDAR_IMG.'/resized-'.$udalost['id'].$pripona, CALENDAR_IMG.'/'.$udalost['id'].$pripona);
        }
        $udalost['img'] = $udalost['id'].$pripona;
        clearstatcache();
    }
    unset($udalost['img_sirka']);
    unset($udalost['img_vyska']);
    unset($udalost['obrazek']);
    unset($udalost['id']);
    unset($udalost['zacatek']);
    unset($udalost['konec']);
    unset($udalost['vlozil']);
    unset($udalost['insert']);
    $udalost['update'] = date('Ymd H:i', time());

    $foo = fopen(CALENDAR_DATA.'/'.$filename, 'w');
    foreach ($udalost as $klic => $hodnota) {
        fwrite($foo, "$klic:$hodnota\n");
    }
    fclose($foo);
}

function get_cal_data($rok, $mesic)
{
    $vypis = array();
    if (is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)) {
        $adr = opendir(CALENDAR_DATA);
        while (false !== ($file = readdir($adr))) {
            if (substr($file, -4) == '.cal' and preg_match("/.*$rok$mesic.*/", $file)) {
                array_push($vypis, get_event_data($file));
            }
        }
        closedir($adr);
    }

    return $vypis;
}

function get_events_around($id)
{
    $navrat = array();
    $vypis = array();
    if (is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)) {
        $adr = opendir(CALENDAR_DATA);
        while (false !== ($file = readdir($adr))) {
            if (substr($file, -4) == '.cal') {
                array_push($vypis, $file);
            }
        }
        closedir($adr);
    }

    sort($vypis);
    $aktualni_pozice = array_search($id.'.cal', $vypis);
    if (isset($vypis[($aktualni_pozice - 1)])) {
        $navrat['prev'] = get_event_data($vypis[($aktualni_pozice - 1)], CALENDAR_DATA, $charset = 'utf8');
    }
    if (isset($vypis[($aktualni_pozice + 1)])) {
        $navrat['next'] = get_event_data($vypis[($aktualni_pozice + 1)], CALENDAR_DATA, $charset = 'utf8');
    }

    return $navrat;
}

function get_all_cal_data()
{
    $vypis = array();
    if (is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)) {
        $adr = opendir(CALENDAR_DATA);
        while (false !== ($file = readdir($adr))) {
            if (substr($file, -4) == '.cal') {
                array_push($vypis, get_event_data($file, CALENDAR_DATA, $charset = 'utf8'));
            }
        }
        closedir($adr);
    }

    return $vypis;
}

function get_future_data($filtr = false)
{
    $vypis = array();
    if (is_dir(CALENDAR_DATA) and opendir(CALENDAR_DATA)) {
        $adr = opendir(CALENDAR_DATA);
        if ($filtr and is_zs_account($filtr)) {
            $filtr = '.+\-'.$filtr.'\-.+\.cal$';
        } else {
            $filtr = '.+\.cal$';
        }
        while (false !== ($file = readdir($adr))) {
            if (preg_match('/'.$filtr.'/', $file)) {
                $konec = substr($file, 9, 4).'-'.substr($file, 13, 2).'-'.substr($file, 15, 2).' 22:00:00';
                if (date('U', strtotime($konec)) > time()) {
                    array_push($vypis, get_event_data($file));
                }
            }
        }
        closedir($adr);
    }
    uasort($vypis, 'sort_by_insertime');

    return $vypis;
}

function sort_by_insertime($a, $b)
{
    return ($a['insert'] > $b['insert']) ? -1 : 1;
}

function sort_by_zacatek($a, $b)
{
    return ($a['zacatek'] > $b['zacatek']) ? -1 : 1;
}

function event_validation($udalost, $now)
{
    $chyby = array();

    if (strlen($udalost['title']) < 3) {
        array_push($chyby, 'Název není zadán, nebo je příliš krátký.');
    }

    if (strlen($udalost['title']) > 100) {
        array_push($chyby, 'Název je příliš dlouhý.');
    }

    if (preg_match('/[A-ZĚŠČŘŽÝÁÍÉÚŮ]{6,}/', $udalost['title'])) {
        array_push($chyby, 'Název obsahuje příliš mnoho VELKÝCH písmen.');
    }

    if (strlen($udalost['desc']) < 3) {
        array_push($chyby, 'Popis není zadán, nebo je příliš krátký.');
    }

    if (preg_match('/[A-ZĚŠČŘŽÝÁÍÉÚŮ]{6,}/', $udalost['desc'])) {
        array_push($chyby, 'Popis obsahuje příliš mnoho VELKÝCH písmen.');
    }

    if (strlen($udalost['desc']) > 3000) {
        array_push($chyby, 'Popis je příliš dlouhý.');
    }

    if (strlen($udalost['misto']) < 2) {
        array_push($chyby, 'Místo není zadané, nebo je příliš krátké.');
    }

    if (strlen($udalost['misto']) > 200200) {
        array_push($chyby, 'Místo je příliš dlouhé.');
    }

    if (preg_match('/[A-ZĚŠČŘŽÝÁÍÉ]{4,}/', $udalost['misto'])) {
        array_push($chyby, 'Místo obsahuje příliš mnoho VELKÝCH písmen.');
    }

    if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$/', $udalost['zacatek'])) {
        array_push($chyby, 'Špatný formát začátku události.');
        $zacatek_time = false;
    } else {
        $zacatek_time = strtotime($udalost['zacatek']);

        if ($zacatek_time > $now + 3600 * 24 * 365) {
            array_push($chyby, 'Začátek události za víc jak jeden rok.');
        }
    }

    if (strlen($udalost['url']) > 0 and !preg_match('/^http(|s):\/\//', $udalost['url'])) {
        array_push($chyby, 'Špatný formát odkazu.');
    }

    if (strlen($udalost['mapa']) > 0 and !preg_match('/^http(|s):\/\//', $udalost['mapa'])) {
        array_push($chyby, 'Špatný formát odkazu na mapu.');
    }

    if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$/', $udalost['konec'])) {
        array_push($chyby, 'Špatný formát konce události.');
        $konec_time = false;
    } else {
        $konec_time = strtotime($udalost['konec']);

        if ($konec_time < $now) {
            array_push($chyby, 'Konec události je v minulosti.');
        }

        if ($konec_time > $now + 3600 * 24 * 365) {
            array_push($chyby, 'Konec události za víc jak jeden rok.');
        }
    }

    if ($zacatek_time and $konec_time) {
        if ($zacatek_time == $konec_time) {
            array_push($chyby, 'Událost musí mít nějakou délku.');
        }

        if ($zacatek_time > $konec_time) {
            array_push($chyby, 'Událost končí dřív než začíná.');
        }

        if (($konec_time - $zacatek_time) > 3600 * 24 * 10) {
            array_push($chyby, 'Událost je příliš dlouhá.');
        }
    }

    if (isset($udalost['obrazek']) and is_array($udalost['obrazek'])) {
        if ($udalost['obrazek']['size'] > (IMG_MAX_SIZE * 1024 * 1024)) {
            array_push($chyby, 'Obrázek je příliš velký. Maximální velikost '.IMG_MAX_SIZE.'MB.');
        }
        $obrazekinfo = getimagesize($udalost['obrazek']['tmp_name']);
        if (is_array($obrazekinfo)) {
            if ($obrazekinfo[0] > IMG_MAX_WIDTH or $obrazekinfo[1] > IMG_MAX_HEIGHT) {
                array_push($chyby, 'Rozměry obrázku jsou příliš velké. Maximální velikost '.IMG_MAX_WIDTH.'x'.IMG_MAX_HEIGHT.'px.');
            }
            if (!($obrazekinfo['mime'] == 'image/jpeg' or $obrazekinfo['mime'] == 'image/png')) {
                array_push($chyby, 'Špatný formát souboru. Přidávat jde pouze obrázky ve formátech JPG a PNG.');
            }
        } else {
            array_push($chyby, 'Odeslaný soubor není obrázek.');
        }
    }

    return $chyby;
}

function get_udalost_post()
{
    $udalost = array();
    $promene = array('id', 'title', 'desc', 'misto', 'zacatek', 'konec', 'url', 'mapa');
    foreach ($promene as $foo) {
        if (isset($_POST[$foo])) {
            $udalost[$foo] = trim($_POST[$foo]);
        } else {
            $udalost[$foo] = '';
        }
    }
    if (isset($_FILES['obrazek']) and $_FILES['obrazek']['error'] == 0) {
        $udalost['obrazek'] = $_FILES['obrazek'];
    }

    return $udalost;
}

function get_deleted_events()
{
    $vypis = array();
    if (is_dir(CALENDAR_DELETED) and opendir(CALENDAR_DELETED)) {
        $adr = opendir(CALENDAR_DELETED);
        while (false !== ($file = readdir($adr))) {
            if (substr($file, -4) == '.cal' and preg_match('/.*-'.$_SESSION['uzivatel']['login'].'-.*\.cal$/', $file)) {
                array_push($vypis, get_event_data($file, CALENDAR_DELETED));
            }
        }
        closedir($adr);
    }

    return $vypis;
}
