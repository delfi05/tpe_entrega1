{include file="header.tpl"}

<p class="producto fs-2"><small>{$count} producto para editar: <small></p>
<ul class="list-group">
    {foreach from=$productoById item=$productById}
        
        <div>
            <li class="fs-3 d-flex justify-content-between align-items-center">
                <span> Producto: {$productById->producto} - Talle: {$productById->talle} - Color: {$productById->color} - Marca: {$productById->marca}</span>
                
            </li>    
        </div>    
    {/foreach}
</ul>

{include file="formprodmodificar.tpl"} 
{include file="footer.tpl"}
