<p>
Pravidelné nedělní žonglování v <a href="cesta.html" title="Jak se dostat do Ulity">DDM Ulita</a>. Žongluje se ve <a href="/obrazky/ulita-20091213/0059.html" title="Obrázek velkého sálu.">velkém sále</a> kde je: <strong>vysoký strop</strong>, měkká podlaha, ozvučení, pódium  pro případné vystoupení, okna a disco koule.
</p>
<div class="obrazkovnik">
<a href="/obrazky/ulita-20091213/0010.html">{obrazek soubor='uso.jpg' popisek=''}</a>
<a href="/obrazky/ulita-20091213/0012.html">{obrazek soubor='usp.jpg' popisek=''}</a>
<a href="/obrazky/ulita-20091213/0016.html">{obrazek soubor='usq.jpg' popisek=''}</a>
<br /><a href="/obrazky/ulita-20091213/" title="Další obrázky z žonglování v Ulitě.">Další obrázky &raquo;</a>
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
<p><a href="/img/u/ulita.big.png" title="Velký obrázek plakátu." onclick="pageTracker._trackPageview('/ulita/ulita.big.png');">{obrazek soubor='ulita.nahled.png' popisek='Plakát žonglování v Ulitě'}</a>
<a href="/img/u/ulita.png" title="Obrázkový plakát na web." onclick="pageTracker._trackPageview('/ulita/ulita.png');">ulita.png</a> - pro vkládání na internet<br />
<a href="ulita.pdf" title="Tisk plakátu na formát A5." onclick="pageTracker._trackPageview('/ulita/ulita.pdf');">ulita.pdf</a> - pro tisk na formát A5<br />
<a href="ulita4.pdf" title="Tisk čtyř plakátů najednou." onclick="pageTracker._trackPageview('/ulita/ulita4.pdf');">ulita4.pdf</a> - pro tisk na formát A4
</ul>
</p>

<p><a href="http://www.radio1.cz" title="Radio 1" onclick="pageTracker._trackPageview('/goto/radio1.cz');">{obrazek soubor='radio1.png' popisek='Radio 1'}</a>O žonglování v Ulitě můžeš slyšet i v <a href="http://www.radio1.cz/kulturniservis/" title="Kulturní servis Rádia 1" onclick="pageTracker._trackPageview('/goto/radio1.cz/kulturniservis');" class="external">kulturním servisu</a> Radia 1.</p>

<p class="sdileni">
{include file='sdileni.tpl'}
</p>

<p style="text-align: right; font-size: 0.5em;"><a href="/ulita/en.html">English version</a></p>

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
