<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getZombies();
include("_header.html");
include("_introactualizar.html");
include("_formupdate.html");
include("_informacionZombies.html");
include("_footer.html");

?>