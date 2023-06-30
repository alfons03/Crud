<?php

include_once "../modelos/usuarioModelo.php";

class usuarioControl{

    public $nombre;
    public $apellido;
    public $direccion;  
    public $documento;  
    public $email;  
    public $telefono;
    public $sexo;
    public $id;
    
    public function ctrRegistrarUsuario(){
        $objRespuesta = usuarioModelo::mdlRegistrarUsuario($this->nombre,$this->apellido,$this->direccion,$this->documento,$this->email,$this->telefono,$this->sexo);
        echo json_encode($objRespuesta);
    }

    public function ctrListarUsuarios(){
        $objRespuesta = usuarioModelo::mdlListarUsuarios();
        echo json_encode($objRespuesta);
    }

    public function ctrEditarUsuario(){
        $objRespuesta = usuarioModelo::mdlEditarUsuario($this->id,$this->nombre,$this->apellido,$this->direccion,$this->documento,$this->email,$this->telefono,$this->sexo);
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarUsuario(){
        $objRespuesta = usuarioModelo::mdlEliminarUsuario($this->id);
        echo json_encode($objRespuesta);
    }
}

//verificar si llegaron por post los datos del usuario para crear el registro
if (isset($_POST['regNombre'],$_POST['regApellido'],$_POST['regDocumento'],$_POST['regEmail'],$_POST['regTelefono'],$_POST['regSexo'])){
    
    $objUsuario = new usuarioControl();
    $objUsuario->nombre = $_POST['regNombre'];
    $objUsuario->apellido = $_POST['regApellido'];
    $objUsuario->direccion = $_POST['regDireccion'];
    $objUsuario->documento = $_POST['regDocumento'];
    $objUsuario->email = $_POST['regEmail'];
    $objUsuario->telefono = $_POST['regTelefono'];
    $objUsuario->sexo = $_POST['regSexo'];

    $objUsuario->ctrRegistrarUsuario();
}

//verificar si se realizo peticion para listar usuarios
if (isset($_POST['listarUsuarios']) == 'ok') {
    $objUsuario = new usuarioControl();
    $objUsuario->ctrListarUsuarios();
}

//editar usuarios
if (isset($_POST['regEditNombre'],$_POST['regEditApellido'],$_POST['regEditDocumento'],$_POST['regEditEmail'],$_POST['regEditTelefono'],$_POST['regEditSexo'],$_POST['idUsuario'])){
    
    $objUsuario = new usuarioControl();
    $objUsuario->nombre = $_POST['regEditNombre'];
    $objUsuario->apellido = $_POST['regEditApellido'];
    $objUsuario->direccion = $_POST['regEditDireccion'];
    $objUsuario->documento = $_POST['regEditDocumento'];
    $objUsuario->email = $_POST['regEditEmail'];
    $objUsuario->telefono = $_POST['regEditTelefono'];
    $objUsuario->sexo = $_POST['regEditSexo'];
    $objUsuario->id = $_POST['idUsuario'];

    $objUsuario->ctrEditarUsuario();
}

if (isset($_POST['EliminarUsuarios'])) {
    $objUsuario = new usuarioControl();
    $objUsuario->id = $_POST['EliminarUsuarios'];
    $objUsuario->ctrEliminarUsuario();
}