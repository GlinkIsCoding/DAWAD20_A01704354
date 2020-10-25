<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getAlbumes();
include("_header.html");
include("_introactualizar.html");
include("_formupdate.html");
include("_informacionTotal.html");
include("_footer.html");

?>