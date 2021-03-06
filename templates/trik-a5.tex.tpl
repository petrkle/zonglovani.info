{if $trik.break_before}
\clearpage
{/if}
\section{literal}{{/literal}{$trik.about.nazev}{literal}}{/literal}

{assign var='imagenum' value='0'}
{foreach from=$trik.kroky item=krok key=k name=postup}
{if $krok.break_before}
\clearpage
{/if}
{if isset($krok.nadpis)}
\subsection*{literal}{{/literal}{$krok.nadpis}{literal}}{/literal}
{/if}
{if isset($krok.obrazek)}
\vskip -0.10cm
\begin{literal}{{/literal}tabular{literal}}{/literal}{literal}{{/literal}p{literal}{{/literal}3.3cm{literal}}{/literal} p{literal}{{/literal}5.8cm{literal}}{/literal}{literal}}{/literal}
    \vspace{literal}{{/literal}0pt{literal}}{/literal} 
    \fbox{literal}{{/literal}\includegraphics[width=3.5cm]{literal}{{/literal}{if $krok.obrazek_src}{$krok.obrazek_src}{else}{$krok.obrazek}{/if}{literal}}{/literal}{literal}}{/literal}
{assign var='sobrazkem' value=1}
{else}
{assign var='sobrazkem' value=0}
{/if}
{if isset($krok.popisek)}
{if $sobrazkem==1}
    & 
    \vspace{literal}{{/literal}0pt{literal}}{/literal}
{$krok.popisek}
\end{literal}{{/literal}tabular{literal}}{/literal}
\vskip -0.10cm

{else}
\vskip 0.20cm
\begin{literal}{{/literal}minipage{literal}}{/literal}[h]{literal}{{/literal}1\textwidth{literal}}{/literal}
{$krok.popisek}
\end{literal}{{/literal}minipage{literal}}{/literal}

{/if}
{/if}
{/foreach}
