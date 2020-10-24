async function registrar_async(){
    let parametros = new FormData();
    parametros.append("nombre", document.getElementById("nombre").value);
    parametros.append("artista", document.getElementById("artista").value);
    parametros.append("unidades", document.getElementById("unidades").value);
    parametros.append("precio", document.getElementById("precio").value);
    parametros.append("idioma", document.getElementById("idioma").value);
    try{
        await fetch('registrarcontrolador.php', {
            method: 'POST',
            body: parametros
        }).then(function(response){
                return response.text();
                }).then(function(data){
            document.getElementById("resultados_consulta").innerHTML = data;
        });
    } catch (e){
        console.log(e);
        document.getElementById("resultados_consulta").innerHTML = "Error en la comunicación con el servidor";
    }
}

if(document.getElementById("registrar")){
   document.getElementById("registrar").onclick = registrar_async;
   }


$("#buscarbutton").click(function () {
    $.post("consultarcontrolador.php", {
        artista: $("#artista").val(),
    }).done(function (data) {
        $("#resultadosporartista").html(data);
    }).fail(function () {
        alert("error");
    });
});

$("#eliminarbutton").click(function () {
    $.post("eliminarcontrolador.php", {
        id: $("#id").val(),
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});

$("#actualizarbutton").click(function () {
    $.post("actualizarcontrolador.php", {
        id: $("#id").val(),
        precio: $("#precio").val(),
        unidades: $("#unidades").val(),
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});
