<p>
O spolehlivost žonglérova slabikáře se starají testy napsané v <a href="/toolbox.html#perl" title="Programovací jazyk">perlu</a> pomocí modulů:
</p>

<a name="pm"></a>
{if $pm}
<ul>
{foreach from=$pm item=modul}
<li><a href="http://search.cpan.org/perldoc?{$modul|escape}" title="Dokumentace k {$modul|escape}" class="external" onclick="pageTracker._trackPageview('/goto/search.cpan.org/perldoc?{$modul|escape}');">{$modul|escape}</a></li>
{/foreach}
</ul>
{/if}

<h3>Fakemail</h3>
<p>
Program <a href="/toolbox.html#fakemail" title="Speciální MTA">fakemail</a> slouží pro testy odesílání emailů. Postup nastavení:
</p>
<ul>
<li>chmod +x /usr/local/bin/fakemail</li>
<li>groupadd fakemail</li>
<li>useradd -g fakemail -s /bin/false -d /home/fakemail fakemail</li>
<li>mkdir /home/fakemail /var/run/fakemail</li>
<li>chown fakemail.fakemail /home/fakemail /var/run/fakemail</li>
<li>/etc/rc.d/<a href="/ostatni/rc.fakemail" title="Shell script">rc.fakemail</a> start</li>
<li>postconf -e 'relayhost = 127.0.0.1:1234' && postfix reload</li>
</ul>
<p>
Nastavení /etc/<a href="/ostatni/sudoers" title="Nastavení sudo">sudoers</a>
</p>
