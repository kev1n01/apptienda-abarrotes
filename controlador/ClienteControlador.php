<?php
namespace controlador;
use clases\Cliente;
use config\ConexionDB;
include_once "../config/autoload.php";

class ClienteControlador
{
    public function mostrar(){
        $cliente =  new Cliente();
        return $cliente->mostrar();
    }

    public function mostrarIdUser(string $user, string $pass)
    {
        $cliente = new Cliente();
        $resultado = $cliente->mostrarIdUser($user,$pass);
        $row = $resultado->fetchAll();
		foreach($row as $rows){
            $idCliente=$rows[0];
        }
        return $idCliente;
        
    }

    public function mostrarUser($ID)
    {
        $cliente = new Cliente();
        $resultado = $cliente->mostrarU($ID);
        return $resultado;
        
    }


    public function registrarControl($user,$pass,$nombre,$apellido,$dni,$direccion,$celular){
        $clienteregis = new Cliente;
        return  $clienteregis->registrar($user,$pass,$nombre,$apellido,$dni,$direccion,$celular);
    }
    


    public function actualizar($id,$user,$pass,$nombre,$apellido,$dni,$direccion,$celular) {
        $clienteupdate = new Cliente();
        return $clienteupdate->actualizar($id,$user,$pass,$nombre,$apellido,$dni,$direccion,$celular);      
    }
    
    
    public function eliminar(int $id){
        $clientedelete = new Cliente();
        $clientedelete->setId($id);
         $clientedelete->eliminar();
        // if ($clientedelete->eliminar()>=1){
        //     $resultado = "El cliente fue elmininado";
        // }else{
        //     $resultado = "El cliente no fue eliminado";
        // }
        // return $resultado;
        
    }
    
    
}

