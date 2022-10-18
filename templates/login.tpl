{include 'templates/header.tpl'}
    <br>
    <form method="POST" action="validate">
        <div class="form-group fs-3">
            <label for="exampleInputEmail1">Email</label>
            <input type="username" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escribir email ej. mail@gmail.com">
            
        </div>
        <br>
        <div class="form-group fs-3">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" name="contraseña" class="form-control" id="exampleInputPassword1" placeholder="Escribir contraseña">
        </div>
        {if $error}
            <br>
            <div>{$error}</div>
        {/if}
        <br>
        <button type="submit" class="btn btn-outline-danger">Acceder</button>
        <br>
    </form>
    
{include 'templates/footer.tpl'}
