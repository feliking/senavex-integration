{if $facturacion}{include file="declaracionJurada/facturationMessage.tpl"}{/if}
{include file="declaracionJurada/DeclaracionJurada.tpl"}
{if $documentReview }
    {include file="declaracionJurada/reviewDocument/reviewDocuments.tpl"}
    {include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Enviando Información"}
    {include file="declaracionJurada/NoticeDeclaracionJurada.tpl" custom_message="Se asigno la Vigencia correctamente." documentReview="true"}
{/if}
{if $reasignarDeclaracion }
    {include file="declaracionJurada/reviewDocument/reasignarDeclaracion.tpl"}
    {include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Enviando Información"}
    {include file="declaracionJurada/NoticeDeclaracionJurada.tpl" custom_message="Cambio efectuado correctamente"}
{/if}
