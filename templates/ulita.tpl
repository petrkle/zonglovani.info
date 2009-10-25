<p>
Pravidelné nedìlní ¾onglování v <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">DDM Ulita</a>. ®ongluje se ve <a href="/obrazky/ulita-20091018/0001.jpg" title="Obrázek velkého sálu." onclick="pageTracker._trackPageview('/obrazky/ulita-20091018/0001.jpg');">velkém sále</a> kde je: <strong>vysoký strop</strong>, mìkká podlaha, ozvuèení, pódium  pro pøípadné vystoupení, okna a disco koule.
</p>
<div class="obrazkovnik">
<a href="/obrazky/ulita-20091018/0012.html">{obrazek soubor='usb.jpg' popisek='®onglování v Ulitì'}</a>
<a href="/obrazky/ulita-20091018/0020.html">{obrazek soubor='usd.jpg' popisek='®onglování v Ulitì'}</a>
<a href="/obrazky/ulita-20091018/0006.html">{obrazek soubor='usa.jpg' popisek='®onglování v Ulitì'}</a>
<a href="/obrazky/ulita-20091018/0008.html">{obrazek soubor='usc.jpg' popisek='®onglování v Ulitì'}</a><br />
<a href="/obrazky/ulita-20091018/" title="Obrázky ¾onglování.">Dal¹í obrázky &raquo;</a>
</div>
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
<h3>Plakát</h3>
<p><a href="/img/u/ulita.big.png" title="Velký obrázek plakátu." onclick="pageTracker._trackPageview('/ulita/ulita.bit.png');">{obrazek soubor='ulita.nahled.png' popisek='Plakát ¾onglování v Ulitì'}</a>
<a href="/img/u/ulita.png" title="Obrázkový plakát na web." onclick="pageTracker._trackPageview('/ulita/ulita.png');">ulita.png</a> - pro vkládání na internet<br />
<a href="ulita.pdf" title="Tisk plakátu na formát A5." onclick="pageTracker._trackPageview('/ulita/ulita.pdf');">ulita.pdf</a> - pro tisk na formát A5<br />
<a href="ulita4.pdf" title="Tisk ètyø plakátù najednou." onclick="pageTracker._trackPageview('/ulita/ulita4.pdf');">ulita4.pdf</a> - pro tisk na formát A4
</ul>
</p>
<hr />
<h3>Na akci se podílejí</h3>
<p>
<a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Prostory poskytl dùm dìtí a mláde¾e <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">Ulita</a>, Praha 3.
</p>

<p style="text-align: right; font-size: 0.5em;"><a href="/ulita/en.html">English version</a></p>
{*
<p>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" title="FireShow.cz">{obrazek soubor='fireshow.cz.png' popisek='Fireshow.cz'}</a>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" title="FireShow.cz - V¹e pro ¾ongléry od ¾onglérù" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" class="external">FireShow.cz</a> - v¹e pro ¾ongléry od ¾onglérù.
</p>

<!--
<p>
<a href="http://www.zongluj.cz" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" title="zongluj.cz">{obrazek soubor='zongluj.cz.jpg' popisek='®ongluj imrvére'}</a>
<a href="http://www.zongluj.cz" title="®ongluj imrvére" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" class="external">Zongluj.cz</a> - specializovaný obchod s nejvìt¹ím výbìrem zbo¾í na ¾onglování v èeské republice.
</p>
-->
*}
{literal}
<style>
.obrazkovnik {
	float: left;
	margin: 15px 0 15px 20px;
}

.obrazkovnik a img {
	border: solid 1px #000;
}
</style>
{/literal}
