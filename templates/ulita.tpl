<p>
Ned�ln� �onglov�n� v <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - d�m d�t� a ml�de�e">DDM Ulita</a>.
</p>
<p>
Na Balk�n� 100, Praha 3, 130 00 - <a href="http://www.mapy.cz/#mm=ZP@ax=133213920@ay=135976864@at=Ulita@ad=D%C5%AFm%20d%C4%9Bt%C3%AD%20a%20ml%C3%A1de%C5%BEe%20Ulita.@x=133213312@y=135977056@z=16" title="M�sto kon�n� na map�." class="external" onclick="pageTracker._trackPageview('/goto/mapy.cz/ulita');">mapa</a><br />
Telefon: 271 771 025<br />
Fax: 271 774 726<br />
{assign var='mail' value='info@ulita.cz'}
e-mail: {$mail|mailobfuscate}
</p>

{if count($podzim)>0}
<h3>Podzim 2009</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>�as</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Ned�le</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalend��i.">{$datum.datum}</a></td><td>15 - 19</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Jaro 2010</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>�as</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Ned�le</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalend��i.">{$datum.datum}</a></td><td>15 - 19</td></tr>
{/foreach}
</table>
{else}
<p>Dal�� �onglov�n� v ulit� bude na podzim.</p>
{/if}
<p>Vstupn�: 40 K�.</p>
<p>Obr�zky z <a href="http://spanker.cz/fotogal/ulita_zonglovani/index.html" title="Fotografie od Zby�ka Fojt�ka." onclick="pageTracker._trackPageview('/goto/spanker.cz/fotogal/ulita_zonglovani');" class="external">minul�ho ro�n�ku</a>.</p>
<hr />
<p><a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - d�m d�t� a ml�de�e">{obrazek soubor='ulita-logo.png' popisek='Ulita'}</a></p>
