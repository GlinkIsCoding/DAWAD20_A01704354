<?php
require_once("util.php");
require_once("model.php");
clear_entries();
$result = getZombies();
if(isset($_POST["nuevozombie"])){
    update_zombie();
    $result = getZombies();
}
include("_informacionZombies.html");

?>