<?php
require_once("util.php");
clear_entries();
$result = getAlbumes();
include("_header.html");
if(isset($_POST["id"])){
    remove_album();
    $result = getAlbumes();
}
include("_formremove.html");
include("_informacionTotal.html");
include("_footer.html");

?>