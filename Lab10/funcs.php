<?php


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