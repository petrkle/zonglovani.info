<p>
<a href="/obrazky/ulita-20091213/stranka4/0055.html" class="nahled" title="Ulita 13. 12. 2009"><img src="http://i.zongl.info/obrazky/ulita-20091213/nahledy/0055.jpg" style="width: 128px; height: 96px; margin: 26px 10px;" alt=""/></a>
<a href="/obrazky/prazsky-zonglersky-marathon-20091128/0010.html" class="nahled" title="Pražský žonglérský marathon 2009"><img src="http://i.zongl.info/obrazky/prazsky-zonglersky-marathon-20091128/nahledy/0010.jpg" style="width: 72px; height: 96px; margin: 26px 38px;" alt=""/></a>
<a href="/obrazky/carodejnice-klamovka-20080422/0014.html" class="nahled" title="Čarodějnice na klamovce"><img src="http://i.zongl.info/obrazky/carodejnice-klamovka-20080422/nahledy/0014.jpg" style="width: 128px; height: 86px; margin: 31px 10px;" alt=""/></a>
</p>
<br style="clear: both"/>
{if is_array($galerie)}
<ul>
{foreach from=$galerie item=foo}
<li><a href="{$foo.name|escape}/" title="{$foo.title|escape}">{$foo.title|escape}</a></li>
{/foreach}
</ul>
{/if}
<h3>Filtry obrázků</h3>
{include file='obrazky-filtry.tpl'}
<a name="vyzva"></a><h3>Výzva pro fotografy</h3>
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
