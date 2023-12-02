window.onload = function () {
    iniciar();
}

function iniciar() {
    document.querySelector("#buscarSocio").addEventListener("click", buscarSocio);
}



function buscarSocio() {

    var form = new FormData();
    form.append("dato", document.querySelector("#socio").value);
    form.append("operacion","comprobarSocio");

    fetch("../dao/daoPrestamo.php", {
        method: "POST",
        body: form
    }).then((response) => {
        if (response.ok) {
            return response.text();
        } else {
            throw "Error al procesar operación";
        }
    }).then((response) => {
        alert(response);
    }).catch(() => {
        console.log("error");
    })

}