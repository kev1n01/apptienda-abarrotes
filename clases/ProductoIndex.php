<?php
namespace clases;
use config\ConexionDB;
include_once "config/autoload.php";

class ProductoIndex{

    public function mostrar(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
//            $query = "SELECT id_producto , tipo, descripcion, precio_producto,img FROM tipoproducto AS tp JOIN productos as p
//            ON tp.id_Tproducto=p.id_tipo_productos LIMIT 12";
            $query = "	SELECT id_producto,tipo,descripcion,precio_producto,img,descuento,estado,
            ROUND(precio_producto-(precio_producto*(descuento/100))) from productos as pro
            join tipoproducto as tp on pro.id_tipo_productos=tp.id_Tproducto
            where pro.estado='new';
            ";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }
}