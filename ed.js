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
document.write("<link href=\"/ed.css\" rel=\"stylesheet\" type=\"text/css\">");


function edToolbar(obj) {
document.write("<div class=\"edtoolbar\">");
document.write("<img class=\"edbutton\" src=\"/img/e/ed.bold.gif\" width=\"22\" height=\"22\" name=\"btnBold\" title=\"Tučný text\" onClick=\"doAddTags('[b]','[/b]','" + obj + "')\">");
document.write("<img class=\"edbutton\" src=\"/img/e/ed.italic.gif\" width=\"22\" height=\"22\" name=\"btnItalic\" title=\"Kurzíva\" onClick=\"doAddTags('[i]','[/i]','" + obj + "')\">");
document.write("<img class=\"edbutton\" src=\"/img/e/ed.ln.gif\" width=\"22\" height=\"22\" name=\"btnLink\" title=\"Odkaz\" onClick=\"doURL('" + obj + "')\">");
document.write("<img class=\"edbutton\" src=\"/img/e/ed.email.gif\" width=\"22\" height=\"22\" name=\"btnEmail\" title=\"E-mail\" onClick=\"doAddTags('[email]','[/email]','" + obj + "')\">");
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
