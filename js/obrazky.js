document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
						jdi('predchozi');
            break;
        case 39:
						jdi('dalsi');
            break;
    }
};

function jdi(id){
	var a = document.getElementById(id);
	if(a){
		window.location.href=a.href+'#nahore';
	}
}

window.onload = function(){
	var delay = 1000;
	setTimeout(function() {
		var dalsi = document.getElementById('dalsi');
		var obrazky = dalsi.getAttribute('data-preload').split(';');
		var imgdir = dalsi.getAttribute('data-imgdir');
		for (foo = 0; foo < obrazky.length; foo++) {
			zpozdeni = foo*delay;
			nactiobrazek(imgdir+'/'+obrazky[foo]+'.jpg', zpozdeni);
		}
	}, delay)
}

function nactiobrazek(url, zpozdeni){
	setTimeout(function() {
		new Image().src = url;
	}, zpozdeni);
}
