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
		window.location.href=a.href;
	}
}
