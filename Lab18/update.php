<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumes();
include("_header.html");
include("_introactualizar.html");
if(isset($_POST["id"])&&isset($_POST["precio"])&&isset($_POST["unidades"])){
    update_album();
    $result = getAlbumes();
}
include("_formupdate.html");
include("_informacionTotal.html");
include("_footer.html");

?>