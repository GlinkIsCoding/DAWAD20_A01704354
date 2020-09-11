<?php
require_once("funcs.php");
include("_header.html");
?>

<?php
    $informacion = "";
    if(isset($_GET["artista"])){
        $informacion = elegir_artista($_GET["artista"]);
    }
    else if(isset($_POST["artista"])){
        $informacion = elegir_artista($_POST["artista"]);
    }
    else{
        $informacion = "Ningun artista seteado";
    }
    
?>
    
    <?= $informacion ?>
    
<?php
include("_form.html");

?>




<?php
include("_preguntas.html");
include("_footer.html");

?>