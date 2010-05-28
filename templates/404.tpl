<ul>
<li>{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI|escape}</li>
</ul>
<p>
Je mi líto, požadovaná stránka se bohužel v žonglérově slabikáři nenachází. Patrně byla odstraněna, přemístěna nebo přejmenována. Průběžně dochází k drobným úpravám a je proto možné, že některé vnější odkazy nyní nefungují.
</p>
<h3>Můžeš zkusit následující:</h3>
<ul>
	<li>Pokud jsi napsal adresu do prohlížeče ručně, zkontroluj překlepy.</li>
	<li>Přejdi na <a href="/" title="Úvodní stránka žonglérova slabikáře.">úvodní stránku žonglérova slabikáře</a> a dál pokračuj odtud.</li>
	<li>Použij <a href="/mapa-stranek.html" title="Mapa stránek">mapu stránek</a>, tj. seznam všech stránek na serveru.</li>
	<li>Zkus stránku najít pomocí <a href="{$smarty.const.SEARCH_URL}" title="Prohledávání žonglérova slabikáře.">vyhledavani</a>.</li>
</ul>
<h3>Kontakt</h3>
{assign var='mail' value='admin@zonglovani.info'}
{assign var='tel' value='+420 732 766 740'}
<ul>
	<li>Elektronická pošta: {$mail|mailobfuscate}</li>
	<li>Telefon: {$tel|telobfuscate}</li>
</ul>

<p>Chybové hlášení: <strong>HTTP 404 [Page Not Found]</strong></p>
