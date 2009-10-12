<p>
Pravideln� ned�ln� �onglov�n� v <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - d�m d�t� a ml�de�e">DDM Ulita</a>. �ongluje se ve <a href="http://www.ulita.cz/images/saly/001/002.jpg" title="Obr�zek velk�ho s�lu." class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz/images');">velk�m s�le</a> kde je: <strong>vysok� strop</strong>, m�kk� podlaha, ozvu�en�, p�dium  pro p��padn� vystoupen�, okna a disco koule.
</p>

<p>
P�ij�t mohou za��naj�c� i zku�en� �ongl��i a �ongl�rky. Pro �irokou ve�ejnost budou k dispozici m��ky a ku�ely k zap�j�en�. �onglovat se m��e nau�it <strong>opravdu ka�d�</strong>.
</p>

<h3>M�sto kon�n�</h3>
<p>
<a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - d�m d�t� a ml�de�e">Ulita</a> - d�m d�t� a ml�de�e<br />
Na Balk�n� 100, Praha 3, 130 00 - <a href="http://www.mapy.cz/#mm=ZP@ax=133213920@ay=135976864@at=Ulita@ad=D%C5%AFm%20d%C4%9Bt%C3%AD%20a%20ml%C3%A1de%C5%BEe%20Ulita.@x=133213312@y=135977056@z=16" title="M�sto kon�n� na map�." class="external" onclick="pageTracker._trackPageview('/goto/mapy.cz/ulita');">mapa</a><br />
Telefon: 271 771 025<br />
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>

{if count($podzim)>0}
<h3>Term�ny - podzim 2009</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>�as [Hod]</th>
<th>Vstupn� [K�]</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Ned�le</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalend��i.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Term�ny - jaro 2010</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>�as [Hod]</th>
<th>Vstupn� [K�]</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Ned�le</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalend��i.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{else}
<p>Dal�� �onglov�n� v ulit� bude na podzim.</p>
{/if}
<p>Obr�zky z <a href="http://spanker.cz/fotogal/ulita_zonglovani/index.html" title="Fotografie od Zby�ka Fojt�ka." onclick="pageTracker._trackPageview('/goto/spanker.cz/fotogal/ulita_zonglovani');" class="external">minul�ho ro�n�ku</a>.</p>
<h3>Plak�t</h3>
<p><a href="/img/u/ulita.png" title="Velk� obr�zek plak�tu.">{obrazek soubor='ulita.nahled.png' popisek='Plak�t �onglov�n� v Ulit�'}</a>
<a href="/img/u/ulita.small.png" title="Obr�zkov� plak�t na web.">ulita.png</a> - pro vkl�d�n� na internet<br />
<a href="ulita.pdf" title="Tisk plak�tu na form�t A5.">ulita.pdf</a> - pro tisk na form�t A5<br />
<a href="ulita4.pdf" title="Tisk �ty� plak�t� najednou.">ulita.pdf</a> - pro tisk na form�t A4
</ul>
</p>
<hr />
<h3>Na akci se pod�lej�</h3>
<p>
<a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - d�m d�t� a ml�de�e">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Prostory poskytl d�m d�t� a ml�de�e <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - d�m d�t� a ml�de�e">Ulita</a>, Praha 3.
</p>

<p>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" title="FireShow.cz">{obrazek soubor='fireshow.cz.png' popisek='Fireshow.cz'}</a>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" title="FireShow.cz - V�e pro �ongl�ry od �ongl�r�" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" class="external">FireShow.cz</a> - v�e pro �ongl�ry od �ongl�r�.
</p>

{*
<!--
<p>
<a href="http://www.zongluj.cz" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" title="zongluj.cz">{obrazek soubor='zongluj.cz.jpg' popisek='�ongluj imrv�re'}</a>
<a href="http://www.zongluj.cz" title="�ongluj imrv�re" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" class="external">Zongluj.cz</a> - specializovan� obchod s nejv�t��m v�b�rem zbo�� na �onglov�n� v �esk� republice.
</p>
-->
*}
