var operacion = "ingresar";
var row = -1;

//cargar complementos
$(document).ready(function () {
    cargarTableSocio();
    iniciarSociosScript();
    iniciarDescripcion();
    //iniciando componentes
    iniciar();
});

//descripcion de tipo de documento en tabla
function iniciarDescripcion() {
    $("[data-toggle='tooltip'").tooltip();
}

//cargar datatable
function cargarTableSocio() {
    var tabla = $("#listadoSocios").DataTable();

}

//iniciar clicks de bontones editar y eliminar
function iniciarSociosScript() {
    var botoneraEditar = $(".editar");
    var botoneraEliminar = $(".eliminar");


    for (var i = 0; i < botoneraEditar.length; i++) {
        botoneraEditar[i].addEventListener("click", modificar);
        botoneraEliminar[i].addEventListener("click", eliminar);
    }
}


function editar() {
   

    var data = new FormData();
    data.append("posicion", row);
    data.append("operacion", "editar");

    fetch("../dao/daoSocio.php",
        {
            method: "POST",
            body: data
        }
    ).then((response) => {
        if (response.ok) {
            return response.text();
        } else {
            throw "Error en la petición";
        }
    }).then((response) => {
        alert("Registro modificado correctamente!");

    }).catch(() => {
        alert("Ha sucedido un error");
    })
}

//eliminar registro
function eliminar() {
    var row = this.parentElement.parentElement.parentElement.parentElement.rowIndex - 1;
    new $.Zebra_Dialog(
        "Eliminar al socio?",
        {
            type: "question",
            title: "Pregunta",
            custom_class:"myclass",
            onClose: function (caption) {
                if (caption.toLowerCase() == "ok") {
                   
                    procesarEliminado(row);
                }
            }
        }
    );
}

function procesarEliminado(row) {
    
    var data = new FormData();
    data.append("posicion", row);
    data.append("operacion", "eliminar");

    fetch("../dao/daoSocio.php", {
        method: "POST",
        body: data
    }).then((response) => {
        if (response.ok) {
            return response.text();
        } else {
            throw "Ha fallado la petición";
        }
    }).then((response) => {
        location.href = location.href;
    }).catch(() => {
        alert("ha fallado la petición");
    });

    operacion = "ingresar";
}

//setear valores de tabla en formulario
function modificar() {

    operacion = "editar";

    var tr = this.parentElement.parentElement.parentElement.parentElement;
    var collTd = tr.children;

    row = this.parentElement.parentElement.rowIndex - 1;

    $("#nombres").val(collTd[1].innerText);
    $("#apellidos").val(collTd[2].innerText);
    $("#direccion").val(collTd[4].innerText);
    $("#telefono").val(collTd[5].innerText);
    $("#nIdentificacion").val(collTd[3].innerText);

    $("#usuario").hide();
    $("#clave").hide();
    $("[for='usuario']").hide();
    $("[for='clave']").hide();
    $("#btnRegistrarSocio").val("Modificar Socio");

    var tIdentificacionText = collTd[3].dataset.originalTitle;

    var select = document.querySelector("#tipoIdentificacion");
    var options = select.options;

    for (var i = 0; i < options.length; i++) {
        if (options[i].text.toLowerCase() == tIdentificacionText.toLowerCase()) {
            select.value = options[i].value;
            return;
        }
    }

}


//iniciar elementos html necesarios para ingreso o modificacion
function iniciar() {
    document.querySelector("#btnRegistrarSocio").addEventListener("click", registrarSocio);
    document.querySelector("#btnCerrarSocio").addEventListener("click",cerrarModal);
}

//función que envia formulario de registro socio
function registrarSocio(e) {
    e.preventDefault();

    var form = new FormData(this.parentNode.parentNode);

    if (operacion == "ingresar") {
        form.append("operacion", "ingresar");
        

    } else {
        form.append("operacion", "editar");
        form.append("posicion",row);
    }

    iniciarPeticion(form, null);
}

//iniciar petición con API fetch 
function iniciarPeticion(data, fn) {

    fetch("../dao/daoSocio.php", {
        method: "POST",
        body: data
    }).then((response) => {
        if (response.ok) {
            return response.text();
        } else {
            throw "Error en la inserción";
        }

    }).then((response) => {
        if (fn != null) {
            fn(data);
        }
        limpiarFormulario();

    }).catch(() => {
        throw "Ha fallado la petición";
    });
}

function limpiarFormulario() {

    $("#nombres").val("");
    $("#apellidos").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#nIdentificacion").val("");

    $("#usuario").val("");
    $("#clave").val("");
}

function cerrarModal(){
    location.href = location.href;
}