<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumesbyArtist("");
include("_header.html");
include("_introconsultar.html");
if(isset($_POST["artista"])){
    $result = getAlbumesbyArtist($_POST["artista"]);
}
include("_formconsultaartista.html");
include("_informacionporArtistas.html");
include("_footer.html");

?>