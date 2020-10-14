<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumes();
if(isset($_POST["nombre"])&&isset($_POST["artista"])&&isset($_POST["unidades"])&&isset($_POST["precio"])&&isset($_POST["idioma"])){
    insert_album();
    $result = getAlbumes();
}
include("_informacionTotal.html");

?>