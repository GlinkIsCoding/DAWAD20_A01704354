<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = get("incidentepark");
if(isset($_POST["lugarid"])&&isset($_POST["tipoid"])){
    insertincidente($_POST["lugarid"], $_POST["tipoid"]);
    $result = get("incidentepark");
}
include("_informacionTotal.html");

?>