<?php
require_once("funcs.php");
include("_header.html");
?>

<h1 class="center-align">Lab 9</h1>

<h3 class="center-align">Promedio de arrays</h3>

<div class="container centered">
<?php
$grupo1 = array(1, 2, 3, 4, 5);
$grupo2 = array(40,60,70,80,90);
    echo promedio($grupo1);
    echo promedio($grupo2);
?>
</div>

<h3 class="center-align">Mediana de arrays</h3>

<div class="container centered">
<?php
    echo mediana($grupo1);
    echo mediana(array(70,40,60,80,90));
?>
</div>

<h3 class="center-align">Listas de números</h3>

<div class="container centered">
<?php
$lista1 = array(90, 4, 6, 7, 8, 2);
$lista2 = array(56, 78, 90, 2, 1, 3);
echo arreglolistas($lista1);
echo arreglolistas($lista2);
?>
</div>




<h3 class="center-align">Tablas de cuadrados y cubos</h3>

<div class="container centered">
<?php
echo tablacuadradocubo(5);
echo tablacuadradocubo(7);
?>
</div>

<?php
include("_footer.html");

?>