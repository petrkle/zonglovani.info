<?php
require_once 'config.php';

$status = $facebook->api('/me/feed', 'POST', array('message' => 'Jdu si tisknout návod na žonglování a jak vyrobit žonglovací míčky.','link'=>'http://zonglovani.info/navody/','caption'=>'Návody na žonglování','description'=>'Obrázkový návod na žonlgování se třemi míčky + výroba míčků na žonglování z tenisáku, rýže a nafukovacích balónků.','name'=>'Žonglérův slabikář','picture'=>'http://zonglovani.info/img/n/nacinia.png'));

?>
<!doctype html>
<html lang="cs-cz" dir="ltr">
<head>
<meta charset="UTF-8">
<title>Žonglování</title>
<meta http-equiv="refresh" content="3;url=http://www.facebook.com/profile.php?v=wall" />
</head>
<body>
<link rel="stylesheet" media="screen,projection" type="text/css" href="http://zonglovani.info/fba.css?<?=time();?>" />
<div id="container">
<div id="obsah">
<h1>Žonglování</h1>
<p>
Paráda, příspěvek odeslán na zeď. Probíhá přesměrování na <a href="http://www.facebook.com/profile.php?v=wall">tvůj profil</a>.
</p>
<script type='text/javascript'>setTimeout("top.location.href = 'http://www.facebook.com/profile.php?v=wall'",3000);</script>
</body>
</html>
