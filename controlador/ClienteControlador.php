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


    public function registrarControl(string $usuario,string $pass,string $nombres,string $apellidos,int $dni,string $direccion,int $celular){
        $clienteregis = new Cliente();
        $res =  $clienteregis->registrar($usuario,$pass,$nombres,$apellidos,$dni,$direccion,$celular);
        if($res!=0){
            return $res = "save";
        }
    }
    


    public function actualizar(int $id) {
        $clienteupdate = new Cliente();
        
        return $clienteupdate->actualizar($id);      
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

