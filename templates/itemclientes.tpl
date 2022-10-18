{include file="header.tpl"}
<br>
<p class="cliente fs-2"><small>Tenemos {$count} clientes: <small></p>
<ul class="list-group">
    {foreach from=$cliente item=$client}
        
        <div class="list-group-item">
            <li class="fs-5 d-flex justify-content-between align-items-center">
                <span> Nombre: {$client->nombre} - Apellido: {$client->apellido} - Dni: {$client->dni}</span>
                <div>
                    {if isset($smarty.session.USER_ID)}
                        <a class="btn btn-outline-danger" href='delete_cliente/{$client->id_cliente}' type='button'>Borrar</a>
                        <a class="btn btn-outline-danger" href='editar/{$client->id_cliente}' type='button'>Editar</a>     
                    {/if} 
                        <a class="btn btn-outline-danger" href='productosporcliente/{$client->id_cliente}' type='button'>Ver detalles</a>   
                </div>
        </div>    
    {/foreach}
</ul>

{if isset($smarty.session.USER_ID)}
{include file="formclientes.tpl"}
{/if}
{include file="footer.tpl"}