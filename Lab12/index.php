<?php
require_once("funcs.php");

session_start();

clear_entries();


$userstatus = validate_user();

if(isset($_SESSION["nombre"])){
    $informacion = welcome($userstatus);
}



include("_header.html");
include("_form.html");
include("_informacion.html");
include("_formfileupload.html");
if(isset($_SESSION["nombre"])){
    include("_perfil.html");
}
include("_preguntas.html");
include("_footer.html");

?>