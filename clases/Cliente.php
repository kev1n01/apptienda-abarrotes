<?php
namespace clases;
use config\ConexionDB;
include_once "../config/autoload.php";
include_once "../config/ConexionDB.php";

class Cliente
{
    private $id;
    private $nombres;
    private $apellidos;
    private $dni;
    private $direccion;
    private $celular;
    private $usuario;
    private $pass;
    private $rol;


    public function setUser(string $usuario)
    {
        $this->usuario = $usuario;
    }  
    public function getUser()
    {
        return $this->usuario;
    }  

    public function setPass(string $pass)
    {
        $this->pass = $pass;
    }  

    public function getPass()
    {
        return $this->pass;
    }  
    public function setRol(string $rol)
    {
        $this->rol = $rol;
    }  

    public function getRol()
    {
        return $this->rol;
    }  
    
    public function setId(int $id)
    {
        $this->id = $id;
    }  

    public function getId()
    {
        return $this->id;
    }  

    public function setNombre(string $nombres)
    {
        $this->nombres = $nombres;
    }  
    
    public function getNombre()
    {
        return $this->nombres;
    }  

    public function setApellido(string $apellidos)
    {
        $this->apellidos = $apellidos;
    }  
    
    public function getApellido()
    {
        return $this->apellidos;
    }  
    public function setDni(int $dni)
    {
        $this->dni = $dni;
    }  
    
    public function getDni()
    {
        return $this->dni;
    }  
    public function setDireccion(string $direccion)
    {
        $this->direccion = $direccion;
    }  
    
    public function getDireccion()
    {
        return $this->direccion;
    }  
    public function setCelular(int $celular)
    {
        $this->celular = $celular;
    }  
    
    public function getCelular()
    {
        return $this->celular;
    }  
    
    public function mostrar(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "SELECT * FROM clientes";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }

    public function mostrarIdUser(string $user, string $pass){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "SELECT * FROM `clientes` WHERE `usuario` = '".$user."' and `password` = '".$pass."' and `rol` = 'usuario'";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }
    
    public function mostrarU(){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "SELECT * FROM clientes where id_cliente=1";
            $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }
    


    public function registrar(string $usuario,string $pass,string $nombres,string $apellidos,int $dni,string $direccion,int $celular){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sqlinsert = "INSERT INTO clientes(usuario,password,rol,nombres, apellidos, dni, direccion, celular)
                             VALUES ('$usuario','$pass','usuario','$nombres','$apellidos',$dni,'$direccion',$celular)";
            $insertado = $conexion->exec($sqlinsert);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $insertado;
    }

    public function actualizar(int $id){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sqlupdate = "UPDATE clientes SET usuario = '$this->usuario',password = '$this->pass',nombres = '$this->nombres',apellidos = '$this->apellidos',
            dni = '$this->dni', direccion = '$this->direccion',num_celular = '$this->celular' WHERE id_cliente= $id";
            $actualizado = $conexion->query($sqlupdate);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $actualizado;
    }
    
    public function eliminar(){
            try {
                $objConexion = new ConexionDB();
                $conexion = $objConexion->abrir();
                $sqldelete = "DELETE FROM clientes WHERE id_cliente = $this->id";
                $eliminado = $conexion->exec($sqldelete);
                $objConexion->cerrar();   
            } catch (\PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit();
            }
            return $eliminado;
    }


    public function login(string $user,string $pass,string $rol){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $sqlverifico = "SELECT * FROM clientes WHERE usuario='$user' and  password='$pass' and  rol='$rol'";
            $verifico = $conexion->query($sqlverifico);
            $objConexion->cerrar();   
        } catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $verifico;
    }

}