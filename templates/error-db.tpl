<h1>Chyba vyhledávání</h1>

<p>
Jejda, vyhledávání přestalo fungovat. Je to dočasná chyba a brzy jí opravím. Zkus opakovat vyhledávání za chvilku.
</p>

<h3>Můžeš zkusit následující:</h3>
<ul>
	<li>Přejít na <a href="/" title="Úvodní stránka žonglérova slabikáře.">úvodní stránku žonglérova slabikáře</a> a dál pokračuj odtud.</li>
	<li>Použít <a href="/mapa-stranek.html" title="Mapa stránek">mapu stránek</a>, tj. seznam všech stránek na serveru.</li>
</ul>

<h3><a href="/kontakt.html" title="Kompletní kontaktní údaje">Kontakt</a></h3>
{assign var='mail' value='admin@zonglovani.info'}
<ul>
	<li>Elektronická pošta: {$mail|mailobfuscate}</li>
</ul>
<hr />

<p>Chybové hlášení: <strong>{$chyba|escape}</strong></p>
