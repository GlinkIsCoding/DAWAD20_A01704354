<?php

function clear_entries(){
    if(isset($_POST["nombre"])){
        $_POST["nombre"] = htmlspecialchars($_POST["nombre"]);
    }
    if(isset($_POST["apellido"])){
        $_POST["apellido"] = htmlspecialchars($_POST["apellido"]);
    }
}

function validate_user(){
    if(isset($_POST["nombre"]) && isset($_POST["apellido"])){
        $nombres = array("Carlos", "Taylor");
        $apellidos = array("Mateos", "Swift");
        for($i = 0; $i<2;$i++){
            if($_POST["nombre"]== $nombres[$i] && $_POST["apellido"]== $apellidos[$i]){
                $_SESSION["nombre"] = $_POST["nombre"];
                return true;
            }
        }
        return false;
    }
    else{
        return false;
    }
}

function welcome($validation){
    if ($validation== true){
        return "Bienvenid@ ". $_SESSION["nombre"];
    }
    else
        return "Ingresa un usuario válido";
}




?>