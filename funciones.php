<?php

function obtenerarticulos(): array {
    try {
        
        //conexion//
        require 'C:/xampp/htdocs/proyectoSena/AdministradorContenido/config/conexion.php';
        //sql//
        $sql= "SELECT * FROM articulo;";

        $consulta= mysqli_query($db, $sql);

        //arereglo vacio

        $articulo=[];

        $i=0;

        //resultados//
        
        while ($row = mysqli_fetch_assoc($consulta)){
        $articulo[$i] ['Id_articulo']= $row['Id_articulo'] ;
        $articulo[$i] ['Id_proveedor']= $row['Id_proveedor'];
        $articulo[$i] ['id_tipo']= $row['id_tipo'];
        $articulo[$i] ['Detalle_articulo']= $row['Detalle_articulo'];
        $articulo[$i] ['Talla_articulo']= $row['Talla_articulo'];
        $articulo[$i] ['Color_articulo']= $row['Color_articulo'];
        $articulo[$i] ['Precio_articulo']= $row['Precio_articulo'];
        $articulo[$i] ['Nombre_producto']= $row['Nombre_producto'];
        $articulo[$i] ['stock_minimo']= $row['stock_minimo'];
        $articulo[$i] ['existencias']= $row['existencias'];

        $i++;
    }

        return $articulo;
        

    } catch (\Throwable $th) {
        //throw $th;
        var_dump($th);
    }
}

//obtenerarticulos();




?>