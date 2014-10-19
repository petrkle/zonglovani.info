<div class="spacer"></div>
<!-- stránka konec -->
</div>

{if preg_match('/android/i',$smarty.server.HTTP_USER_AGENT)}
<div class="mobileapp">Žonglérův slabikář jako <a href="/g/android.app" title="Aplikace pro off-line prohlížení žonglérova slabikáře." class="external">aplikace pro Android</a></div>
{/if}

{if preg_match('/mobile.*firefox/i',$smarty.server.HTTP_USER_AGENT)}
<div class="mobileapp">Žonglérův slabikář jako <a href="https://marketplace.firefox.com/app/zongleruv-slabikar" title="Aplikace pro off-line prohlížení žonglérova slabikáře." class="external">aplikace pro Firefox OS</a></div>
{/if}

<div id="paticka">
<div id="dolni">
<div>
{dolnimenu}
</div>
</div>
</div>

</body>
</html>
