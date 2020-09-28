<?php


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


?>