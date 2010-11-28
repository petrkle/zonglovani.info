{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}

{include file='kalendar-selector.tpl'}
<form action="{$smarty.server.SCRIPT_NAME}{$form_action}" method="post" id="cal" enctype="multipart/form-data">
<fieldset>
<legend accesskey="i">Základní <span class="u">i</span>nformace</legend>
<ul>
<li><label class="kratkypopis" for="nazev" accesskey="n" ><span class="u">N</span>ázev</label>:<input type="text" name="title" id="nazev" value="{$udalost.title|escape}" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Název akce. Délka od 3 do 100 zanků.</span></a></li>
<li><label class="kratkypopis" for="popis" accesskey="p" ><span class="u">P</span>opis</label>:<input type="text" name="desc" id="popis" value="{$udalost.desc|escape}" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Podrobný popis akce. Délka 3 až 3000 znaků.</span></a></li>
</ul>
</fieldset>

<fieldset>
<legend accesskey="s">Mí<span class="u">s</span>to a čas konání</legend>
<ul>
<li><label class="kratkypopis" for="misto" accesskey="m" ><span class="u">M</span>ísto</label>:<input type="text" name="misto" id="misto" value="{$udalost.misto|escape}" class="textbox" tabindex="3"/><a class="info" href="#">?<span class="tooltip">Místo konání události. Délka od 2 do 200 zanků.</span></a></li>
<li><label class="kratkypopis" for="zacatek" accesskey="z" ><span class="u">Z</span>ačátek</label>: {literal}<script type="text/javascript">new tcal ({'formname': 'cal','controlname': 'zacatek'});</script>{/literal}<input type="text" name="zacatek" id="zacatek" value="{$udalost.zacatek|escape}" class="datebox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Datum a čas začátku události. Formát datumu "YYYY-MM-DD&nbsp;HH:MM"</span></a></li>
<li><label class="kratkypopis" for="konec" accesskey="k" ><span class="u">K</span>onec</label>: {literal}<script type="text/javascript">new tcal ({'formname': 'cal','controlname': 'konec'});</script>{/literal}<input type="text" name="konec" id="konec" value="{$udalost.konec|escape}" class="datebox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Datum a čas ukončení události. Formát datumu "YYYY-MM-DD&nbsp;HH:MM"</span></a></li>
</ul>
</fieldset>

<fieldset>
<legend accesskey="d"><span class="u">D</span>oplňující informace</legend>
<ul>
<li><label class="kratkypopis" for="odkaz" accesskey="o" ><span class="u">O</span>dkaz</label>:<input type="text" name="url" id="odkaz" value="{$udalost.url|escape}" class="textbox" tabindex="6"/><a class="info" href="#">?<span class="tooltip">Odkaz na www stránku události. Nepovinný údaj. Formát http://*</span></a></li>
<li><label class="kratkypopis" for="mapa" accesskey="a" >M<span class="u">a</span>pa</label>:<input type="text" name="mapa" id="mapa" value="{$udalost.mapa|escape}" class="textbox" tabindex="7"/><a class="info" href="#">?<span class="tooltip">Odkaz na mapu místa kde se událost koná. Nepovinný údaj. Formát http://*</span></a></li>
{if !$udalost.img}
<li><label class="kratkypopis" for="obrazek" accesskey="b" >O<span class="b">b</span>rázek</label>:<input type="file" name="obrazek" id="obrazek" class="textbox" tabindex="8"/><a class="info" href="#">?<span class="tooltip">Leták k akci.</span></a></li>
{else}
<li><label class="kratkypopis" for="obrazek" accesskey="b" >O<span class="b">b</span>rázek</label>: <input type="submit" name="smazatimg" value="Smazat obrázek" /></li>
{/if}
</ul>
{if $udalost.img}
<p><img src="/kalendar/obrazek-{$udalost.img|escape}" alt="{$udalost.title|escape}" width="{$udalost.img_sirka|escape}" height="{$udalost.img_vyska|escape}" /></p>
{/if}
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Uložit" class="knoflik" tabindex="8" />
{if $udalost.id}
<input type="hidden" name="id" value="{$udalost.id}" />
{/if}
</p>
</form>

<p>
<a href="{if $udalost.month_url}{$udalost.month_url}{else}{$smarty.const.CALENDAR_URL}{/if}" title="Návrat do kalendáře.">&laquo; Zpět do kalendáře</a>
</p>

