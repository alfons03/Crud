<?php

include_once "conexion.php";

class usuarioModelo{

    public static function mdlRegistrarUsuario($nombre, $apellido,$direccion,$documento,$email,$telefono,$sexo){
  
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(nombre,apellido,direccion,documento,email,telefono,sexo) VALUES (:nombre,:apellido,:direccion,:documento,:email,:telefono,:sexo)");
            $objRespuesta->bindParam(':nombre',$nombre);
            $objRespuesta->bindParam(':apellido',$apellido);
            $objRespuesta->bindParam(':direccion',$direccion);
            $objRespuesta->bindParam(':documento',$documento);
            $objRespuesta->bindParam(':email',$email);
            $objRespuesta->bindParam(':telefono',$telefono);
            $objRespuesta->bindParam(':sexo',$sexo);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Usuario registrado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al registrar el usuario");
            }

        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        
        return $mensaje;
    }

    public static function mdlListarUsuarios(){

        $listarUsuarios = null;
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario");
            $objRespuesta->execute();
            $listarUsuarios = $objRespuesta->fetchAll();
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarUsuarios = $e->getMessage();
        }

        return $listarUsuarios;
    }


    public static function mdlEditarUsuario($id,$nombre,$apellido,$direccion,$documento,$email,$telefono,$sexo){
  
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE usuario SET nombre=:nombre, apellido=:apellido, direccion=:direccion, documento=:documento, email=:email, telefono=:telefono, sexo=:sexo WHERE idusuario=:idusuario");
            $objRespuesta->bindParam(':nombre',$nombre);
            $objRespuesta->bindParam(':apellido',$apellido);
            $objRespuesta->bindParam(':direccion',$direccion);
            $objRespuesta->bindParam(':documento',$documento);
            $objRespuesta->bindParam(':email',$email);
            $objRespuesta->bindParam(':telefono',$telefono);
            $objRespuesta->bindParam(':sexo',$sexo);
            $objRespuesta->bindParam(':idusuario',$id);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Usuario editado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al editar el usuario");
            }

        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        
        return $mensaje;
    }

    public static function mdlEliminarUsuario($id){

        $eliminarUsuario = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM usuario WHERE idusuario = :idusuario");
            $objRespuesta->bindParam(':idusuario',$id);

            if ($objRespuesta->execute()) {
                $eliminarUsuario = array("codigo" => "200", "mensaje" => "Usuario eliminado correctamente");
            } else {
                $eliminarUsuario = array("codigo" => "425", "mensaje" => "Error al eliminar el usuario");
            }
        } catch (Exception $e) {
            $eliminarUsuario = array("codigo" => "425", "mensaje" => $e->getMessage());
        }

        return $eliminarUsuario;
    }
}

