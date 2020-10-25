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

function insertarIncidente($lugarid, $tipoid){
    $conn = connectDb();
    $sql = "INSERT INTO `incidentepark` (`horafecha`, `idlugar`, `idtipo`) VALUES (current_timestamp(), '".$lugarid."', '".$tipoid."');";
    
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


function delete_id($id){
    $conn = connectDb();
    $sql = "DELETE FROM `albumes` WHERE `albumes`.`id` = ".$id;
    $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}


function update_id($id, $unidades, $precio){
    $conn = connectDb();
    $sql = "UPDATE `albumes` SET `unidades` = '".$unidades."', `precio` = '".$precio."' WHERE `albumes`.`id` = ".$id;
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

function select($name, $tabla, $id='id', $nombre = 'nombre'){
    $resultado = '<select id="'.$name.'"  name="'.$name.'" class="browser-default">';
    $resultado .= '<option value="" disabled selected>Selecciona un '.$name.'</option>';
    $conn = connectDb();
    
    $sql = 'SELECT '.$id.', '.$nombre.' FROM '.$tabla.' ORDER BY '.$nombre.' ASC';
    $result = mysqli_query($conn,$sql);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        
        $resultado .= '<option value="'.$row[$id].'">'.$row[$nombre].'</option>';
    }
    
    mysqli_free_result($result); //Liberar la memoria
    
    $resultado .= '</select><label>'.$name.'</label>';
    
    closeDb($conn);
    return $resultado;
}

function get($tabla, $horafecha= 'horafecha'){
    $conn = connectDb();
    $sql = "SELECT I.".$horafecha.", L.nombre AS nombrelugar, T.nombre AS nombretipo
    FROM ". $tabla." I, lugarpark L, tipopark T
    WHERE I.idlugar = L.id AND T.id = I.idtipo
    ORDER BY ".$horafecha." DESC";
    $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}



?>