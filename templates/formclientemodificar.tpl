<!--formulario de clientes -->
<form action= "infoEditarCliente" method="POST">

    <div class="form fs-3">
        <input type="hidden" name="id" value="{$clientById->id_cliente}"> <!--input oculto para poner el id-->
        <label>Nombre</label>
            <input class="form-control" name="nombre" value="{$clientById->nombre}"> 
        <label>Apellido</label>
            <input class="form-control" name="apellido" value="{$clientById->apellido}"> 
        <label>Dni</label>
            <input class="form-control" name="dni" value="{$clientById->dni}">
        
    </div>
    <br>
    <button type="submit" class="btn btn-outline-danger">Guardar</button>
    <br>
</form>     