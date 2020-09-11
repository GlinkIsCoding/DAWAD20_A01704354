<?php
require_once("funcs.php");
clear_entries();
$informacion = enviar_artista();
include("_header.html");
include("_form.html");
include("_informacion.html");
include("_preguntas.html");
include("_footer.html");

?>