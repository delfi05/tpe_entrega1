{include file="header.tpl"}

<p class="cliente fs-2"><small>{$count} cliente para editar: <small></p>
<ul class="list-group">
    {foreach from=$clienteById item=$clientById}
        
        <div class="fs-3 d-flex justify-content-between align-items-center">
            <li>
                <span> Nombre: {$clientById->nombre} - Apellido: {$clientById->apellido} - Dni: {$clientById->dni}</span>
               
            </li>    
        </div>    
    {/foreach}
</ul>

{include file="formclientemodificar.tpl"} 
{include file="footer.tpl"}