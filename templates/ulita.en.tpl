<p>
Regular Sunday juggling at <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - house of children and youth">DDM Ulita</a>. It takes place in a <a href="/obrazky/ulita-20091213/0059.html" title="Image of hall">large hall</a> with a <strong>high ceiling</strong>, a soft floor and big windows, a sound system, a stage for shows and a disco ball.
</p>

<div class="obrazkovnik">
<a href="/obrazky/ulita-20091213/0010.html">{obrazek soubor='uso.jpg' popisek=''}</a>
<a href="/obrazky/ulita-20091213/0012.html">{obrazek soubor='usp.jpg' popisek=''}</a>
<a href="/obrazky/ulita-20091213/0016.html">{obrazek soubor='usq.jpg' popisek=''}</a><br/>
<a href="/obrazky/filtr/Ulita" title="Photos of juggling.">More photos &raquo;</a>
</div>
<p>
Beginners as well as experienced jugglers are welcome. There are balls and clubs prepare to lend for newcomers. <strong>Everyone</strong> can learn to juggle!
</p>

<h3>Place</h3>
<p>
<a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dům dětí a mládeže">Ulita</a> - house of children and youth<br />
Na Balkáně 100, Prague, 130 00 - <a href="http://maps.google.com/maps?q=50.094625,+14.481668+(Juggling+at+Ulita)&amp;iwloc=A&amp;z=17" title="Place on google maps." class="external" onclick="pageTracker._trackPageview('/goto/maps.google.com/ulita');">map</a><br />
Phone: +420 271 771 025<br />
{assign var='mail' value='info@ulita.cz'}
E-mail: {$mail|mailobfuscate}
</p>

{if count($podzim)>0}
<h3>Autumn 2009</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Day</th>
<th>Date</th>
<th>Time [Hour]</th>
<th>Fee [CZK]</th>
</tr>
{foreach from=$podzim item=datum}
<tr><td>Sunday</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita in calendar.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{/if}

{if count($jaro)>0}
<h3>Spring 2010</h3>
<table class="tabulka" cellspacing="0" cellpadding="0">
<tr>
<th>Day</th>
<th>Date</th>
<th>Time [Hour]</th>
<th>Fee [CZK]</th>
</tr>
{foreach from=$jaro item=datum}
<tr><td>Sunday</td><td><a href="{$smarty.const.CALENDAR_URL}{$datum.url}" title="Ulita in calendar.">{$datum.datum}</a></td><td>15 - 19</td><td>40</td></tr>
{/foreach}
</table>
{else}
<p>Wait for autumn.</p>
{/if}
<hr />
<h3>Contributors</h3>
<p>
<a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - house of children and youth">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Place is provided by <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - house of children and youth">Ulita</a>, Prague.
</p>

<p><a href="http://www.radio1.cz" title="Radio 1" onclick="pageTracker._trackPageview('/goto/radio1.cz');">{obrazek soubor='radio1.png' popisek='Radio 1'}</a><a href="http://www.radio1.cz" title="Radio 1" onclick="pageTracker._trackPageview('/goto/radio1.cz');" class="external">Radio 1</a> - media support.</p>

<p style="text-align: right; font-size: 0.5em;"><a href="/ulita/">Česká verze</a></p>
