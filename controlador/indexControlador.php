<?php
namespace controlador;
use clases\ProductoIndex;

include_once "config/autoload.php";


class indexControlador{
    public function mostrar(){
        $producto =  new ProductoIndex();
        return $producto->mostrar();
    }
}
