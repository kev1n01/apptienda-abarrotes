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

    public function agregar(int $idtp,string $descripcion,int $precio){
        $cproducto = new Producto;
        $cproducto->setIdTP($idtp);
        $cproducto->setDescripcion($descripcion);
        $cproducto->setPrecio($precio);
        $cproducto->agregar();
    
    }

    public function actualizar(int $id, int $idtp,string $descripcion,int $precio){
        $cproducto = new Producto;
        $cproducto->setIdTP($idtp);
        $cproducto->setDescripcion($descripcion);
        $cproducto->setPrecio($precio);
        $cproducto->actualizar($id);
    
    }
    

    public function eliminar(int $id){
        $producto = new Producto;
        $producto->setId($id);
        $producto->eliminar();
    }

}