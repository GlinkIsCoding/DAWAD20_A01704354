<?php
require_once("util.php");
$result = getAlbumes();
include("_header.html");
include("_informacionTotal.html");
include("_informacionporArtistas.html");
include("_informacionporDescuento.html");
include("_preguntas.html");
include("_footer.html");

?>