{include file="header.tpl"}
<br>
<p class="fs-2 productsJoinClientes"><small>Tenemos {$count} productos: <small></p>
<ul class="list-group">
    {foreach from=$productsJoinClientes item=$product}
        
        <div class="list-group-item">
            <li class="fs-5 d-flex justify-content-between align-items-center">
                <span> Producto: {$product->producto} - talle: {$product->talle} - color: {$product->color} - marca: {$product->marca}- Nombre: {$product->nombre}</span>
                <div>
                    {if isset($smarty.session.USER_ID)} 
                        <a class="btn btn-outline-danger" href='delete/{$product->id_producto}' type='button'>Borrar</a>
                        <a class="btn btn-outline-danger" href='edit/{$product->id_producto}' type='button'>Editar</a>     
                    {/if}
                        <a class="btn btn-outline-danger" href='verdetalles/{$product->id_producto}' type='button'>Ver detalles</a>    
            
                </div>
            </li>
        </div>    
    {/foreach}
</ul>

{if isset($smarty.session.USER_ID)}
{include file="formproductos.tpl"}
{/if}
{include file="footer.tpl"}