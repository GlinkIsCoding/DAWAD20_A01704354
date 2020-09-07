<?php
    
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
?>