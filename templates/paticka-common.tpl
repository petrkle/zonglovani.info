<div class="spacer"></div>
<!-- stránka konec -->
</div>
{if preg_match('/android/i',$smarty.server.HTTP_USER_AGENT)}
<div id="andoridapadd">Žonglérův slabikář jako <a href="/g/android.app" title="Aplikace pro off-line prohlížení žonglérova slabikáře." onclick="_gaq.push(['_trackPageview','/g/android.app']);">aplikace pro Android</a>.</div>
{/if}
<div id="paticka">
<div id="dolni">
<div>
{dolnimenu}
</div>
</div>
</div>

{if preg_match('/(android|mobile|iphone|opera mini)/i',$smarty.server.HTTP_USER_AGENT)}
{literal}
<script type="text/javascript">
window.addEventListener('load', function(e) {
    setTimeout(function() { window.scrollTo(0, 1); }, 1);
  }, false);
</script>
{/literal}
{/if}

<div class="reklama">
<div>
Co říkáš na reklamu v televizi a na internetu?<br/>
<a href="http://goo.gl/qC770" title="kle.cz/pruzkum">Vyplň dotazník psychologie reklamy</a> (4 minuty).</br>
Zajímá mě tvůj názor! Jitka
</div>
</div>

{literal}
<style type="text/css" media="screen and (min-width: 610px)">
.reklama{margin:0 auto;text-align:center;}
.reklama div{background:#fff url(http://kle.cz/img/o/otaznik.png) no-repeat 10px 50%;padding:10px 5px;margin:20px auto;border:solid 2px #fc0;width:600px;}
</style>
{/literal}

</body>
</html>
