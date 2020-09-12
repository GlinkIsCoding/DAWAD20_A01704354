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



function despliega_info($art, $alb, $email, $cel){
    $arianagrande = "Intérprete de thank u, next, sweetener y stuck with u";
    $taylorswift = "Cantautora de folklore, álbum escrito, producido y lanzado durante la pandemia.";
    $troyesivan = "Cantante australiano, intérprete de Bloom, Easy y Suburbia";
    $sweetener = "Cuarto álbum de Ariana Grande";
    $myeverything = "Segundo álbum de Ariana Grande";
    $blueneighborhood = "Álbum debut de Troye Sivan";
    $bloom = "Segundo álbum de Troye Sivan";
    $folklore = "Álbum más reciente de Taylor Swift";
    $lover = "Álbum que contiene Lover, Cornelia Street, y False God";
    $infoartista;
    $infoalbum;
    if(isset($_POST["artista"])&&isset($_POST["album"])){
        $nombre = strtolower($_POST["artista"]);
        $nombrealbum = strtolower($_POST["album"]);
        
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
        elseif($nombrealbum == "my everything"){
            $infoalbum = $myeverything;
        }
        elseif($nombrealbum == "lover"){
            $infoalbum = $lover;
        }
        elseif($nombrealbum == "folklore"){
            $infoalbum = $folklore;
        }
        elseif($nombrealbum == "bloom"){
            $infoalbum = $bloom;
        }
        elseif($nombrealbum == "sweetener"){
            $infoalbum = $sweetener;
        }
    }
    
    
    if($art==true && $alb == true && $email == true && $cel == true){
        $tabla = "<table><thead><tr><th>$nombre</th><th>$nombrealbum</th></tr></thead>";
        $tabla .= "<tr><td>$infoartista</td><td>$infoalbum</td></tr>";
        $tabla .="</table>";
        return $tabla;
    }
    else if($art==false){
        return "Introduce un nombre válido de los artistas de la lista.";
    }
    else if($alb==false){
        return "Introduce un nombre válido de los álbumes de la lista.";
    }
    else if($email==false){
        return "Introduce una dirección de e-mail válida.";
    }
    else if($cel==false){
        return "Introduce un número de celular válido.";
    }
}


?>