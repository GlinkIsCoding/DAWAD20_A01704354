<?php

function clear_entries(){
    if(isset($_GET["artista"])){
        $_GET["artista"] = htmlspecialchars($_GET["artista"]);
}
    if(isset($_POST["artista"])){
        $_POST["artista"] = htmlspecialchars($_POST["artista"]);
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
    if(isset($_GET["artista"])){
        $informacion = elegir_artista($_GET["artista"]);
    }
    else if(isset($_POST["artista"])){
        $informacion = elegir_artista($_POST["artista"]);
    }
    else{
        $informacion = "Ningun artista seteado";
    }
    return $informacion;
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