{if $video}
<p>{$video.desc}</p>
{/if}

<p class="youtubevideo">
{if $video.server=="youtube.com"}
<object height="380" width="480">
	<param name="movie" value="http://www.youtube.com/v/{$video.fid}">
	<embed src="http://www.youtube.com/v/{$video.fid}" type="application/x-shockwave-flash" height="380" width="480">
</object>
{/if}

{if $video.server=="juggling.tv"}

	<object type="application/x-shockwave-flash" width="480" height="380"wmode="transparent" data="http://www.juggling.tv/vaults/flvplayer.swf?file=http://www.juggling.tv/vaults/flvideo/{$video.fid}.flv&autostart=false&showfsbutton=true">
        <param name="movie" value="http://www.juggling.tv/vaults/flvplayer.swf?file=http://www.juggling.tv/vaults/flvideo/{$video.fid}.flv&autostart=false&showfsbutton=true" />
        <param name="wmode" value="transparent" />
		<param name="allowScriptAccess" value="sameDomain" />
<embed src="http://www.juggling.tv/vaults/flvplayer.swf?file=http://www.juggling.tv/vaults/flvideo/{$video.fid}.flv&autostart=false&showfsbutton=true" loop="false" width="480" height="380" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
{/if}
</p>
<p>
Dal�� <a href="/video/">�ongl�rsk� videa</a>.
</p>

<p>
Videa na internetu se p�esouvaj�, miz� a zase objevuj�. Pokud naraz� na �patn� odkaz, m��e� mi <a href="/kontakt.html" title="Nahl�en� �patn�ho odkazu.">napsat</a>. Za��d�m jeho opravu.
</p>
