var req = new XMLHttpRequest();
req.open(
    "GET",
    "http://zonglovani.info/kalendar/next.xml",
    true);
req.onload = showEvents;
req.send(null);

function showEvents() {
  var udalosti = req.responseXML.getElementsByTagName("event");
  $('#zs-kalendar').html('<div class="zs-event-list"></div>');
	var pocet=0;
  for (var i = 0, udalost; udalost = udalosti[i]; i++) {
		var foo='<div class="zs-event"><h5 class="zs-nadpis"><a href="'+udalost.getAttribute("url")+'" title="'+udalost.getAttribute("title")+'" target="_blank" class="zs-link">'+udalost.getAttribute("title")+'</a></h5>';
		foo=foo+'<div class="zs-datum">'+udalost.getAttribute("start")+'</div>';
		foo=foo+'<div class="zs-popis">'+udalost.getAttribute("desc")+'</div></div>';
		$('.zs-event-list').append(foo);
		pocet++;
  }
	if(pocet==0){
		$('.zs-event-list').append('<div class="zs-pridej">Žádná naplánovaná akce.<br /><a href="http://zonglovani.info/kalendar/#add" title="Přidat akci do kalendáře žonglování" class="zs-addlink">Přidat</a></div>');
	}
	$('.zs-event-list').append('<div class="zs-cleaner"></div>');
}
