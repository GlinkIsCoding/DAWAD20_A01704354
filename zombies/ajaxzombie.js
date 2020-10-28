$("#registrarbutton").click(function () {
    console.log("click");
    $.post("registrarcontrolador.php", {
        zombieid: $("#zombie").val(),
        estadoid: $("#estado").val()
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

$("#consultarbutton").click(function () {
    $.post("eliminarcontrolador.php", {
        idestado: $("#estado").val(),
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});

$("#actualizarbutton").click(function () {
    console.log("hola");
    $.post("actualizarcontrolador.php", {
        nuevozombie: $("#nuevozombie").val()
    }).done(function (data) {
        $("#resultados_consulta").html(data);
    }).fail(function () {
        alert("error");
    });
});


