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
document.write("<input type=\"button\" title=\"Odkaz\" onclick=\"doURL('" + obj + "')\" value=\"Vložit odkaz\"> ");
document.write("<input type=\"button\" title=\"E-mail\" onclick=\"doAddTags('[email]','[/email]','" + obj + "')\" value=\"Vložit email\">");
document.write("</div>");
}

function doURL(obj){
textarea = document.getElementById(obj);
var url = prompt('Zadej adresu:','http://');
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
