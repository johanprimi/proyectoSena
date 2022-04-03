<?php
include("conexion.php");

$nombre=$_POST['names'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['inputaddress'];
$pass=$_POST['contraseña'];
$pass2=$_POST['confirmar_contraseña'];

$consulta="INSERT INTO `usuario` (`Id_rol`, `Nombre_usuario`, `Clave_usuario`, `Email_usuario`, `Teléfono_usuario`, `Dirección_usuario`) VALUES ('2', '$nombre', '$pass', '$email', '$telefono', '$direccion');";

if($pass==$pass2){
    $resultado=mysqli_query($db,$consulta) or die('Error de registro');
    include("registro.php");
    ?>
    <h1>Registro exitoso, !ahora puedes iniciar sesion¡</h1>
    <?php
    mysqli_close($db);
}else{
    include("registro.php");
    ?>
    <h1>Error de registro, la contraseña no coincide</h1>
    <?php
}

?>