<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getIncidentesRecientes();
if(isset($_POST["horafecha"])){
    remove_incidente();
    $result = getIncidentesRecientes();
}
include("_informacionTotal.html");

?>