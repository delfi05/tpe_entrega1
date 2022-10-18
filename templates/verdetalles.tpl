{include file="header.tpl"}
<br>
<ul class="list-group">
    {foreach from=$detalles item=$detalle}
        
        <div class="fs-4">
            <li>
                <span> Producto: {$detalle->producto} - Talle: {$detalle->talle} - Color: {$detalle->color} - Marca: {$detalle->marca} Descripcion: {$detalle->descripcion} </span>
        
        </div>    
    {/foreach}
</ul>

{include file="footer.tpl"}