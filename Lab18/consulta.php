<?php
require_once("util.php");
require_once("model.php");
include("_header.html");
include("_introconsultar.html");
clear_entries();
$result = getAlbumesbyArtist("");
if(isset($_POST["artista"])){
    $result = getAlbumesbyArtist($_POST["artista"]);
}
include("_formconsultaartista.html");
include("_informacionporArtistas.html");
include("_footer.html");

?>