<?php
require_once("util.php");
require_once("model.php");
include("_header.html");
include("_introregistrar.html");
include("_forminsertselect.html");
clear_entries();
$result = getIncidentesRecientes();

include("_informacionTotal.html");
include("_footer.html");

?>