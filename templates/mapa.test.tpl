{*<script type="text/javascript" src="/mapa/jquery.dump.js"></script>*}
{literal}
<script type="text/javascript" src="/mapa/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/mapa/jquery.ba-bbq.min.js"></script>
<script type="text/javascript">
function initialize() {
	myLatlng = new google.maps.LatLng(49.453567975668975,16.816765);
	var myOptions = {
		zoom: 6,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	var ctaLayer = new google.maps.KmlLayer('http://{/literal}zonglovani.info/mapa/mapa-zongleri.kml?v{$smarty.now}{literal}',{preserveViewport:true});
	ctaLayer.setMap(map);

/*
$(function(){

  $(window).bind( "hashchange", function(e) {

		if(window.location.hash.match('x=.*y=.*z=.*')){
			var pozice = window.location.hash.split('@');
			var x = pozice[1].split('=');
			var x = parseFloat(x[1]);
			var y = pozice[2].split('=');
			var y = parseFloat(y[1]);
			var souradnice = new google.maps.LatLng(x,y);
			var z = pozice[3].split('=');
			var z = parseInt(z[1]);
			map.setZoom(z);
			map.setCenter(souradnice);
		}
  });
  $(window).trigger( "hashchange" );
});
*/


  google.maps.event.addListener(map, 'dragend', function() {
    var center = map.getCenter();
		var zoom = map.getZoom()
		window.location.hash = '@x='+center.lat()+'@y='+center.lng()+'@z='+zoom;
  });

  google.maps.event.addListener(map, 'zoom_changed', function() {
    var center = map.getCenter();
		var zoom = map.getZoom()
		window.location.hash = '@x='+center.lat()+'@y='+center.lng()+'@z='+zoom;
  });


	google.maps.event.addListener(ctaLayer, 'click', function(kmlEvent) {
		kmlEvent.featureData.info_window_html = kmlEvent.featureData.info_window_html.replace('_blank','_self');
		kmlEvent.featureData.description = kmlEvent.featureData.description.replace('_blank','_self');
		if(!window.location.hash.match(kmlEvent.featureData.id)){
			window.location.hash = window.location.hash+'@p='+kmlEvent.featureData.id;
		}
	});
}
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
	document.body.appendChild(script);
}
window.onload = loadScript;
</script> 
{/literal}

<div class="kontejner">
<div id="map_canvas"></div><div id="legenda">
<h3>Test</h3>
<p>
Testovací <a href="/mapa/" title="Ostrá verze">žonglérská mapa</a>. Slouží ke zkouškám a ladění javascriptu.
</p>
<p>
<a href="/mapa/" title="Ostrá verze">Ostrá verze</a>
</p>
<ul>
<li><a href="/micky/vyroba.html" title="Návod na výrobu míčků na žonglování">Výroba</a></li>
<li><a href="/lide/dovednost/workshop.html" title="Výuka žonglování">Výuka</a></li>
<li><a href="/lide/dovednost/shop.html" title="Prodej žonglérských hraček">Obchody</a></li>
<li><a href="/kuzely/passing/" title="Passing s kužely">Passing</a></li>
</ul>
</div>
<div class="clear">&nbsp;</div>
</div>
