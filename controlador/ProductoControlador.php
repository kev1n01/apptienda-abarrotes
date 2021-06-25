<?php
namespace controlador;
use clases\Producto;
include_once "../config/autoload.php";


class ProductoControlador
{
    public function mostrarMasVendido(){
        $producto =  new Producto();
        return $producto->mostrarMasVendido();

    }

    public function mostrar(){
        $producto =  new Producto();
        return $producto->mostrar();
    }
    public function mostrarTodo(){
        $producto =  new Producto();
        return $producto->mostrarTodo();
    }

    public function agregar($idtipo,$descripcion,$precio,$img,$descuento,$estado){
        $cproducto = new Producto;
        return $cproducto->agregar($idtipo,$descripcion,$precio,$img,$descuento,$estado);
        
    }

    public function actualizar($ProductID,$idtipo,$descripcion,$precio,$img,$descuento,$estado){
        $cproducto = new Producto;
       return $cproducto->actualizar($ProductID,$idtipo,$descripcion,$precio,$img,$descuento,$estado);
    }
    

    public function eliminar(int $id){
        $producto = new Producto;
        $producto->setId($id);
        $producto->eliminar();
    }

}