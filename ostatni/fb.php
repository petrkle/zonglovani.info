<!DOCTYPE html>
<html lang="cs">
<head>
<meta charset="utf-8" />
    <title>Žonglérův slabikář na facebooku</title>
<style type="text/css">
body,html{font-family:sans-serif;color:#000;background:transparent;margin:0;padding:0;text-align:center;height:100%;}
#fbif{margin:0 auto 15px auto;border:none;overflow:hidden;width:550px;height:240px;}
a{font-weight:bold;}
#wholepage{border:solid 3px #fc3;background:#fff;}
#closelink{text-align:right;margin:5px;float:right;}
#fblink{text-align:left;margin:5px;padding-left:17px;float:left;}
#closelink a{padding:3px 30px 3px 3px;background:url(/img/c/close.png) no-repeat 100% 50%;}
.external{background:url("/img/e/external.png") 100% 50% no-repeat;padding-right:16px;}
</style>
<script type="text/javascript">
document.onkeydown = KeyPressHappened;
window.onkeydown = KeyPressHappened;
function KeyPressHappened(e){
  if (!e) e=window.event;
  var code;
  if ((e.charCode) && (e.keyCode==0))
    code = e.charCode
  else
    code = e.keyCode;
	if(code==27){
		window.parent.closeIframe();
	}
}

</script>
</head>
<body onload="this.focus();">
<div id="wholepage">
<div id="fblink"><a href="http://facebook.com/zongleruv.slabikar" title="Žonglérův slabikář na Facebooku" target="_top" class="external">facebook.com/zongleruv.slabikar</a></div>
<div id="closelink"><a href="javascript:window.parent.closeIframe()" title="">Zavřít</a></div>
<iframe id="fbif" src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fzongleruv.slabikar&amp;width=550&amp;colorscheme=light&amp;connections=18&amp;stream=false&amp;header=false&amp;height=240" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>
</body>
</html>
