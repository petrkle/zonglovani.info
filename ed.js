/*****************************************/
// Name: Javascript Textarea BBCode Markup Editor
// Version: 1.3
// Author: Balakrishnan
// Last Modified Date: 25/jan/2009
// License: Free
// URL: http://www.corpocrat.com
/******************************************/

var textarea;
var content;

function edToolbar(obj) {
document.write("<div class=\"edtoolbar\">");
document.write("<input type=\"button\" title=\"Tučný text\" onclick=\"doAddTags('[b]','[/b]','" + obj + "')\" value=\"Tučné písmo\" /> ");
document.write("<input type=\"button\" title=\"Kurzíva\" onclick=\"doAddTags('[i]','[/i]','" + obj + "')\" value=\"Šikmé písmo\" /> ");
document.write("<input type=\"button\" title=\"Odkaz\" onclick=\"doAddTags('[url]','[/url]','" + obj + "')\" value=\"Vložit odkaz\"> ");
document.write("<input type=\"button\" title=\"E-mail\" onclick=\"doAddTags('[email]','[/email]','" + obj + "')\" value=\"Vložit email\">");
document.write("</div>");
write_css();
write_html();
}

function uloz(a){
	doURL('vzkaz',a);
}

function doURL(obj,url){
textarea = document.getElementById(obj);
var scrollTop = textarea.scrollTop;
var scrollLeft = textarea.scrollLeft;

if (url != '' && url != null) {

	if (document.selection) 
			{
				textarea.focus();
				var sel = document.selection.createRange();
				
			if(sel.text==""){
					sel.text = '[url]'  + url + '[/url]';
					} else {
					sel.text = '[url=' + url + ']' + sel.text + '[/url]';
					}			
			}
   else 
    {
		var len = textarea.value.length;
	  var start = textarea.selectionStart;
		var end = textarea.selectionEnd;
    var sel = textarea.value.substring(start, end);
		
		if(sel==""){
				var rep = '[url]' + url + '[/url]';
				} else
				{
				var rep = '[url=' + url + ']' + sel + '[/url]';
				}
        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
		textarea.scrollTop = scrollTop;
		textarea.scrollLeft = scrollLeft;
	}
 }
}

function doAddTags(tag1,tag2,obj)
{
textarea = document.getElementById(obj);
	// Code for IE
		if (document.selection) 
			{
				textarea.focus();
				var sel = document.selection.createRange();
				sel.text = tag1 + sel.text + tag2;
			}
   else 
    {  // Code for Mozilla Firefox
		var len = textarea.value.length;
	  var start = textarea.selectionStart;
		var end = textarea.selectionEnd;
		
		var scrollTop = textarea.scrollTop;
		var scrollLeft = textarea.scrollLeft;
		
    var sel = textarea.value.substring(start, end);
		var rep = tag1 + sel + tag2;
    textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
		
		textarea.scrollTop = scrollTop;
		textarea.scrollLeft = scrollLeft;
	}
}

function write_css(){
	document.write('<style type="text/css">');
	document.write('#mdp_prekryv{background-color:black;-moz-opacity:0.7;opacity:0.7;top:0;left:0;position:fixed;width:100%;height:100%; z-index:99;}');
	document.write('#mdp_ww{position:fixed;z-index:100;top:0;left:0;width:100%;height:100%;text-align:center;}');
	document.write('#mdp_win{background:#fff;margin:20% auto 0 auto;width:400px;text-align:left;}');
	document.write('#mdp_w{padding:3px;border:1px solid black;background-color:#eee;}');
	document.write('#mdp_text{width:99%;}');
	document.write('#mdp_w div{text-align:right;margin-top:5px;}');
	document.write('</style>');
	document.write('<!--[if lte IE 7]>');
	document.write('<style type="text/css">');
	document.write('#mdp_prekryv{position:absolute;filter:alpha(opacity=70);top:expression(eval(document.body.scrollTop));width:expression(eval(document.body.clientWidth));');
	document.write('#mdp_ww{position:absolute;top:expression(eval(document.body.scrollTop));');
	document.write('</style>');
	document.write('<![endif]-->');
}

function write_html(){
	document.write('<div id="mdp_prekryv" style="display: none;">&nbsp;</div>');
	document.write('<div id="mdp_ww" style="display: none;">');
	document.write('<div id="mdp_win"><div id="mdp_w"><span id="mdp_prompt"></span>');
	document.write('<br /><input type="text" id="mdp_text" onkeypress="if((event.keycode==10)||(event.keycode==13)) ae_clk(1); if (event.keycode==27) ae_clk(0);">');
	document.write('<br><div><input type="button" id="mdp_cancel" onclick="ae_clk(0);" value="Zrušit">&nbsp;');
	document.write('<input type="button" id="mdp_ok" onclick="ae_clk(1);" value="Vložit">');
	document.write('</div></div></div></div>');
}

var ae_cb = null;
function ae$(a){return document.getElementById(a);} 

function ae_prompt(cb, q, a){ 
	ae_cb = cb;
	ae$('mdp_prompt').innerHTML = q;
	ae$('mdp_text').value = a;
	ae$('mdp_prekryv').style.display = ae$('mdp_ww').style.display = '';
	ae$('mdp_text').focus();
	ae$('mdp_text').select();
} 
 
function ae_clk(m){ 
	ae$('mdp_prekryv').style.display = ae$('mdp_ww').style.display = 'none';
	if (!m)  
		ae_cb(null);
	else 
		ae_cb(ae$('mdp_text').value);
}
