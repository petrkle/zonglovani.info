{literal}
<script type="text/javascript" src="/mapa/geoxml3.js"></script>
<script type="text/javascript">
function initialize() {
	var myLatlng = new google.maps.LatLng(49.8,15.8);
	var myOptions = {
		zoom: 7,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			var geoXml = new geoXML3.parser({map: map});
      geoXml.parse('/mapa/mapa.kml');
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

<div id="map_canvas"></div>
