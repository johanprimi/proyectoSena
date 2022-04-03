

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Clothes.co</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="header">
        <a href="index.php">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Tienda</a>
        <a class="navegacion__enlace" href="#">Nosotros</a>
        <a href="carrito.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <circle cx="6" cy="19" r="2" />
        <circle cx="17" cy="19" r="2" />
        <path d="M17 17h-11v-14h-2" />
        <path d="M6 5l14 1l-1 7h-13" />
        </svg>
        </a>
        <form class="navegacion__enlace">        
        <a  href="./login.php" class="btn btn-success" >
        <i class="fas fa-address-book"></i>
            Iniciar sesión</a>
        </form>
    </nav>

    <h1>Inicia sesion o Registrate</h1>
    <form class="formulario_log" action="validarLog.php" method="POST">
        <label for="inputemail">Correo</label>
        <input class="formulario__campo" type="text" name="email" id="inputemail" placeholder="Ingrese su email">
        <label for="inputpass">Contraseña</label>
        <input class="formulario__campo" type="password" name="contraseña" id="inputpass" placeholder="ingrese su contraseña">
        <input class="formulario__submit" type="submit" value="Iniciar sesion">
        <p class="small fw-bold mt-2 pt-1 mb-0">No tienes cuenta? <a href="registro.php"class="link-danger">Crear cuenta gratis</a></p>
    </form>
    


    <footer class="footer">
        <p class="footer__texto">Prestige Clothes.co - Todos los derechos Reservados 2022.</p>
    </footer>
    
</body>
</html>