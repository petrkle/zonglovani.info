<div class="vevent">
<p>
<span class="summary">Pravidelné nedělní žonglování v <a href="cesta.html" title="Ulita - dům dětí a mládeže">DDM Ulita</a>.</span> <span class="description">Žongluje se ve <a href="/obrazky/ulita-20091213/0059.jpg" title="Obrázek velkého sálu.">velkém sále</a> kde je: <strong>vysoký strop</strong>, měkká podlaha, ozvučení, pódium  pro případné vystoupení, okna a disco koule.</span>
</p>

{*
<a name="cancel2"><h3>17. 4. - zrušeno</h3></a>
<p>
Protože je venku hezky, ruší se žonglování v neděli 17. 4. 2011. Pojďte žonglovat ven :^)
</p>
*}

<p>
Přijít mohou začínající i zkušení žongléři a žonglérky. Pro širokou veřejnost budou k dispozici míčky a kužely k zapůjčení. Žonglovat se může naučit <strong>opravdu každý</strong>.
</p>

<div class="obrazkovnik">
<a href="/obrazky/ulita-20120318/0001.html">{obrazek soubor='snek052.jpg' popisek='' path='/ulita/img/'}</a>
<a href="/obrazky/ulita-20120318/0005.html">{obrazek soubor='snek053.jpg' popisek='' path='/ulita/img/'}</a>
<a href="/obrazky/ulita-20120318/0012.html">{obrazek soubor='snek054.jpg' popisek='' path='/ulita/img/'}</a>
<br /><a href="/obrazky/ulita-20120318/" title="Další obrázky z žonglování v Ulitě.">Další obrázky &raquo;</a>
</div>

<p>
Sleduj žonglérův slabikář přes <a href="/rss.html">RSS</a> - žádná Ulita ti neuteče.
</p>

{if count($podzim)>0}
<h3>Termíny - podzim 2011</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>Čas&nbsp;[Hod]</th>
<th>Vstupné&nbsp;[Kč]</th>
<th>Účast</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Neděle</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalendáři."><abbr class="dtstart" title="{$datum.mz|escape}">{$datum.datum}</abbr></a></td><td>15 - <abbr class="dtend" title="{$datum.mk|escape}">19</abbr></td><td>50</td><td>{if $datum.fb}<a href="http://www.facebook.com/event.php?eid={$datum.fb}" class="external">Přijdu</a>{else}&nbsp;{/if}</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Termíny - jaro 2012</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Den</th>
<th>Datum</th>
<th>Čas&nbsp;[Hod]</th>
<th>Vstupné&nbsp;[Kč]</th>
<th>Účast</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Neděle</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita v kalendáři."><abbr class="dtstart" title="{$datum.mz|escape}">{$datum.datum}</abbr></a></td><td>15 - <abbr class="dtend" title="{$datum.mk|escape}">19</abbr></td><td>50</td><td>{if $datum.fb}<a href="http://www.facebook.com/event.php?eid={$datum.fb}" class="external">Přijdu</a>{else}&nbsp;{/if}</td></tr>
{/foreach}
</table>
{else}
<h3>Termíny</h3>
<p>Příští žonglování v Ulitě bude pravděpodobně na podzim.</p>
{/if}

<h3><a href="cesta.html" title="Podrobný popis cesty.">Místo konání</a></h3>
<p>
<a href="cesta.html" title="Ulita - dům dětí a mládeže">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
<span class="location">Na Balkáně 17a, Praha 3, 130 00</span><br />
<a href="http://www.mapy.cz/#mm=ZP@ax=133213920@ay=135976864@at=Ulita@ad=D%C5%AFm%20d%C4%9Bt%C3%AD%20a%20ml%C3%A1de%C5%BEe%20Ulita.@x=133213312@y=135977056@z=16" title="Místo konání na mapě." class="external">Zobrazit na mapě</a><br />
<a href="cesta.html" title="Jak se dostat do Ulity">Popis cesty</a><br />
{*Telefon: 271 771 025<br />*}
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>
<h3><a name="plakat">Plakát</a></h3>
<p><a href="/img/u/ulita.big.png" title="Velký obrázek plakátu.">{obrazek soubor='ulita.nahled.png' popisek='Plakát žonglování v Ulitě'}</a>
<a href="/img/u/ulita.png" title="Obrázkový plakát na web.">ulita.png</a> - pro vkládání na internet<br />
<a href="ulita.pdf" title="Tisk plakátu na formát A5.">ulita.pdf</a> - pro tisk na formát A5<br />
<a href="ulita4.pdf" title="Tisk čtyř plakátů najednou.">ulita4.pdf</a> - pro tisk na formát A4
</p>
{*
<p><a href="http://www.radio1.cz" title="Radio 1">{obrazek soubor='radio1.png' popisek='Radio 1'}</a>O žonglování v Ulitě můžeš slyšet i v <a href="http://www.radio1.cz/kulturniservis/" title="Kulturní servis Rádia 1" class="external">kulturním servisu</a> Radia 1.</p>
*}
<p style="text-align: right; font-size: 0.5em;"><a href="/ulita/en.html">English version</a></p>
</div>
