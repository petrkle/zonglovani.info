\section{literal}{{/literal}{$trik.about.nazev}{literal}}{/literal}

{assign var='imagenum' value='0'}
{foreach from=$trik.kroky item=krok key=k name=postup}
{if isset($krok.nadpis)}
\subsection{literal}{{/literal}{$krok.nadpis}{literal}}{/literal}
{/if}
{if isset($krok.obrazek)}
\vskip -0.25cm
\begin{literal}{{/literal}tabular{literal}}{/literal}{literal}{{/literal}p{literal}{{/literal}6cm{literal}}{/literal} p{literal}{{/literal}7cm{literal}}{/literal}{literal}}{/literal}
    \vspace{literal}{{/literal}0pt{literal}}{/literal} 
    \includegraphics[width=0.4\textwidth]{literal}{{/literal}img/{$krok.obrazek|truncate:1:""}/{$krok.obrazek}{literal}}{/literal}
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
\vskip -0.25cm

{else}
\begin{literal}{{/literal}minipage{literal}}{/literal}[h]{literal}{{/literal}1\textwidth{literal}}{/literal}
{$krok.popisek}
\end{literal}{{/literal}minipage{literal}}{/literal}

{/if}
{/if}
{/foreach}
