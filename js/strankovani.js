document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
						jdi(/(Předchozí|Starší)/);
            break;
        case 39:
						jdi(/(Další|Novější)/);
            break;
    }
};

function jdi(text){
	var a = document.getElementsByTagName('a');

	for (var i = 0; i < a.length; i++) {
		if (a[i].textContent.match(text) && a[i].classList.contains('pl')) {
			found = a[i];
			break;
		}
	}

	if(found){
		window.location.href=found.href;
	}
}
