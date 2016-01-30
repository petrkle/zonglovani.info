document.addEventListener("DOMContentLoaded", function(){
	  document.getElementById('chromesearch').addEventListener('click', addZonglSearch);
	  document.getElementById('firesearch').addEventListener('click', addZonglSearch);
	  document.getElementById('iesearch').addEventListener('click', addZonglSearch);
}, false);

function addZonglSearch() {
	window.external.AddSearchProvider('https://zonglovani.info/vyhledavani/vyhledavani.xml');
	return false;
}
