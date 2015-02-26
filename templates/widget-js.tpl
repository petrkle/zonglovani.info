{literal}
(function() {
var jQuery;

if (window.jQuery === undefined || window.jQuery.fn.jquery !== '1.7.1') {
    var script_tag = document.createElement('script');
    script_tag.setAttribute("type","text/javascript");
    script_tag.setAttribute("src","//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js");
    script_tag.onload = scriptLoadHandler;
    script_tag.onreadystatechange = function () {
        if (this.readyState == 'complete' || this.readyState == 'loaded') {
            scriptLoadHandler();
        }
    };
    (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
} else {
    jQuery = window.jQuery;
    main();
}

function scriptLoadHandler() {
    jQuery = window.jQuery.noConflict(true);
    main(); 
}

function main() { 
    jQuery(document).ready(function($) { 
				var toto = $("script[src*='{/literal}{$smarty.server.SERVER_NAME}{literal}/kalendar/widget.js']");
				$.urlParam = function(name){
						var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(toto.attr("src"));
							if (!results) { return 0; }
								return results[1] || 0;
				}

				if($.urlParam('css')){
					var csslink = $.urlParam('css');
				}else{
					var csslink = "https://{/literal}{$smarty.server.SERVER_NAME}{literal}/css/w-light.css";
				}

				if($.urlParam('filtr')){
					var filtr = "&filtr=" + $.urlParam('filtr');
				}else{
					var filtr = "";
				}

				if($.urlParam('ukaz')){
					var obrazky = 'jo';
				}else{
					var obrazky = 'ne';
				}

        var css_link = $("<link>",{rel:"stylesheet",type:"text/css",href:csslink,media:"screen,projection"});
        css_link.appendTo('head');          

				var d = new Date();

        var json_url = "https://{/literal}{$smarty.server.SERVER_NAME}{literal}/kalendar/next.json?"+filtr;
        $.ajax({url:json_url, cache: true, contentType: "application/json; charset=utf-8", scriptCharset: "utf-8", dataType: 'jsonp', jsonpCallback: 't_'+d.getFullYear()+'_'+(d.getMonth()+1)+'_'+d.getDate(), success: function(data) {
				var pocet=0;

          $('#zs-kalendar').replaceWith('<div id="zs-kalendar"><div class="zs-event-list"><div class="zs-head zs-link"><a href="https://{/literal}{$smarty.server.SERVER_NAME}{literal}/kalendar/" title="Kalendář žonglérských akcí" class="zs-link" tartet="_top">Kalendář žonglování</a></div></div></div>');
					$.each(data,function(id,akce){
						var udalost='<div class="zs-event"><div class="zs-nadpis"><a href="'+akce[0].url+'" title="'+akce[0].desc+'" target="_top" class="zs-link">'+akce[0].title+'</a></div>';
						udalost=udalost+'<div class="zs-datum">'+akce[0].start+'</div>';
						if(obrazky=='jo' && akce[0].img){
							udalost=udalost+'<a href="'+akce[0].url+'" title="'+akce[0].desc+'" target="_top"><img src="'+akce[0].img+'" width="130" class="zs-img" /></a>';
						}
						udalost=udalost+'<div class="zs-popis">'+akce[0].desc+'</div></div>';
						$('.zs-event-list').append(udalost);
						pocet++;
					});
					if(pocet==0){
						$('.zs-event-list').append('<div class="zs-pridej">Žádná naplánovaná akce.<br /><a href="https://{/literal}{$smarty.server.SERVER_NAME}{literal}/kalendar/#add" title="Přidat akci do kalendáře žonglování" class="zs-addlink">Přidat</a></div>');
					}
					$('.zs-event-list').append('<div class="zs-cleaner"></div>');
        }});
    });
}

})();
{/literal}
