<!--esto me muestra el inicio de la pag, la parte de arriba-->
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <title>Tienda - Mia</title>
</head>
<body>
    <header>       
      <div class="navbar navbar-light" style="background-color: brown;">
        <h1>Tienda - Mia</h1>
      </div>
      <br>
      <nav>
        <ul class="nav nav-tabs justify-content-end">
          <li class="nav-link border-danger"><a class="nav-link text-danger" aria-current="page"href="productos">Productos</a></li>
          <li class="nav-link border-danger"><a class="nav-link text-danger" aria-current="page"href="cliente">Clientes</a></li>
          {if !isset($smarty.session.USER_ID)}
            <li class="nav-link border-danger"><a class="nav-link text-danger" aria-current="page" href="login">Login</a></li>
          {else} <li class="nav-link border-danger"><a class="nav-link text-danger" aria-current="page" href="logout">Logout({$smarty.session.USER_EMAIL})</a>
            </li>
          {/if}
        </ul>
      </nav>

    </header>
