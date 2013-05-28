<p>
O spolehlivost žonglérova slabikáře se starají testy napsané v <a href="/toolbox.html#perl" title="Programovací jazyk">perlu</a> pomocí modulů:
</p>

<a name="pm"></a>
{if $pm}
<ul>
{foreach from=$pm item=modul}
<li><a href="https://metacpan.org/module/{$modul|escape}" title="Dokumentace k {$modul|escape}" class="external">{$modul|escape}</a></li>
{/foreach}
</ul>
{/if}

<h3>Fakemail</h3>
<p>
Program <a href="/toolbox.html#fakemail" title="Speciální MTA">fakemail</a> slouží pro testy odesílání emailů.
</p>
<p>
Nastavení /etc/<a href="/ostatni/sudoers" title="Nastavení sudo">sudoers</a>
</p>
