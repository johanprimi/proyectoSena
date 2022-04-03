<?php
require ('conexion.php');
if(isset($_POST) && $_POST["idproducto"]!=null){
    $ID=$_POST["idproducto"];
    $sql="SELECT  articulo.Id_articulo as nn,`Nombre_producto`,`Descripcion_imagen`,`Talla_articulo`,`Color_articulo`,`Precio_articulo` FROM `articulo` INNER JOIN `imagen_producto` ON articulo.Id_articulo = imagen_producto.Id_articulo WHERE articulo.Id_articulo = '$ID'";    
    $consulta= mysqli_query($db, $sql);    
    $datos =mysqli_fetch_assoc($consulta);
    $id=$datos["nn"];
    $nomproduct=$datos["Nombre_producto"];
    $talla=$datos["Talla_articulo"];
    $color=$datos["Color_articulo"];
    $precio=$datos["Precio_articulo"];
    $opciontalla=explode(",",$talla);
    $opcioncolor=explode(",",$color);
}else{
    header("location:index.php");

}

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Clothes.co</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./AdministradorContenido/recursos/libs/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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

    <main class="contenedor">
        <h1><?=$datos["Nombre_producto"]?></h1>

        <div class="camisa">
            <img class="camisa__imagen" src="img/<?php echo $datos['Descripcion_imagen']  ?>" alt="Imagen del Producto">

            <div class="camisa__contenido">
                <p></p>

                <form class="formulario" method="POST" action="producto.php">
                    <input type="hidden" value="<?php echo $id ?>" name="frmid">
                    <input type="hidden" value="<?php echo $nomproduct ?>" name="frmproduct">
                    <input type="hidden" value="<?php echo $precio ?>" name="frmprecio">
                    <select class="formulario__campo" name="frmtalla">
                        <option disabled selected>-- Seleccionar Talla --</option>
                        <?php foreach($opciontalla as $value){
                            echo "<option>$value</option>";
                        } ?>
                    </select>

                    <select class="formulario__campo" name="frmcolor">
                        <option disabled selected>-- Seleccionar Color --</option>
                        <?php foreach($opcioncolor as $value){
                            echo "<option>$value</option>";
                        } ?>
                    </select>
                    <input class="formulario__campo" type="number" placeholder="Cantidad" min="1" name="frmcant">
                    <input class="formulario__submit" type="submit" value="Agregar al Carrito" name="frmagregar">
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p class="footer__texto">Prestige Clothes.co - Todos los derechos Reservados 2022.</p>
    </footer>
    
</body>
</html>
<?php
    if(isset($_POST["frmagregar"])){
        $id=$_POST["frmid"];
        $nomproduct=$_POST["frmproduct"];
        $talla=$_POST["frmtalla"];
        $color=$_POST["frmcolor"];
        $precio=$_POST["frmprecio"];
        $cantidad=$_POST["frmcant"];

        $_SESSION["carrito"][$id]["Nombre producto"]=$nomproduct;
        $_SESSION["carrito"][$id]["Talla"]=$talla;
        $_SESSION["carrito"][$id]["Color"]=$color;
        $_SESSION["carrito"][$id]["Cantidad"]=$cantidad;
        $_SESSION["carrito"][$id]["Precio"]=$precio;


    }
?>