{literal}
<script type="text/javascript" src="/mapa/jquery-1.4.2.min.js"></script>
<!--<script type="text/javascript" src="/mapa/jquery.dump.js"></script>-->
<script type="text/javascript">
function initialize() {
	var myLatlng = new google.maps.LatLng(49.8,15.8);
	var myOptions = {
		zoom: 7,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

var ctaLayer = new google.maps.KmlLayer('http://{/literal}{$smarty.server.SERVER_NAME}/mapa/mapa-cz.kml?v{$smarty.now}{literal}',{suppressInfoWindows: true});
ctaLayer.setMap(map);

google.maps.event.addListener(ctaLayer, 'click', function(kmlEvent) {
  var text = kmlEvent.featureData.description.replace(/ target="_blank"/ig, "")
  showInDiv(text);
});


}
function showInDiv(text) {
  var sidediv = document.getElementById('legenda');
  sidediv.innerHTML = text.replace(/_blank/ig, "");
}

function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
	document.body.appendChild(script);

$('.mlink').live('click', function () {
   $('a[href^=http]').click( function() {
	        window.open(this.href);
	        return false;
    });

});


}
  
window.onload = loadScript;
</script> 
{/literal}

<div class="kontejner">
<div id="map_canvas"></div><div id="legenda">
<h3>Beta</h3>
<p>
Zkušební verze mapy žonglování v České republice.
</p>
</div>
<div class="clear">&nbsp;</div>
</div>
