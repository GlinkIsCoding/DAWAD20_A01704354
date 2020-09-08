<?php

function promedio($array){
    $size = count($array);
    $listanums = "<ul>";
    $suma = 0;
    $listanums .= "<h5>Lista de números recibidos</h5>";
    for($i = 0; $i<$size;$i++){
        $listanums .= "<li>$array[$i]</li>";
        $suma = $suma + $array[$i];
    }
    $promedio = $suma/$size;
    $listanums .= "<h5>Promedio</h5>";
    $listanums .= "<li>$promedio</li>";
    $listanums .= "</ul>";
    return $listanums;
}

function mediana($array){
    $size = count($array);
    $listanums = "<ul>";
    $listanums .= "<h5>Lista de números recibidos</h5>";
    for($i = 0; $i<$size;$i++){
        $listanums .= "<li>$array[$i]</li>";
    }
    
    sort($array);
    $mediana;
    $pos = $size/2;
    if($size%2 == 0){
        
        $mediana = ($array[$pos] + $array[$pos -1])/2;
    }
    else{
        $pos = floor($pos);
        $mediana = $array[$pos];
    }
    $listanums .= "<h5>Mediana</h5>";
    $listanums .= "<li>$mediana</li>";
    $listanums .= "</ul>";
    return $listanums;
}

function arreglolistas($array){
    $size = count($array);
    $listanums = "<ul>";
    $suma = 0;
    $listanums .= "<h5>Lista de números recibidos</h5>";
    for($i = 0; $i<$size;$i++){
        $listanums .= "<li>$array[$i]</li>";
        $suma = $suma + $array[$i];
    }
    
    sort($array);
    $promedio = $suma/$size;
    $listanums .= "<h5>Promedio</h5>";
    $listanums .= "<li>$promedio</li>";
    $mediana;
    $pos = $size/2;
    if($size%2 == 0){
        
        $mediana = ($array[$pos] + $array[$pos -1])/2;
    }
    else{
        $pos = floor($pos);
        $mediana = $array[$pos];
    }
    $listanums .= "<h5>Mediana</h5>";
    $listanums .= "<li>$mediana</li>";
    
    $listanums .= "<h5>Lista de números orden ascendente</h5>";
   for($i = 0; $i<$size;$i++){
        $listanums .= "<li>$array[$i]</li>";
    }
    rsort($array);
    $listanums .= "<h5>Lista de números orden descendente</h5>";
   for($i = 0; $i<$size;$i++){
        $listanums .= "<li>$array[$i]</li>";
    }
    
    $listanums .= "</ul>";
    return $listanums;
}
    
function tablacuadradocubo($x){
        $tabla = "<table>";
        $cuadrado;
        $cubo;
    
        $tabla .= "<thead>";
        $tabla .= "<tr>";
        $tabla .= "<th>Número</th><th>Cuadrado</th><th>Cubo</th>";
        $tabla .= "</tr>";
        $tabla .= "</thead>";
        
        for($i = 1; $i<=$x; $i++){
            $cuadrado = $i*$i;
            $cubo = $i*$i*$i;
            $tabla .= "<tr>";
            $tabla .= "<td> $i </td>";
            $tabla .= "<td> $cuadrado </td>";
            $tabla .= "<td> $cubo </td>";
                
            $tabla.= "</tr>";
        }
        
        
        $tabla .= "</table>";
        return $tabla;
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