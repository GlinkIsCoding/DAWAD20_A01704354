<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getTodosEstadosRecientes();
if(isset($_POST["idestado"])){
    $idestado = $_POST["idestado"];
    $result = getZombiesPorEstado($idestado);
}
include("_informacionEstados.html");

?>