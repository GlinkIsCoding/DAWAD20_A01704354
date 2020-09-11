<?php
require_once("funcs.php");
include("_header.html");
?>

<h1 class="center-align">Lab 10</h1>

<h3 class="center-align">Introduce un nombre</h3>

<div class="container centered">
<?php
    $artista = "troye";
    if(isset($_GET["artista"])){
        if($_GET["artista"] == $artista){
            echo "El artista es $artista";
        }
        else{
            echo"No es ".$_GET["artista"].".<br>";
        }
    }
    else if(isset($_POST["artista"])){
        if($_POST["artista"] == $artista){
            echo "El artista es $artista";
        }
        else{
            echo"No es ".$_POST["artista"].".<br>";
        }
    }
    else{
        echo "Ningun artista seteado";
    }
?>
    
    
<form action="index.php" method="post" class="cols12">
    <div class="row">
        <div class="input-field col s6">
            <input type="text" name="artista" class="validate" placeholder="Troye Sivan">
            <label for="artista">Nombre del artista: </label>
        </div>
    </div>
    
    
    <input type="submit" value="Saber más">
    </form>
</div>



<div class="container">
    <h3 class="center-align">Preguntas</h3>
    <h4></h4>
        <p class = "flow-text"></p>
        
    <h4>Fuentes:</h4>
    <ul>
        <li></li>
    </ul>
</div>


<?php
include("_footer.html");

?>