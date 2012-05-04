<div class="spacer"></div>
<!-- stránka konec -->
</div>
{if preg_match('/android/i',$smarty.server.HTTP_USER_AGENT)}
<div id="andoridapadd">Žonglérův slabikář jako <a href="/download/apk.html" title="Aplikace pro off-line prohlížení žonglérova slabikáře.">aplikace pro Android</a>.</div>
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
</body>
</html>
