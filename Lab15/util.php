<?php

function clear_entries(){
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


function connectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "discos";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function closeDb($mysql){
    mysqli_close($mysql);
}

function getAlbumes(){
    $conn = connectDb();
    $sql = "SELECT id, nombre, artista, unidades, precio, idioma FROM albumes";
    $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}

function getAlbumesbyArtist($nombreartista){
    $conn = connectDb();
    $sql = "SELECT id, nombre, artista, unidades, precio, idioma FROM albumes WHERE artista LIKE '%".$nombreartista."%'";
    $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}

function getCheapAlbumes($cheapprice){
    $conn = connectDb();
    $sql = "SELECT id, nombre, artista, unidades, precio, idioma FROM albumes WHERE precio <= '".$cheapprice."'";
    $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}

function despliegaInfo($result){
    $tabla = "<table>";
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tabla .= "<tr>";
        $tabla .= "<td>" . $row["id"] . "</td>";
        $tabla .= "<td>" . $row["nombre"] . "</td>";
        $tabla .= "<td>" . $row["artista"] . "</td>";
        $tabla .= "<td>" . $row["unidades"] . "</td>";
        $tabla .= "<td>" ."$". $row["precio"] . "</td>";
        $tabla .= "<td>" . $row["idioma"] . "</td>";
        $tabla .= "</tr>";
        }
    $tabla .= "</table>";
    return $tabla;
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

function insertarAlbum($nombre, $artista, $unidades, $precio, $idioma){
    $conn = connectDb();
    $sql = "INSERT INTO `albumes` (`id`, `nombre`, `artista`, `unidades`, `precio`, `idioma`) VALUES (NULL, '".$nombre."', '".$artista."', '".$unidades."', '".$precio."', '".$idioma."')";
    
    if(mysqli_query($conn, $sql)){
        echo "New record created successfully";
        closeDb($conn);
        unset($_POST);
        return true;
    }else{
        echo "Error: ". $sql."<br>".mysqli_error($conn);
        closeDb($conn);
        unset($_POST);
        return false;
    }
    closeDb($conn);
}

function remove_album(){
    $id = $_POST["id"];
    if(delete_id($id)){
        echo "Record deleted successfully";
    }else{
        
    }
}

function delete_id($id){
    $conn = connectDb();
    $sql = "DELETE FROM `albumes` WHERE `albumes`.`id` = ".$id;
    $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}


?>