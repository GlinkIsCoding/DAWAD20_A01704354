<?php

function clear_entries(){
    if(isset($_POST["artista"])){
        $_POST["artista"] = htmlspecialchars($_POST["artista"]);
    }
    if(isset($_POST["album"])){
        $_POST["album"] = htmlspecialchars($_POST["album"]);
    }
    if(isset($_POST["email"])){
        $_POST["email"] = htmlspecialchars($_POST["email"]);
    }
    if(isset($_POST["celular"])){
        $_POST["celular"] = htmlspecialchars($_POST["celular"]);
    }
}

function validate_artist(){
    if(isset($_POST["artista"])){
        $artistas = array("troye sivan", "taylor swift", "ariana grande");
        $artistalow = strtolower($_POST["artista"]);
        for($i = 0; $i<3;$i++){
            if($artistalow==$artistas[$i]){
                return true;
            }
        }
        return false;
    }
    else{
        return false;
    }
}

function validate_album(){
    if(isset($_POST["album"])){
        $albumes = array("blue neighborhood", "bloom", "folklore", "lover", "sweetener", "my everything");
        $albumlow = strtolower($_POST["album"]);
        for($i = 0; $i<6;$i++){
            if($albumlow==$albumes[$i]){
                return true;
            }
        }
        return false;
    }
    else{
        return false;
    }
    
}

function validate_email(){
    if(isset($_POST["email"])){
        if($_POST["email"]==""){return false;}
        else{return true;}
    }
    else{
        return false;
    }
    
}

function validate_cellphone(){
    if(isset($_POST["celular"])){
        if($_POST["celular"]==""){return false;}
        else{return true;}
    }
    else{
        return false;
    }
}


function elegir_artista($seleccionado){
    $artista = "troye";
    $resultado = "";
    if($seleccionado == $artista){
            $resultado = "El artista es $artista";
        }
        else{
            $resultado ="No es $seleccionado.<br>";
        }
    return $resultado;
}

function enviar_artista(){
     $informacion = "";
    if(isset($_POST["artista"])){
        $informacion = elegir_artista($_POST["artista"]);
    }
    else{
        $informacion = "Ningun artista seteado";
    }
    return $informacion;
}

function despliega_info($art, $alb, $email, $cel){
    $arianagrande = "Intérprete de thank u, next, sweetener y stuck with u";
    $taylorswift = "Cantautora de folklore, álbum escrito, producido y lanzado durante la pandemia.";
    $troyesivan = "Cantante australiano, intérprete de Bloom, Easy y Suburbia";
    $sweetener = "4to album de ariana";
    $myeverything = "2do album de ariana";
    $blueneighborhood = "album debut de troye";
    $bloom = "segundo album de troye";
    $folklore = "album mas reciente de taylor";
    $lover = "album que contiene lover, cornelia street, etc.";
    $infoartista;
    $infoalbum;
    if(isset($_POST["artista"])&&isset($_POST["album"])){
        $nombre = $_POST["artista"];
        $nombrealbum = $_POST["album"];
        
        if($nombre == "ariana grande"){
            $infoartista = $arianagrande;
        }
        elseif($nombre == "troye sivan"){
            $infoartista = $troyesivan;
        }
        elseif($nombre == "taylor swift"){
            $infoartista = $taylorswift;
        }
    
        if($nombrealbum == "blue neighborhood"){
            $infoalbum = $blueneighborhood;
        }   
    }
    
    
    if($art==true && $alb == true && $email == true && $cel == true){
        $tabla = "<table><thead><tr><th>$nombre</th><th>$nombrealbum</th></tr></thead>";
        $tabla .= "<tr><td>$infoartista</td><td>$infoalbum</td></tr>";
        $tabla .="</table>";
        return $tabla;
    }
}


function funcionextra($input){
        $tabla = "<table>";
    
        $tabla .= "<thead>";
        $tabla .= "<tr>";
        $tabla .= "<th>Número</th><th>¿Es divisible entre 10?</th><th>¿Es divisible entre 9?</th><th>¿Es divisible entre 8?</th>";
        $tabla .= "</tr>";
        $tabla .= "</thead>";
        $size = count($input);
        for($i = 0; $i<$size;$i++){
       $tabla .= "<tr>";
        $tabla .= "<td> $input[$i] </td>";
        if ($input[$i] % 10 == 0){
            $tabla .= "<td>SÍ</td>";
        }
        else{
            $tabla .= "<td>NO</td>";
        }
        if ($input[$i] % 9 == 0){
            $tabla .= "<td>SÍ</td>";
        }
        else{
            $tabla .= "<td>NO</td>";
        }
        if ($input[$i] % 8 == 0){
            $tabla .= "<td>SÍ</td>";
        }
        else{
            $tabla .= "<td>NO</td>";
        }
                
        $tabla.= "</tr>";
    }
    $tabla .= "</table>";
        return $tabla;
}
?>