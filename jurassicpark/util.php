<?php

function clear_entries(){
    if(isset($_POST["id"])){
        $_POST["id"] = htmlspecialchars($_POST["id"]);
    }
    if(isset($_POST["nombre"])){
        $_POST["nombre"] = htmlspecialchars($_POST["nombre"]);
    }
    if(isset($_POST["artista"])){
        $_POST["artista"] = htmlspecialchars($_POST["artista"]);
    }
    if(isset($_POST["unidades"])){
        $_POST["unidades"] = htmlspecialchars($_POST["unidades"]);
    }
    if(isset($_POST["precio"])){
        $_POST["precio"] = htmlspecialchars($_POST["precio"]);
    }
    if(isset($_POST["idioma"])){
        $_POST["idioma"] = htmlspecialchars($_POST["idioma"]);
    }
}



function despliegaInfo($result){
    $tabla = "<table>";
    $tabla .= "<thead><tr><th>Fecha</th><th>Lugar del Incidente</th><th>Tipo de Incidente</th></tr></thead>";
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tabla .= "<tr>";
        $tabla .= "<td>" . $row["horafecha"] . "</td>";
        $tabla .= "<td>" . $row["nombrelugar"] . "</td>";
        $tabla .= "<td>" . $row["nombretipo"] . "</td>";
        $tabla .= "</tr>";
        }
    $tabla .= "</table>";
    return $tabla;
    }
}

function insertincidente(){
    $lugarid = $_POST["lugarid"];
    $tipoid = $_POST["tipoid"];
    
    if(is_numeric($lugarid) && is_numeric($tipoid)){
        if(insertarIncidente($lugarid, $tipoid)){
            }else{   
        }
        }else{
        }
    
}

function insert_album(){
    $nombre = $_POST["nombre"];
    $artista = $_POST["artista"];
    $unidades = $_POST["unidades"];
    $precio = $_POST["precio"];
    $idioma = $_POST["idioma"];
    
    if(strlen($nombre)>0 && strlen($artista)>0 && strlen($precio)>0 && strlen($idioma)>0){
        if(is_numeric($unidades)){
            if(insertarAlbum($nombre,$artista,$unidades,$precio,$idioma)){
            }else{
                
            }
        }else{
        }
    }
}



function remove_album(){
    $id = $_POST["id"];
    if(delete_id($id)){
        echo "El registro ya no está en la base de datos";
    }else{
        
    }
}



function update_album(){
    $id = $_POST["id"];
    $unidades = $_POST["unidades"];
    $precio = $_POST["precio"];
    if(strlen($precio)>0){
        if(is_numeric($unidades) && is_numeric($id)){
            if(update_id($id, $unidades,$precio)){
                echo "Record updated successfully";
            }else{
                
            }
        }
    }
}





?>