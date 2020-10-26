<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getLugares();
if(isset($_POST["lugar"])&&isset($_POST["nuevonombre"])){
    update_lugar();
    $result = getLugares();
}
include("_informacionLugares.html");

?>