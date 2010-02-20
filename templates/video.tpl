{if $video}
<p>{$video.desc}</p>
{/if}

<p class="youtubevideo">
{if $video.server=="youtube.com"}
<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/{$video.fid}&amp;hl=cs_CZ&amp;rel=0" class="youtubevideo">
	<param name="movie" value="http://www.youtube.com/v/{$video.fid}&amp;hl=cs_CZ&amp;rel=0" />
	<param name="wmode" value="transparent" />
	<param name="allowscriptaccess" value="always" />
	<param name="allowfullscreen" value="false" />
	<param name="pluginspage" value="http://get.adobe.com/flashplayer/" />
Pro přehrávání videa je potřeba <a href="http://get.adobe.com/flashplayer/" class="external" onclick="pageTracker._trackPageview('/goto/get.adobe.com/flashplayer');">Adobe Flash</a>
</object>
{/if}

{if $video.server=="juggling.tv"}
<object type="application/x-shockwave-flash" data="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key={$video.fid}" class="youtubevideo">
	<param name="movie" value="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key={$video.fid}" />
	<param name="wmode" value="transparent" />
	<param name="allowscriptaccess" value="always" />
	<param name="allowfullscreen" value="false" />
	<param name="pluginspage" value="http://get.adobe.com/flashplayer/" />
Pro přehrávání videa je potřeba <a href="http://get.adobe.com/flashplayer/" class="external" onclick="pageTracker._trackPageview('/goto/get.adobe.com/flashplayer');">Adobe Flash</a>
</object>
{/if}
</p>
<p>
Další <a href="/video/">žonglérská videa</a>.
</p>

<p>
Videa na internetu se přesouvají, mizí a zase objevují. Pokud narazíš na špatný odkaz, můžeš mi <a href="/kontakt.html" title="Nahlášení špatného odkazu.">napsat</a>. Zařídím jeho opravu.
</p>
