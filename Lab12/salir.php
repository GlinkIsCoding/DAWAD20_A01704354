<?php

require_once("funcs.php");

session_start();
session_unset();
session_destroy();


include("_header.html");
include("_salir.html");
include("_form.html");
include("_footer.html");

?>