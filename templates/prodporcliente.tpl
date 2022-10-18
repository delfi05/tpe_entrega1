{include file="header.tpl"}
<br>
<div>
<p class="producto fs-2"><small>Este cliente tiene {$count} productos: <small></p>
<ul class="list-group">
    {foreach from=$detalles item=$detalle}
        
        <div class="lista fs-4">
            <li>
                <span> Producto: {$detalle->producto} - Talle: {$detalle->talle} - Color: {$detalle->color} - Marca: {$detalle->marca}</span>
        </div>    

    {foreachelse}
        <li class="fs-4">No tiene ningun producto asociado</li>
    {/foreach}
</ul>
<div>
{include file="footer.tpl"}