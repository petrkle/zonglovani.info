
{if $smarty.server.SERVER_NAME=='zonglovani.info' and $smarty.session.uzivatel.login!='pek'}
<!-- start -->

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-1140497-3']);
_gaq.push(['_addOrganic', 'search.centrum.cz', 'q']);
_gaq.push(['_addOrganic', 'searchatlas.centrum.cz', 'q']);
{if $nenalezeno_404}
 _gaq.push(['_trackPageview', '/404/' + document.location.pathname + document.location.search + '&amp;from=' + document.referrer]);
{else}
_gaq.push(['_trackPageview']);
{/if}
_gaq.push(['_trackPageLoadTime']);

(function() {literal}{{/literal}
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
{literal}})();{/literal}
</script>

<!-- stop -->
{/if}

