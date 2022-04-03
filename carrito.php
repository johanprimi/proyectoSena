<?php
session_start();
$total=0.0;
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
        <?php
        if(isset($_SESSION["carrito"])){
        ?>
            <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Nombre producto</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Color</th>
                        <th scope="col">Precio</th>
                      </tr>
                    </thead>
                    <tbody>
        <?php
        foreach($_SESSION["carrito"] as $indice => $arreglo){
            settype($arreglo["Cantidad"],"double");
            settype($arreglo["Precio"],"double");
            settype($total,"double");
            $total += $arreglo["Cantidad"]*$arreglo["Precio"];
            
        ?>
            <tr>
                <th scope="row"><?php echo $arreglo["Cantidad"] ?></th>
                <td><?php echo $arreglo["Nombre producto"] ?></td>
                <td><?php echo $arreglo["Talla"] ?></td>
                <td><?php echo $arreglo["Color"] ?></td>
                <td><?php echo "$ ".$arreglo["Precio"] ?>
                <form action="carrito.php" method="POST">
                <button class="btn btn-danger" name="frmindice" value="<?php echo $indice?>" >Eliminar item</button>
                </form>
                </td>
            </tr>    
        <?php
        }
        ?>
                <tr>
                    <th colspan="4">Total</th>
                    <td><?php echo "$ ".$total ?></td>
                </tr>
            </tbody>
            </table>
            
            <?php  
                echo '<br><a class="btn btn-info" href="producto.php">Regresar</a> 
                <a class="btn btn-warning" href="carrito.php?vaciar=true">Vaciar carrito</a>
                <a class="btn btn-success" href="carrito.php?finalizar=true">Finalizar compra</a>';
        }else{
            echo '<p class="alert alert-info">"carrito vacio"</p>';
            //echo '<a href="producto.php"></a>';
        }
        ?>      
    </main>
    <?php
        if(isset($_GET["vaciar"])){
            session_destroy();
            header("location:carrito.php");
        }
        if(isset($_POST["frmindice"])){
            $id=$_POST["frmindice"];
            unset ($_SESSION["carrito"][$id]);
            header("location:carrito.php");
        }

        if(isset($_GET["finalizar"])){
    ?>
            <div class="contenedor  text-light">
                <form class="row g-4 " action="carrito.php" method="POST">
                    
                    <div class="col-4">
                        <label for="inputEmail" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="inputEmail" name="frmcorreo" placeholder="Correo registrado">
                    </div>
                    <div class="col-4">
                        <label for="inputUser" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="inputUser" name="frmnombre" placeholder="Ingrese su nombre completo">
                    </div>
                    
                    <div class="col-4">
                        <label for="inputTypeID" class="form-label">Tipo de documento</label>
                        <select type="text" class="form-control" name="frmtypeid" id="inputTypeID" >
                            <option disabled selected>---Seleccione tipo de documento---</option>    
                            <option value="Cedula Ciudadania">Cedula Ciudadania</option>    
                            <option value="Cedula extranjeria">Cedula extranjeria</option>    
                            <option value="Targeta de identidad">Targeta de identidad</option>    
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="inputDocument" class="form-label">Numero documento</label>
                        <input type="text" class="form-control" id="inputDocument" name="frmdocument" placeholder="Direccion de entrega">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="inputAddress" name="frmdir" placeholder="Direccion de entrega">
                    </div>
                    <div class="col-4">
                        <label for="inputTel" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="inputTel" name="frmtel" placeholder="Celular/Telefono">
                    </div>
                    <div class="col-md-3">
                        <label for="inputCity" class="form-label">Ciudad</label>
                        <select type="text" class="form-control" name="frmciudad" id="inputCity" >
                            <option disabled selected>---Selecciona una ciudad---</option>    
                            <option value="Bogotá D.C">Bogotá D.C</option>    
                            <option value="Medellín">Medellín</option>    
                            <option value="Cartagena">Cartagena</option>    
                            <option value="Manizales">Manizales</option>    
                            <option value="Tunja">Tunja</option>    
                            <option value="Huila">Huila</option>    
                            <option value="Pereira">Pereira</option>    
                            <option value="Bucaramanga">Bucaramanga</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success" name="frmcomprar" >Confirmar pedido</button>
                    </div>
                    </form>
                </div>
    <?php
    print_r($_SESSION["datuser"]);    
    }
    ?>
    <footer class="footer">
        <p class="footer__texto">Prestige Clothes.co - Todos los derechos Reservados 2022.</p>
    </footer>
</body>
</html>
<?php
    if(isset($_POST["frmcomprar"])){
        $correo=$_POST["frmcorreo"];
        $nomuser=$_POST["frmnombre"];
        $tdocument=$_POST["frmtypeid"];
        $ndocument=$_POST["frmdocument"];
        $direccion=$_POST["frmdir"];
        $tel=$_POST["frmtel"];
        $ciudad=$_POST["frmciudad"];

        $_SESSION["datuser"][$ndocument]["Correo"]=$correo;
        $_SESSION["datuser"][$ndocument]["Nombres"]=$nomuser;
        $_SESSION["datuser"][$ndocument]["Tipo Documento"]=$tdocument;
        $_SESSION["datuser"][$ndocument]["Direccion"]=$direccion;
        $_SESSION["datuser"][$ndocument]["Tel"]=$tel;
        $_SESSION["datuser"][$ndocument]["Ciudad"]=$ciudad;
        
    }
?>

