<?php

class Conexion{
    
    public static function conectar(){

        $nombreServidor = "localhost";//este es por lo q es un servidor local
        $baseDatos = "adso";
        $usuario = "root";
        $password = "";
//este es el intento de conexion especifico con el PDO de la base de datos
        try {
            $objConexion = new PDO('mysql:host='.$nombreServidor.';dbname='.$baseDatos.';',$usuario,$password);
            $objConexion->exec("set names utf8");
        } catch (Exception $e) {
            $objConexion = $e;
        }

        return $objConexion;
    }
}