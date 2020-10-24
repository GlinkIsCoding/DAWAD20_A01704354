<?php
require_once("util.php");
require_once("model.php");
include("_header.html");
include("_introregistrar.html");
include("_forminsert.html");
clear_entries();
$result = getAlbumes();

include("_informacionTotal.html");
include("_preguntas.html");
include("_footer.html");

?>