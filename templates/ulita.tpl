<p>
Pravidelné nedělní žonglování v <a href="cesta.html" title="Jak se dostat do Ulity">DDM Ulita</a>. Žongluje se ve <a href="/obrazky/ulita-20091018/0001.jpg" title="Obrázek velkého sálu." onclick="pageTracker._trackPageview('/obrazky/ulita-20091018/0001.jpg');">velkém sále</a> kde je: <strong>vysoký strop</strong>, měkká podlaha, ozvučení, pódium  pro případné vystoupení, okna a disco koule.
</p>
<div class="obrazkovnik">
{*<a href="/obrazky/ulita-20091101/0000.html">{obrazek soubor='use.jpg' popisek='Žonglování v Ulitě'}</a>*}
<a href="/obrazky/ulita-20091101/0035.html">{obrazek soubor='ush.jpg' popisek='Žonglování v Ulitě'}</a>
<a href="/obrazky/ulita-20091101/0041.html">{obrazek soubor='usg.jpg' popisek='Žonglování v Ulitě'}</a>
<a href="/obrazky/ulita-20091101/0003.html">{obrazek soubor='usf.jpg' popisek='Žonglování v Ulitě'}</a>
<br /><a href="/obrazky/ulita-20091101/" title="Obrázky žonglování.">Další obrázky &raquo;</a>
</div>
<p>
Přijít mohou začínající i zkušení žongléři a žonglérky. Pro širokou veřejnost jsou k dispozici míčky a kužely k zapůjčení. Žonglovat se může naučit <strong>opravdu každý</strong>.
</p>

<h3><a href="cesta.html" title="Podrobný popis cesty.">Místo konání</a></h3>
<p>
<a href="cesta.html" title="Ulita - dům dětí a mládeže">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Na Balkáně 100, Praha 3, 130 00<br />
<a href="http://www.mapy.cz/#mm=ZP@ax=133213920@ay=135976864@at=Ulita@ad=D%C5%AFm%20d%C4%9Bt%C3%AD%20a%20ml%C3%A1de%C5%BEe%20Ulita.@x=133213312@y=135977056@z=16" title="Místo konání na mapě." class="external" onclick="pageTracker._trackPageview('/goto/mapy.cz/ulita');">Zobrazit na mapě</a><br />
<a href="cesta.html" title="Jak se dostat do Ulity">Popis cesty</a><br />
Telefon: 271 771 025<br />
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>
{*
<p>
<a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dům dětí a mládeže">Ulita</a> - dům dětí a mládeže<br />
Na Balkáně 100, Praha 3, 130 00 - <a href="cesta.html" title="Podrobný popis cesty.">popis cesty</a>, <a href="http://www.mapy.cz/#mm=ZP@ax=133213920@ay=135976864@at=Ulita@ad=D%C5%AFm%20d%C4%9Bt%C3%AD%20a%20ml%C3%A1de%C5%BEe%20Ulita.@x=133213312@y=135977056@z=16" title="Místo konání na mapě." class="external" onclick="pageTracker._trackPageview('/goto/mapy.cz/ulita');">mapa</a><br />
Telefon: 271 771 025<br />
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>
*}

{if count($podzim)>0}
<h3>Termíny - podzim 2009</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>Čas [Hod]</th>
<th>Vstupné [Kč]</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Neděle</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalendáři.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Termíny - jaro 2010</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>Čas [Hod]</th>
<th>Vstupné [Kč]</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Neděle</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalendáři.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{else}
<p>Další žonglování v ulitě bude na podzim.</p>
{/if}
<h3>Plakát</h3>
<p><a href="/img/u/ulita.big.png" title="Velký obrázek plakátu." onclick="pageTracker._trackPageview('/ulita/ulita.bit.png');">{obrazek soubor='ulita.nahled.png' popisek='Plakát žonglování v Ulitě'}</a>
<a href="/img/u/ulita.png" title="Obrázkový plakát na web." onclick="pageTracker._trackPageview('/ulita/ulita.png');">ulita.png</a> - pro vkládání na internet<br />
<a href="ulita.pdf" title="Tisk plakátu na formát A5." onclick="pageTracker._trackPageview('/ulita/ulita.pdf');">ulita.pdf</a> - pro tisk na formát A5<br />
<a href="ulita4.pdf" title="Tisk čtyř plakátů najednou." onclick="pageTracker._trackPageview('/ulita/ulita4.pdf');">ulita4.pdf</a> - pro tisk na formát A4
</ul>
</p>
{*
<hr />
<h3>Na akci se podílejí</h3>
<p>
<a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dům dětí a mládeže">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Prostory poskytl dům dětí a mládeže <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dům dětí a mládeže">Ulita</a>, Praha 3.
</p>
*}

<p class="sdileni">
Přidat na: <a href="http://www.facebook.com/share.php?u=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" class="external" onclick="pageTracker._trackPageview('/goto/facebook.com/share{$smarty.server.REQUEST_URI}');" title="Poslat {$titulek|escape} na facebook.">facebook</a>, <a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}&title={$titulek|escape:'url'}&hl=cs" title="Přidat {$titulek|escape} do záložek na google." class="external" onclick="pageTracker._trackPageview('/goto/google.com/bookmarks{$smarty.server.REQUEST_URI}');">google</a>
</p>

<p style="text-align: right; font-size: 0.5em;"><a href="/ulita/en.html">English version</a></p>
{*
<p>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" title="FireShow.cz">{obrazek soubor='fireshow.cz.png' popisek='Fireshow.cz'}</a>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" title="FireShow.cz - Vše pro žongléry od žonglérů" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" class="external">FireShow.cz</a> - vše pro žongléry od žonglérů.
</p>

<!--
<p>
<a href="http://www.zongluj.cz" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" title="zongluj.cz">{obrazek soubor='zongluj.cz.jpg' popisek='Žongluj imrvére'}</a>
<a href="http://www.zongluj.cz" title="Žongluj imrvére" onclick="pageTracker._trackPageview('/goto/zongluj.cz');" class="external">Zongluj.cz</a> - specializovaný obchod s největším výběrem zboží na žonglování v české republice.
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
