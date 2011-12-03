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

{if preg_match('/(android|mobile|iphone)/i',$smarty.server.HTTP_USER_AGENT)}
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
