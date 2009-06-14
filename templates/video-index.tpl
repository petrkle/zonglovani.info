{if $videa}
<dl>
{foreach from=$videa item=video}
<dt>{if $video.druh=="file"}<a href="{$video.url}" title="{$video.title}" class="external" onclick="pageTracker._trackPageview('/goto/{$video.url|replace:'http://':''}');">{else}<a href="{$video.url}" title="{$video.title}">{/if}{$video.title}</a></dt>
<dd>{$video.desc}</dd>
{/foreach}
</dl>
{/if}
