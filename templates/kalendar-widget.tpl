<p>Výpis budoucích akcí z <a href="{$smarty.const.CALENDAR_URL}" title="Kalendář žonglování">kalendáře</a>, neboli <strong>widget</strong>, je obdélník s aktuálním výpisem chystaných žonglérských akcí. Můžeš ho vložit pomocí HTML na svůj web.</p>
<h3>Světlá varianta</h3>
<p>
<textarea>
&lt;a href="https://zonglovani.info/kalendar" title="Kalendář žonglérských akcí" id="zs-kalendar"&gt;Kalendář žonglování&lt;/a&gt;<br />
&lt;script src="https://zonglovani.info/kalendar/widget.js" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;
</textarea>
</p>
<p>{obrazek soubor='widget-light.png' popisek='Widget - světlá varianta'}</p>
<h3>Světlá varianta na šířku</h3>
<p>
<textarea>
&lt;a href="https://zonglovani.info/kalendar" title="Kalendář žonglérských akcí" id="zs-kalendar"&gt;Kalendář žonglování&lt;/a&gt;<br />
&lt;script src="https://zonglovani.info/kalendar/widget.js?css=https://zonglovani.info/css/ww-light.css" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;
</textarea>
</p>
<p><a href="/img/w/widget-light-w.png" title="Světlá varianta na šířku">{obrazek soubor='widget-light-w.s.png' popisek='Widget - světlá varianta na šířku'}</a></p>
<h3>Tmavá varianta</h3>
<p>
<textarea>
&lt;a href="https://zonglovani.info/kalendar" title="Kalendář žonglérských akcí" id="zs-kalendar"&gt;Kalendář žonglování&lt;/a&gt;<br />
&lt;script src="https://zonglovani.info/kalendar/widget.js?css=https://zonglovani.info/css/w-dark.css" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;
</textarea>
</p>
<p>{obrazek soubor='widget-dark.png' popisek='Widget - tmavá varianta'}</p>
<h3>Možnosti přizpůsobení</h3>
<p>
Pomocí parametru <code>css</code> můžeš nastavit vlastní kaskádový styl pro widget. Bez zadání se použije výchozí <a href="/css/w-light.css" title="Kaskádový styl pro světlou variantu.">světlý styl</a>.
</p>
<p>Parametr <code>filtr</code> umožňuje filtrovat zobrazované události podle toho kdo je vložil. Např.:</p>
<p>
<textarea>
&lt;a href="https://zonglovani.info/kalendar" title="Kalendář žonglérských akcí" id="zs-kalendar"&gt;Kalendář žonglování&lt;/a&gt;<br />
&lt;script src="https://zonglovani.info/kalendar/widget.js?css=http://kdesi.cz/zongl.css&amp;filtr=nekdo" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;</textarea>
</p>
<p>Zobrazí pouze události zadané uživatelem který má login "nekdo". Navíc se použije vlastní kaskádový styl. Login uživatele zjistíš z adresy profilu. Např.: https://zonglovani.info/lide/nekdo.html</p>

<p>Parametr <code>ukaz=obrazky</code> přidá k událostem obrázky. Příklad použití:</p>
<p>
<textarea>
&lt;a href="https://zonglovani.info/kalendar" title="Kalendář žonglérských akcí" id="zs-kalendar"&gt;Kalendář žonglování&lt;/a&gt;<br />
&lt;script src="https://zonglovani.info/kalendar/widget.js?ukaz=obrazky" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;</textarea>
</textarea>
</p>
<p><a href="/img/w/widget-img.png" title="Widget s obrázky">{obrazek soubor='widget-img.s.png' popisek='Widget s obrázky'}</a></p>

<h3>API</h3>
<p>
Data z kalendáře jsou přístupná ve formátu json na adrese: <a href="{$smarty.const.CALENDAR_URL}next.json">https://zonglovani.info/kalendar/next.json</a>
</p>
<a name="use"><h3>Příklady použití</h3></a>
<ul>
<li><a href="http://juggle.cz" title="juggle.cz" class="external">juggle.cz</a></li>
<li><a href="http://kinessis.org/cs/predstavivost.html" title="kinessis.org" class="external">kinessis.org</a></li>
<li><a href="https://kle.cz/ruzne" title="kle.cz" class="external">kle.cz</a></li>
</ul>
