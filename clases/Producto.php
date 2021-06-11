<?php
namespace clases;
use config\ConexionDB; 
include_once "../config/autoload.php";

class Producto{

    private $idtp;
    private $id;
    private $descripcion;
    private $precio;

    public function setId(int $id)
    {
        $this->id = $id;
    }  

    public function getId()
    {
        return $this->id;
    }  
    
    public function setIdTP(int $idtp)
    {
        $this->idtp =$idtp;
    } 
    
    public function getIdTP()
    {
        return $this->idtp;
    } 
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion =$descripcion;
    } 
    
    public function getDescripcion()
    {
        return $this->descripcion;
    } 
    public function setPrecio(int $precio)
    {
        $this->precio =$precio;
    } 
    
    public function getPrecio()
    {
        return $this->precio;
    } 
    

    public function mostrarMasVendido(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "	SELECT id_producto,tipo,descripcion,precio_producto,img,descuento,estado,
            precio_producto-(precio_producto*(descuento/100)) from productos as pro
            join tipoproducto as tp on pro.id_tipo_productos=tp.id_Tproducto;
        ";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }

    public function mostrar(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "SELECT id_producto , tipo, descripcion, precio_producto,img FROM tipoproducto AS tp JOIN productos as p
            ON tp.id_Tproducto=p.id_tipo_productos LIMIT 12";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }

    public function mostrarTodo(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "	SELECT id_producto,tipo,descripcion,precio_producto,img,descuento,estado,
            precio_producto-(precio_producto*(descuento/100)) from productos as pro
            join tipoproducto as tp on pro.id_tipo_productos=tp.id_Tproducto;
        ";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }



    public function agregar(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "INSERT INTO  productos(id_tipo_productos,descripcion,precio_producto) VALUES($this->idtp,'$this->descripcion',$this->precio) ";
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
            $sqldelete = "DELETE FROM productos WHERE id_producto = $this->id";
            $eliminado = $conexion->exec($sqldelete);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $eliminado;
    }

    public function actualizar(int $id){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sqldelete = "UPDATE productos SET id_tipo_productos = $this->idtp,descripcion = '$this->descripcion',precio = $this->precio
            WHERE id_producto = $id";
            $eliminado = $conexion->exec($sqldelete);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $eliminado;
    }

}