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

<h3 class="center-align">Ejercicio personalizado</h3>

<div class="container centered">
    <p class = "flow-text">Recibimos una lista de números y necesitamos determinar si 10, 9 u 8 son factores de estos números sin dejar residuo.</p>
<?php
echo funcionextra($lista2);
echo funcionextra($grupo2);
?>
</div>

<div class="container">
    <h3 class="center-align">Preguntas</h3>
    <h4>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.</h4>
        <p class = "flow-text">Arroja un output sobre la configuración de PHP en uso. Incluye opciones de compilación y extensiones, la versión de PHP, información del servidor, versión del SO, headers HTTP y la licencia PHP.</p>
        <ol class="flow-text">
            <li>HTTP Request: En este campo está enlistado el GET request que se realiza al servidor para poder obtener el HTML y visualizar la página. Me parece interesante ver de una manera más tangible  el funcionamiento del protocolo HTTP solicitando información. El HTTP Request que se despliega para visualizar el Lab es el siguiente: GET /Lab9/index.php HTTP/1.1</li>
            <li>IPv6 Support: A lo largo de la configuración desplegada se observa la repetición de campos sobre IPv6. El estado de este campo es 'enabled', confirmando que la configuración actual de PHP corriendo es compatible con redes que usen IPv6 en lugar de IPv4.</li>
            <li>post_max_size y upload_max_filesize: Estas directivas definen el tamaño máximo de carga de archivos en un script de PHP. Se pueden cambiar estos límites para prevenir que los usuarios carguen archivos muy pesados al sitio. Mi post_max_size está configurado en 40M y upload_max_filesize en 40M también.</li>
        </ol>
    <h4>¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?</h4>
        <p class = "flow-text">La manera en la que XAMPP está configurado es para estar lo más abierto posible para permitir al desarrollador realizar los cambios que desee. En un ambiente de desarrollo es ideal, pero podría ser fatal en un ambiente de producción. A continuación algunas faltas de seguridad:</p>
        <ol>
            <li>El administrador MySQL (root) no tiene contraseña.</li>
            <li>El daemon MySQL es accesible por medio de network.</li>
            <li>ProFTPD usa la contraseña "lampp" para el usuario "daemon".</li>
        </ol>
        <p class = "flow-text">Se tiene que correr el comando /opt/lampp/lampp security en la terminal del stack manager y hacer las adecuaciones necesarias.</p>
    <h4>¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.</h4>
        <p class = "flow-text">Cuando se accede a un enlace de hipertexto, se hace una petición de un archivo HTML residente en el servidor que se envía y se interpreta por el navegador (cliente). Esto es posible gracias a los lenguajes del lado del servidor que son reconocidos, ejecutados e interpretados por el mismo servidor y se envían al cliente en un formato comprensible para él. Los del lado del cliente son aquellos que pueden ser directamente "digeridos" por el navegador y no necesitan pretatamiento.</p>
    <p class="flow-text">Lo que se ejecuta del lado del servidor es el request, recopilación y envío de información, que interpreta el navegador del cliente y puede visualizarse.</p>
    <h4>Fuentes:</h4>
    <ul>
        <li>http://www.adelat.org/media/docum/nuke_publico/lenguajes_del_lado_servidor_o_cliente.html</li>
        <li>https://www.ingeniovirtual.com/conceptos-basicos-sobre-tecnologias-de-desarrollo-web/</li>
        <li>https://www.a2hosting.com/kb/developer-corner/php/using-php.ini-directives/php-maximum-upload-file-size#:~:text=By%20default%2C%20the%20maximum%20upload,the%20upload_max_filesize%20and%20post_max_size%20directives.</li> 
        <li>https://www.php.net/manual/en/function.phpinfo.php</li>
    </ul>
</div>


<?php
include("_footer.html");

?>