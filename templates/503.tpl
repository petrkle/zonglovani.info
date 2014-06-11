<ul>
<li>{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI|escape}</li>
</ul>
<p>
Je mi líto, požadovaná stránka je dočasně nedostupná.
</p>
<h3>Můžeš zkusit následující:</h3>
<ul>
	<li>Přejdi na <a href="/" title="Úvodní stránka žonglérova slabikáře.">úvodní stránku žonglérova slabikáře</a> a dál pokračuj odtud.</li>
</ul>
<h3><a href="/kontakt.html" title="Kompletní kontaktní údaje">Kontakt</a></h3>
{assign var='mail' value='admin@zonglovani.info'}
<ul>
	<li>Elektronická pošta: {$mail|mailobfuscate}</li>
</ul>
<hr />
<p>Chybové hlášení: <strong>HTTP 503 [Service Unavailable]</strong></p>
