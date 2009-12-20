{if is_array($galerie)}
<ul>
{foreach from=$galerie item=foo}
<li><a href="{$foo.name|escape}/" title="{$foo.title|escape}">{$foo.title|escape}</a></li>
{/foreach}
</ul>
{/if}
<a name="vyzva"><h3>Výzva pro fotografy</h3></a>
<p>
{obrazek soubor="fotaka.png" popisek="Fotoaparát"}
Rád uveřejním i tvoje fotografie žonglování. Stačí vědět kde a kdy byly pořízené a <a href="/kontakt.html" title="Stránka s emailem.">napsat</a>. Tvoje fotky pak uvidí hodně lidí které zajímá žonglování.
</p>
<p>
Nenabízím neomezenou kapacitu ani okamžité zveřejnění fotografií. Jen to, že se tvoje fotky neztratí v moři ostatních.
</p>
<p>
U každé fotografie bude tvoje jméno, email a případně odkaz na webovou stránku.
</p>
