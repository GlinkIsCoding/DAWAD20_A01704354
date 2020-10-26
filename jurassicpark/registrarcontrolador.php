<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getIncidentesRecientes();
if(isset($_POST["lugarid"])&&isset($_POST["tipoid"])){
    insertincidente($_POST["lugarid"], $_POST["tipoid"]);
    $result = getIncidentesRecientes();
}
include("_informacionTotal.html");

?>