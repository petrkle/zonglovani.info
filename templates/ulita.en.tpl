<p>
Regular sunday juggling in <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - house of children and youth">DDM Ulita</a>. There is <a href="http://www.ulita.cz/images/saly/001/002.jpg" title="Obrázek velkého sálu." class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz/images');">big gym</a> with: <strong>high ceiling</strong>, soft floor, loudspeakers, stage for show, windows and disco ball.
</p>

<p>
Invited are beginers also experienced jugglers. Balls and clubs are prepared for lending. <strong>Everybody</strong> can learn juggling.
</p>

<h3>Place</h3>
<p>
<a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - dùm dìtí a mláde¾e">Ulita</a> - house of children and youth<br />
Na Balkánì 100, Prague, 130 00 - <a href="http://maps.google.com/maps?q=50.094625,+14.481668+(Juggling+in+Ulita)&iwloc=A&z=17" title="Place on google maps." class="external" onclick="pageTracker._trackPageview('/goto/maps.google.com/ulita');">map</a><br />
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
<p>Pictures from <a href="http://spanker.cz/fotogal/ulita_zonglovani/index.html" title="Photos by Zbyòìk Fojtík." onclick="pageTracker._trackPageview('/goto/spanker.cz/fotogal/ulita_zonglovani');" class="external">last year</a>.</p>
<hr />
<h3>Contributors</h3>
<p>
<a href="http://www.ulita.cz" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - house of children and youth">{obrazek soubor='ulita.cz.png' popisek='Ulita'}</a>
Place is provided by <a href="http://www.ulita.cz" class="external" onclick="pageTracker._trackPageview('/goto/ulita.cz');" title="Ulita - house of children and youth">Ulita</a>, Prague.
</p>

<p>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" title="FireShow.cz">{obrazek soubor='fireshow.cz.png' popisek='Fireshow.cz'}</a>
<a href="http://www.fireshow.cz/zonglovani-v-ulite" title="FireShow.cz - all for jugglers from jugglers" onclick="pageTracker._trackPageview('/goto/fireshow.cz/zonglovani-v-ulite');" class="external">FireShow.cz</a> - all for jugglers from jugglers.
</p>
