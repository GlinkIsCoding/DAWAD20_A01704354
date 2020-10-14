<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumesbyArtist("");
if(isset($_POST["artista"])){
    $result = getAlbumesbyArtist($_POST["artista"]);
}
include("_informacionTotal.html");

?>