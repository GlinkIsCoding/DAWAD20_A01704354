<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumes();
if(isset($_POST["id"])){
    remove_album();
    $result = getAlbumes();
}
include("_informacionTotal.html");

?>