{if is_array($tipy) and count($tipy)>0}
<h3>Starší tipy týdne</h3>
<p>
<ul>
{foreach from=$tipy item=foo key=datum}
<li><a href="{$datum|regex_replace:'/^(....)(..)/':'\1/\2'}/" title="">{$foo.nadpis|escape}</a> - {$datum|regex_replace:'/^(....)(..)/':'\2/\1'}</li>
{/foreach}
</ul>
</p>
{/if}
