{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}

{include file='kalendar-selector.tpl'}
<form action="{$smarty.server.SCRIPT_NAME}{$form_action}" method="post" name="cal">
{if $udalost.id}
<input type="hidden" name="id" value="{$udalost.id}" />
{/if}
<p>
<fieldset>
<legend accesskey="i">Z�kladn� <u>i</u>nformace</legend>
<ul>
<li><label class="kratkypopis" for="nazev" accesskey="n" ><u>N</u>�zev</label>:<input type="text" name="title" id="nazev" value="{$udalost.title|escape}" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">N�zev akce. D�lka od 3 do 100 zank�.</span></a></li>
<li><label class="kratkypopis" for="popis" accesskey="p" ><u>P</u>opis</label>:<input type="text" name="desc" id="popis" value="{$udalost.desc|escape}" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Podrobn� popis akce. D�lka 3 a� 3000 znak�.</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend accesskey="s">M�<u>s</u>to a �as kon�n�</legend>
<ul>
<li><label class="kratkypopis" for="misto" accesskey="m" ><u>M</u>�sto</label>:<input type="text" name="misto" id="misto" value="{$udalost.misto|escape}" class="textbox" tabindex="3"/><a class="info" href="#">?<span class="tooltip">M�sto kon�n� ud�losti. D�lka od 2 do 200 zank�.</span></a></li>
<li><label class="kratkypopis" for="zacatek" accesskey="z" ><u>Z</u>a��tek</label>: {literal}<script type="text/javascript">new tcal ({'formname': 'cal','controlname': 'zacatek'});</script>{/literal}<input type="text" name="zacatek" id="zacatek" value="{$udalost.zacatek|escape}" class="datebox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Datum a �as za��tku ud�losti. Form�t datumu "YYYY-MM-DD&nbsp;HH:MM"</span></a></li>
<li><label class="kratkypopis" for="konec" accesskey="k" ><u>K</u>onec</label>: {literal}<script type="text/javascript">new tcal ({'formname': 'cal','controlname': 'konec'});</script>{/literal}<input type="text" name="konec" id="konec" value="{$udalost.konec|escape}" class="datebox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Datum a �as ukon�en� ud�losti. Form�t datumu "YYYY-MM-DD&nbsp;HH:MM"</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend accesskey="d"><u>D</u>opl�uj�c� informace</legend>
<ul>
<li><label class="kratkypopis" for="odkaz" accesskey="o" ><u>O</u>dkaz</label>:<input type="text" name="url" id="odkaz" value="{$udalost.url|escape}" class="textbox" tabindex="6"/><a class="info" href="#">?<span class="tooltip">Odkaz na www str�nku ud�losti. Nepovinn� �daj. Form�t http://*</span></a></li>
<li><label class="kratkypopis" for="mapa" accesskey="a" >M<u>a</u>pa</label>:<input type="text" name="mapa" id="mapa" value="{$udalost.mapa|escape}" class="textbox" tabindex="7"/><a class="info" href="#">?<span class="tooltip">Odkaz na mapu m�sta kde se ud�lost kon�. Nepovinn� �daj. Form�t http://*</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Ulo�it" class="knoflik" tabindex="8" />
</p>
</form>

<p>
<a href="{$smarty.const.CALENDAR_URL}" title="N�vrat do kalend��e.">&laquo; zp�t do kalend��e</a>
</p>

