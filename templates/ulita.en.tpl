<p>
Regular Sunday juggling at <a href="http://www.ulita.cz" class="external" title="Ulita - house of children and youth">DDM Ulita</a>. It takes place in a <a href="/obrazky/ulita-20091213/0059.jpg" title="Image of hall">large hall</a> with a <strong>high ceiling</strong>, a soft floor and big windows, a sound system, a stage for shows and a disco ball.
</p>

<div class="obrazkovnik">
<a href="/obrazky/ulita-20111009/0002.html">{obrazek soubor='snek031.jpg' popisek='' path='/ulita/img/'}</a>
<a href="/obrazky/ulita-20111009/0004.html">{obrazek soubor='snek032.jpg' popisek='' path='/ulita/img/'}</a>
<a href="/obrazky/ulita-20111009/0006.html">{obrazek soubor='snek033.jpg' popisek='' path='/ulita/img/'}</a>
<br /><a href="/obrazky/ulita-20111009/" title="Photos of juggling.">More photos &raquo;</a>
</div>
<p>
Beginners as well as experienced jugglers are welcome. There are balls and clubs prepare to lend for newcomers. <strong>Everyone</strong> can learn to juggle!
</p>

{if count($podzim)>0}
<h3>Autumn 2011</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Day</th>
<th>Date</th>
<th>Time&nbsp;[Hour]</th>
<th>Fee&nbsp;[CZK]</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Sunday</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita in calendar.">{$datum.datum}</a></td><td>16 - 19</td><td>50</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Spring 2012</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Day</th>
<th>Date</th>
<th>Time&nbsp;[Hour]</th>
<th>Fee&nbsp;[CZK]</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Sunday</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita in calendar.">{$datum.datum}</a></td><td>15 - 19</td><td>50</td></tr>
{/foreach}
</table>
{else}
<h3>Next session</h3>
<p>Wait for autumn.</p>
{/if}

{*
<h3>Next session</h3>
<p>Wait for autumn.</p>
*}

<h3>Place</h3>
<p>
<a href="http://www.ulita.cz" class="external" title="Ulita - dům dětí a mládeže">Ulita</a> - house of children and youth<br />
Na Balkáně 17a, Prague, 130 00 - <a href="http://maps.google.com/maps?q=50.094625,+14.481668+(Juggling+at+Ulita)&amp;iwloc=A&amp;z=17" title="Place on google maps." class="external">map</a><br />
Phone: +420 271 771 025<br />
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>

<hr />
<h3>Contributors</h3>
<p>
<a href="http://www.ulita.cz" title="Ulita - house of children and youth">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Place is provided by <a href="http://www.ulita.cz" class="external" title="Ulita - house of children and youth">Ulita</a>, Prague.
</p>

{*
<p><a href="http://www.radio1.cz" title="Radio 1">{obrazek soubor='radio1.png' popisek='Radio 1'}</a><a href="http://www.radio1.cz" title="Radio 1" class="external">Radio 1</a> - media support.</p>
*}

<p style="text-align: right; font-size: 0.5em;"><a href="/ulita/">Česká verze</a></p>
