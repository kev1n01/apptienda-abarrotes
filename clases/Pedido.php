<?php
namespace clases;
use config\ConexionDB; 
include_once "../config/autoload.php";

class Pedido
{
    private $id;

    public function setId(int $id)
    {
        $this->id = $id;
    }  

    public function getId()
    {
        return $this->id;
    }  

    public function mostrar(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "SELECT pe.id_pedido, pe.idcliente_clientes, tp.tipo,p.descripcion,pe.cantidad_producto, pe.precio_total,pe.fecha_pedido FROM tipoproducto as tp
            join productos as p on tp.id_Tproducto=p.id_tipo_productos join pedido as pe on  p.id_producto=pe.idproducto_productos join
            clientes as c on pe.idcliente_clientes=c.id_cliente;";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }
    public function mostrarPedidoU(int $id){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = " SELECT p.id_pedido,tp.tipo,pro.descripcion, pro.precio_producto,p.fecha_pedido FROM productos as pro join pedido as p on pro.id_producto=p.idproducto_productos join
            tipoproducto as tp on pro.id_tipo_productos=tp.id_Tproducto
            WHERE p.idcliente_clientes=$id order by p.id_pedido";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }
    
    public function eliminar(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sqldelete = "DELETE FROM pedido WHERE id_pedido = $this->id";
            $eliminado = $conexion->exec($sqldelete);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $eliminado;
    }
    public function eliminarPedidoCliente(int $id){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sqldelete = "DELETE FROM pedido WHERE id_pedido = $id";
            $eliminado = $conexion->exec($sqldelete);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $eliminado;
    }
   
    public function guardar(int $idcli, int $idproduct,string $fecha,int $cantidad, float $precioT){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sql = "INSERT INTO `pedido`(`idcliente_clientes`, `idproducto_productos`,`fecha_pedido`, `cantidad_producto`, `precio_total`) 
			                VALUES ('$idcli','$idproduct','$fecha','$cantidad','$precioT'";
            $guardado = $conexion->exec($sql);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $guardado;
    }


    
}