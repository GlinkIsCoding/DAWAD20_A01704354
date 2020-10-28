<?php

function clear_entries(){
    if(isset($_POST["nuevozombie"])){
        $_POST["nuevozombie"] = htmlspecialchars($_POST["nuevozombie"]);
    }
    if(isset($_POST["zombieid"])){
        $_POST["zombieid"] = htmlspecialchars($_POST["zombieid"]);
    }
    if(isset($_POST["estadoid"])){
        $_POST["estadoid"] = htmlspecialchars($_POST["estadoid"]);
    }
    if(isset($_POST["idestado"])){
        $_POST["idestado"] = htmlspecialchars($_POST["idestado"]);
    }
    if(isset($_POST["precio"])){
        $_POST["precio"] = htmlspecialchars($_POST["precio"]);
    }
    if(isset($_POST["idioma"])){
        $_POST["idioma"] = htmlspecialchars($_POST["idioma"]);
    }
}



function despliegaInfo($result){
    $count = 0;
    $tabla = "<table>";
    $tabla .= "<thead><tr><th>Nombre del zombie</th><th>Estado del zombie</th><th>Fecha del registro</th></tr></thead>";
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tabla .= "<tr>";
        $tabla .= "<td>" . $row["nombrezombie"] . "</td>";
        $tabla .= "<td>" . $row["nombreestado"] . "</td>";
        $tabla .= "<td>" . $row["horafecha"] . "</td>";
        $count = $count + 1;
        $tabla .= "</tr>";
        }
        $tabla .= "<tr>";
        $tabla .= "<td>Total:</td><td>" . $count . "</td><td>registros</td>";
        $tabla .= "</tr>";
    $tabla .= "</table>";
    return $tabla;
    }
}

function insertincidente(){
    $lugarid = $_POST["lugarid"];
    $tipoid = $_POST["tipoid"];
    
    if(is_numeric($lugarid) && is_numeric($tipoid)){
        if(insertarIncidente($lugarid, $tipoid)){
            echo "<script>M.toast({html: '¡Se creó el nuevo registro exitosamente!', classes: 'lime accent-3 black-text'})</script>";
            }else{   
            echo "<script>M.toast({html: 'No pudo crearse el registro.'})</script>";
        }
        }else{
        }
    
}

function insertestadoact(){
    $zombieid = $_POST["zombieid"];
    $estadoid = $_POST["estadoid"];
    
    if(is_numeric($zombieid) && is_numeric($estadoid)){
        if(insertarEstadoAct($estadoid, $zombieid)){
            echo "<script>M.toast({html: '¡Se creó el nuevo registro exitosamente!', classes: 'lime accent-3 black-text'})</script>";
            }else{   
            echo "<script>M.toast({html: 'No pudo crearse el registro.'})</script>";
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

function remove_incidente(){
    $horafecha = $_POST["horafecha"];
    if(removeIncidente($horafecha)){
        echo "<script>M.toast({html: '¡El registro se eliminó con éxito!', classes: 'lime accent-3 black-text'})</script>";
    }else{
        echo "<script>M.toast({html: 'El registro no pudo eliminarse.', classes: 'red lighten-2 black-text'})</script>";
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

function update_lugar(){
    $id = $_POST["lugar"];
    $nuevonombre = $_POST["nuevonombre"];
    if(strlen($nuevonombre)>0){
        if(update_idlugar($id, $nuevonombre)){
                echo "<script>M.toast({html: '¡El nombre del lugar se actualizó con éxito!', classes: 'lime accent-3 black-text'})</script>";
            }else{
                echo "<script>M.toast({html: 'El nombre del lugar no pudo actualizarse', classes: 'red lighten-2 black-text'})</script>";
            }
    }else{
        echo "<script>M.toast({html: 'Introduce un nombre nuevo para el lugar', classes: 'red lighten-2 black-text'})</script>";
    }
}

function update_zombie(){
    $nuevozombie = $_POST["nuevozombie"];
    if(strlen($nuevozombie)>0){
        if(insert_zombie($nuevozombie)){
                echo "<script>M.toast({html: '¡El nuevo zombie se registró con éxito!', classes: 'lime accent-3 black-text'})</script>";
            }else{
                echo "<script>M.toast({html: 'El zombie no pudo registrarse', classes: 'red lighten-2 black-text'})</script>";
            }
    }else{
        echo "<script>M.toast({html: 'Introduce un nombre para el nuevo zombie', classes: 'red lighten-2 black-text'})</script>";
    }
}

function despliegaInfoLugares($result){
    $tabla = "<table>";
    $tabla .= "<thead><tr><th>Nombre de la ubicación</th></tr></thead>";
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tabla .= "<tr>";
        $tabla .= "<td>" . $row["nombre"] . "</td>";
        $tabla .= "</tr>";
        }
    $tabla .= "</table>";
    return $tabla;
    }
}

function despliegaInfoZombies($result){
    $count = 0;
    $tabla = "<table>";
    $tabla .= "<thead><tr><th>Nombre del zombie</th></tr></thead>";
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tabla .= "<tr>";
        $tabla .= "<td>" . $row["nombrezombie"] . "</td>";
        $tabla .= "</tr>";
        $count = $count +1 ;
        }
        $tabla .= "<tr>";
        $tabla .= "<td>Total: " . $count . " zombies</td>";
        $tabla .= "</tr>";
    $tabla .= "</table>";
    return $tabla;
    }
}
function despliegaInfoEstados($result){
    $count = 0;
    $tabla = "<table>";
    $tabla .= "<thead><tr><th>Nombre del zombie</th></tr></thead>";
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tabla .= "<tr>";
        $tabla .= "<td>" . $row["nombrezombie"] . "</td>";
        $count = $count +1 ;
        $tabla .= "</tr>";
        }
        $tabla .= "<tr>";
        $tabla .= "<td>Total:</td><td>" . $count . "</td>";
        $tabla .= "</tr>";
    $tabla .= "</table>";
    return $tabla;
    }
}






?>