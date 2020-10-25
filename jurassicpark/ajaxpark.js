$("#registrarbutton").click(function () {
    $.post("registrarcontrolador.php", {
        lugarid: $("#lugar").val(),
        tipoid: $("#tipo").val()
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});


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
    console.log("hola");
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


