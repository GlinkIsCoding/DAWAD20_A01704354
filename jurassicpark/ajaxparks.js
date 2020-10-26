$("#registrarbutton").click(function () {
    console.log("click");
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
        horafecha: $("#horafecha").val(),
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});

$("#actualizarbutton").click(function () {
    console.log("hola");
    $.post("actualizarcontrolador.php", {
        lugar: $("#lugar").val(),
        nuevonombre: $("#nuevonombre").val()
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});


