
{if $smarty.server.SERVER_NAME=='zonglovani.info' and $smarty.session.uzivatel.login!='pek'}
<!-- start -->

<script type="text/javascript">
{literal}
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1140497-3', 'zonglovani.info');
  ga('send', 'pageview');
{/literal}
</script>

<!-- stop -->
{/if}
{if $smarty.server.SERVER_NAME=='zongl.info'}
<!-- start -->
<script type="text/javascript" src="http://localhost:35729/livereload.js"></script>
<!-- stop -->
{/if}
