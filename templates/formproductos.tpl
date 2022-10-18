<!--formulario de productos -->
<form action= "add" method="POST">
    <br>
    <p class="fs-4">Formulario para agregar ropa:</p><br>
    <div class="form fs-4">
        <label>Producto</label>
            <select class="form-control" name="producto">
                <option>Seleccionar</option>
                <option>Remera</option>
                <option>Buzo</option>
                <option>Pantalon</option>
                <option>Zapatillas</option>
            </select>
        <label>Talle</label>
            <input class="form-control" name="talle">
        <label>Marca</label>
            <input class="form-control" name="marca">
        <label>Color</label>
            <input class="form-control" name="color">
        <label>Descripcion</label>
            <textarea class="form-control" name="descripcion"></textarea>
            
    </div>
    <br>
    <div class="form fs-4">
        <label>Agregar a:</label>
        <select name="cliente" class="form-control">
        <option value="">Seleccionar cliente</option>
        {foreach from=$clientes item=$cliente}
            <option value="{$cliente->id_cliente}">{$cliente->nombre}</option>
       
        {/foreach}
        </select>    
    </div>
    <br>
    <button type="submit" class="btn btn-outline-danger">Agregar</button>

</form>        