<?php
namespace controlador;
use clases\Cliente;
use config\ConexionDB;
include_once "../config/autoload.php";

class LoginControlador
{
    public function logincontrol(string $user,string $pass,string $rol){
        $cliente = new Cliente();    
        $datos = $cliente->login($user,$pass,$rol);  

        $row = $datos->fetchAll();
		foreach($row as $rows){
            $id=$rows[0];
            $rolbd=$rows[3];
        }

        if($row!= null){
            $passbd = null;
            foreach ($row as $userbd){
                $passbd = $userbd["password"];
                $rolbd = $userbd["rol"];
            }

            if ($rolbd == "usuario" ) {
                 if($pass==$passbd){
                
                    $_SESSION["usuario"] = $user;
                    $_SESSION["password"] = $pass;               
                    return "<script>alert('Tienda Brave te da la bienvenida $user ¡¡')</script>;
                    <script>window.open('../index.php?ID=$id','_self',null,true)</script>";
                }
            }else{
                if ($rolbd == "admin" ) {
                $_SESSION['admin'] = $user;
				return "<script>alert('Bienvenido admin¡¡')</script>;
				<script>window.open('../vistas/adminview.php','_self',null,true)</script>";
                }
            }
        }else{
            return "<script>alert('Usuario/contraseña incorrecto');
            window.open('login.php?rol=usuario','_self',null,true);</script>";
        }
    }
}