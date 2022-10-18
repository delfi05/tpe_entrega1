<!--formulario de productos -->
<form action= "infoEditProducto" method="POST">

    <div class="form fs-3">
        <input type="hidden" name="id" value="{$productById->id_producto}"> <!--input oculto para poner el id-->
        <label>Producto:</label>
        <select class="form-control" name="producto" value="{$productById->producto}">
            <option>Seleccionar</option>
            <option>Remera</option>
            <option>Buzo</option>
            <option>Pantalon</option>
            <option>Zapatillas</option>
        </select>

        <label>Talle</label>
            <input class="form-control" name="talle" value="{$productById->talle}"> 
        <label>Marca</label>
            <input class="form-control" name="marca" value="{$productById->marca}"> 
        <label>Color</label>
            <input class="form-control" name="color" value="{$productById->color}">
        <label>Descripcion</label>
            <input class="form-control" name="descripcion" value="{$productById->descripcion}"> 
    </div>
    <br>
    <div>
        <select name="cliente" class="form-control">
        <option value="">Seleccionar</option>
        {foreach from=$clientes item=$cliente}
            <option value="{$cliente->id_cliente}">{$cliente->nombre}</option>
       
        {/foreach}
        </select> 
    </div>
    <br>
    <button type="submit" class="btn btn-outline-danger">Guardar</button>
    <br>

</form>     