<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getTodosEstadosRecientes();
if(isset($_POST["zombieid"])&&isset($_POST["estadoid"])){
    insertestadoact($_POST["zombieid"], $_POST["estadoid"]);
    $result = getTodosEstadosRecientes();
}
include("_informacionTotal.html");

?>