
<div class="spacer"></div>
<!-- stránka konec -->
</div>

<div id="paticka">
<div id="dolni">
<div>
{dolnimenu}
</div>
</div>
</div>

<div class="spacer"></div>

{if $smarty.server.SERVER_NAME=='zonglovani.info' and $smarty.session.uzivatel.login!='pek'}
<!-- start -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1140497-3");
pageTracker._setDomainName("none");
pageTracker._initData();
{if $nenalezeno_404}
pageTracker._trackPageview("/404/" + document.location.pathname + document.location.search + "&from=" + document.referrer);
{else}
pageTracker._trackPageview();
{/if}
</script>

{/if}

</body>
</html>
