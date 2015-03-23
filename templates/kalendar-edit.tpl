{if isset($chyby)}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}

{include file='kalendar-selector.tpl'}
<form action="{$smarty.server.SCRIPT_NAME}{if isset($form_action)}{$form_action}{/if}" method="post" id="cal" enctype="multipart/form-data">
<fieldset>
<legend accesskey="i">Základní <span class="u">i</span>nformace</legend>
<ul>
<li><label class="kratkypopis" for="nazev" accesskey="n" ><span class="u">N</span>ázev</label><input type="text" name="title" id="nazev" required value="{$udalost.title|escape}" class="textbox" tabindex="1"/><div class="tooltip">Název akce. Délka od 3 do 100 znaků.</div></li>
<li><label class="kratkypopis" for="popis" accesskey="p" ><span class="u">P</span>opis</label><input type="text" name="desc" id="popis" required value="{$udalost.desc|escape}" class="textbox" tabindex="2"/><div class="tooltip">Podrobný popis akce. Délka 3 až 3000 znaků.</div></li>
</ul>
</fieldset>

<fieldset>
<legend accesskey="s">Mí<span class="u">s</span>to a čas konání</legend>
<ul>
<li><label class="kratkypopis" for="misto" accesskey="m" ><span class="u">M</span>ísto</label><input type="text" name="misto" id="misto" required autocomplete="street-address address-level-1 address-level-2" value="{$udalost.misto|escape}" class="textbox" tabindex="3"/><div class="tooltip">Místo konání události. Délka od 2 do 200 zanků.</div></li>
<li><label class="kratkypopis" for="zacatek" accesskey="z" ><span class="u">Z</span>ačátek</label> {literal}<script type="text/javascript">new tcal ({'formname': 'cal','controlname': 'zacatek'});</script>{/literal}<input type="text" name="zacatek" id="zacatek" required value="{$udalost.zacatek|escape}" class="datebox" tabindex="4"/><div class="tooltip">Datum a čas začátku události. Formát datumu "RRRR-MM-DD&nbsp;HH:MM"</div></li>
<li><label class="kratkypopis" for="konec" accesskey="k" ><span class="u">K</span>onec</label> {literal}<script type="text/javascript">new tcal ({'formname': 'cal','controlname': 'konec'});</script>{/literal}<input type="text" name="konec" required id="konec" value="{$udalost.konec|escape}" class="datebox" tabindex="5"/><div class="tooltip">Datum a čas ukončení události. Formát datumu "RRRR-MM-DD&nbsp;HH:MM"</div></li>
</ul>
</fieldset>

<fieldset>
<legend accesskey="d"><span class="u">D</span>oplňující informace</legend>
<ul>
<li><label class="kratkypopis" for="odkaz" accesskey="o" ><span class="u">O</span>dkaz</label><input type="text" name="url" id="odkaz" value="{$udalost.url|escape}" class="textbox" tabindex="6"/><div class="tooltip">Odkaz na www stránku události. Nepovinný údaj. Formát http://*</div></li>
<li><label class="kratkypopis" for="mapa" accesskey="a" >M<span class="u">a</span>pa</label><input type="text" name="mapa" id="mapa" value="{$udalost.mapa|escape}" class="textbox" tabindex="7"/><div class="tooltip">Odkaz na mapu místa kde se událost koná. Nepovinný údaj. Formát http://*</div></li>
{if !isset($udalost.img)}
<li><label class="kratkypopis" for="obrazek" accesskey="b" >O<span class="b">b</span>rázek</label><input type="file" name="obrazek" id="obrazek" class="textbox" tabindex="8"/><div class="tooltip">Leták k akci. Formát obrázku jpg nebo png. Maximální velikost 2MB.</div></li>
{else}
<li><label class="kratkypopis" for="obrazek" accesskey="b" >O<span class="b">b</span>rázek</label> <input type="submit" name="smazatimg" value="Smazat obrázek" /></li>
{/if}
</ul>
{if isset($udalost.img) and isset($udalost.img_ts)}
<p><img src="/kalendar/obrazek-{$udalost.img_ts|escape}-ts-{$udalost.img|escape}" alt="{$udalost.title|escape}" style="width:98%;max-width:{$udalost.img_sirka|escape}px;" /></p>
{/if}
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Uložit" class="knoflik" tabindex="8" />
{if isset($udalost.id)}
<input type="hidden" name="id" value="{$udalost.id}" />
{/if}
</p>
</form>

<p>
<a href="{if isset($udalost.month_url)}{$udalost.month_url}{else}{$smarty.const.CALENDAR_URL}{/if}" title="Návrat do kalendáře.">&laquo; Zpět do kalendáře</a>
</p>

