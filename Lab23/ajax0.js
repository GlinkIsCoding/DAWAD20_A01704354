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

/*
$("#buscarbutton").click(function () {
    $.post("consultarcontrolador.php", {
        artista: $("#artista").val(),
    }).done(function (data) {
        $("#resultadosporartista").html(data);
    }).fail(function () {
        alert("error");
    });
});
*/
let button = document.querySelector("#buscarbutton")
let input = document.querySelector("#artista")
let output = document.querySelector("#output")

button.addEventListener('click', (e) => {
    getDataFromItunes()
})

function getDataFromItunes(){
    let url = 'https://itunes.apple.com/search?term='+input.value
    
    fetch(url)
    .then(data => data.json())
    .then(json => {
        console.log(json)
        let iTunesHTML = ''
        
        json.results.forEach( song =>{
            iTunesHTML += 
                `
        <div class = "col m4">
            <div class="card hoverable">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="${song.artworkUrl100}">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4 truncate">${song.trackName}</span>
                  <p class = "truncate">${song.artistName}</p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Info<i class="material-icons right">close</i></span>
                  <p>${song.trackName}</p><p>Álbum: ${song.collectionName}</p><p>Género: ${song.primaryGenreName}</p><a href="${song.previewUrl}" target="_blank">Escuchar preview</a>
                </div>
            </div>
        </div>

            
                `
        })
        output.innerHTML = iTunesHTML
    })
    .catch(error => console.log(error))
}

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
