<p>Výpis budoucích akcí z <a href="{$smarty.const.CALENDAR_URL}" title="Kalendář žonglování">kalendáře</a>, neboli <strong>widget</strong>, je obdélník s aktuálním výpisem chystaných žonglérských akcí. Můžeš ho vložit pomocí HTML na svůj web.</p>
<h3>Světlá varianta</h3>
<p>
<code>
&lt;div id="zs-kalendar"&gt;&lt;/div&gt;<br />
&lt;script src="http://zonglovani.info/kalendar/widget.js" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;
</code>
</p>
<p>{obrazek soubor='widget-light.png' popisek='Widget - světlá varianta'}</p>
<h3>Tmavá varianta</h3>
<p>
<code>
&lt;div id="zs-kalendar"&gt;&lt;/div&gt;<br />
&lt;script src="http://zonglovani.info/kalendar/widget.js?css=http://zonglovani.info/css/w-dark.css" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;
</code>
</p>
<p>{obrazek soubor='widget-dark.png' popisek='Widget - tmavá varianta'}</p>
<h3>Možnosti přizpůsobení</h3>
<p>
Pomocí parametru <code>css</code> můžeš nastavit vlastní kaskádový styl pro widget. Bez zadání se použije výchozí <a href="/css/w-light.css" title="Kaskádový styl pro světlou variantu.">světlý styl</a>.
</p>
<p>Parametr <code>filtr</code> umožňuje filtrovat zobrazované události podle toho kdo je vložil. Např.:</p>
<p>
<code>&lt;div id="zs-kalendar"&gt;&lt;/div&gt;<br />
&lt;script src="http://zonglovani.info/kalendar/widget.js?css=http://kdesi.cz/zongl.css&amp;filtr=nekdo" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;</code>
</p>
<p>Zobrazí pouze události zadané uživatelem který má login "nekdo". Navíc se použije vlastní kaskádový styl. Login uživatele zjistíš z adresy profilu. Např.: http://zonglovani.info/lide/nekdo.html</p>
<h3>API</h3>
<p>
Data z kalendáře jsou přístupná ve formátu json na adrese: <a href="{$smarty.const.CALENDAR_URL}next.json">http://zonglovani.info/kalendar/next.json</a>
</p>
<h3>Příklady použití</h3>
<ul>
<li><a href="http://kle.cz" title="kle.cz" class="external" onclick="pageTracker._trackPageview('/goto/kle.cz">kle.cz</a></li>
</ul>
