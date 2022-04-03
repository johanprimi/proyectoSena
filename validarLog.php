<?php
require ("conexion.php");
$correo=$_POST['email'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$correo;

$query="SELECT*FROM usuario where Email_usuario='$correo' and clave_usuario='$contraseña'";
$resultado=mysqli_query($db,$query);

$rows=mysqli_fetch_array($resultado);

if(isset($rows)){
if($rows['Id_rol']==1){
    header("location:./AdministradorContenido/index.php");
    ?>
   <h1>Autenticacion Exitosa</h1>
   <?php
}else
if($rows['Id_rol']==2){
    header("location:./index.php");
    ?>
   <h1>Autenticacion Exitosa</h1>
   <?php
}}else{
include("login.php");
    ?>
    <h1>Error de Autenticacion</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($db);






?>