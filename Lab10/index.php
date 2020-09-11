<?php
require_once("funcs.php");
clear_entries();

$artiststatus = validate_artist();
$albumstatus = validate_album();
$emailstatus = validate_email();
$cellphonestatus = validate_cellphone();
$informacion = despliega_info($artiststatus,$albumstatus,$emailstatus,$cellphonestatus);


include("_header.html");
include("_form.html");
include("_informacion.html");
include("_preguntas.html");
include("_footer.html");

?>