<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumes();
include("_header.html");
include("_introregistrar.html");
include("_forminsert.html");
if(isset($_POST["nombre"])&&isset($_POST["artista"])&&isset($_POST["unidades"])&&isset($_POST["precio"])&&isset($_POST["idioma"])){
    insert_album();
    $result = getAlbumes();
}
include("_informacionTotal.html");
include("_preguntas.html");
include("_footer.html");

?>