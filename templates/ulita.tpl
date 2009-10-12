<p>
Pravidelné nedìlní ¾onglování v <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">DDM Ulita</a>. ®ongluje se ve <a href="http://www.ulita.cz/images/saly/001/002.jpg" title="Obrázek velkého sálu." class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz/images');">velkém sále</a> kde je: <strong>vysoký strop</strong>, mìkká podlaha, ozvuèení, pódium  pro pøípadné vystoupení, okna a disco koule.
</p>

<p>
Pøijít mohou zaèínající i zku¹ení ¾ongléøi a ¾onglérky. Pro ¹irokou veøejnost budou k dispozici míèky a ku¾ely k zapùjèení. ®onglovat se mù¾e nauèit <strong>opravdu ka¾dý</strong>.
</p>

<h3>Místo konání</h3>
<p>
<a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">Ulita</a> - dùm dìtí a mláde¾e<br />
Na Balkánì 100, Praha 3, 130 00 - <a href="http://www.mapy.cz/#mm=ZP@ax=133213920@ay=135976864@at=Ulita@ad=D%C5%AFm%20d%C4%9Bt%C3%AD%20a%20ml%C3%A1de%C5%BEe%20Ulita.@x=133213312@y=135977056@z=16" title="Místo konání na mapì." class="external" onclick="pageTracker._trackPageview('/goto/mapy.cz/ulita');">mapa</a><br />
Telefon: 271 771 025<br />
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>

{if count($podzim)>0}
<h3>Termíny - podzim 2009</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>Èas [Hod]</th>
<th>Vstupné [Kè]</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Nedìle</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalendáøi.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Termíny - jaro 2010</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>Èas [Hod]</th>
<th>Vstupné [Kè]</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Nedìle</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalendáøi.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{else}
<p>Dal¹í ¾onglování v ulitì bude na podzim.</p>
{/if}
<p>Obrázky z <a href="http://spanker.cz/fotogal/ulita_zonglovani/index.html" title="Fotografie od Zbyòka Fojtíka." onclick="pageTracker._trackPageview('/goto/spanker.cz/fotogal/ulita_zonglovani');" class="external">minulého roèníku</a>.</p>
<h3>Plakát</h3>
<p><a href="/img/u/ulita.png" title="Velký obrázek plakátu.">{obrazek soubor='ulita.nahled.png' popisek='Plakát ¾onglování v Ulitì'}</a>
<a href="/img/u/ulita.small.png" title="Obrázkový plakát na web.">ulita.png</a> - pro vkládání na internet<br />
<a href="ulita.pdf" title="Tisk plakátu na formát A5.">ulita.pdf</a> - pro tisk na formát A5<br />
<a href="ulita4.pdf" title="Tisk ètyø plakátù najednou.">ulita.pdf</a> - pro tisk na formát A4
</ul>
</p>
<hr />
<h3>Na akci se podílejí</h3>
<p>
<a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Prostory poskytl dùm dìtí a mláde¾e <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">Ulita</a>, Praha 3.
</p>

<p>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" title="FireShow.cz">{obrazek soubor='fireshow.cz.png' popisek='Fireshow.cz'}</a>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" title="FireShow.cz - V¹e pro ¾ongléry od ¾onglérù" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" class="external">FireShow.cz</a> - v¹e pro ¾ongléry od ¾onglérù.
</p>

{*
<!--
<p>
<a href="http://www.zongluj.cz" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" title="zongluj.cz">{obrazek soubor='zongluj.cz.jpg' popisek='®ongluj imrvére'}</a>
<a href="http://www.zongluj.cz" title="®ongluj imrvére" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" class="external">Zongluj.cz</a> - specializovaný obchod s nejvìt¹ím výbìrem zbo¾í na ¾onglování v èeské republice.
</p>
-->
*}
