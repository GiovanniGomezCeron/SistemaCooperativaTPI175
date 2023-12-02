var operacion = "ingresar";
var row = -1;

//cargar complementos
$(document).ready(function () {
    cargarTableUsuarios();
    iniciarUsuariosScript();
    iniciarDescripcion();
    //iniciando componentes
    iniciar();
});

//descripcion de tipo de documento en tabla
function iniciarDescripcion() {
    $("[data-toggle='tooltip'").tooltip();
}

//cargar datatable
function cargarTableUsuarios() {
    var tabla = $("#listadoUsuarios").DataTable();

}

//iniciar clicks de bontones editar y eliminar
function iniciarUsuariosScript() {
    var botoneraIngresar = $(".ingresar");
    var botoneraEditar = $(".editar");
    var botoneraEliminar = $(".eliminar");
    botoneraIngresar[0].addEventListener("click", ingresar);


    for (var i = 0; i < botoneraEditar.length; i++) {
        botoneraEditar[i].addEventListener("click", modificar);
        botoneraEliminar[i].addEventListener("click", eliminar);
    }
}


function editar() {
   

    var data = new FormData();
    data.append("posicion", row);
    data.append("operacion", "editar");

    fetch("../dao/daoUsuario.php",
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
    var row = this.parentElement.parentElement.rowIndex - 1;
    new $.Zebra_Dialog(
        "Eliminar al usuario?",
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

    fetch("../dao/daoUsuario.php", {
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
function ingresar(){
    $("#nuevaCon").hide();
    $("#inicio").hide();

}
//setear valores de tabla en formulario
function modificar() {

    operacion = "editar";

    var tr = this.parentElement.parentElement;
    var collTd = tr.children;
    $ide=collTd[4].innerText;
    $ide=$ide.replace("DUI: ","");
    $ide=$ide.replace("NIT: ","");
    $ide=$ide.replace("Pasaporte: ","");
    $ide=$ide.replace("Carnet de minoridad: ","");

    row = this.parentElement.parentElement.rowIndex - 1;

    $("#nombres").val(collTd[2].innerText);
    $("#apellidos").val(collTd[3].innerText);

    $("#nIdentificacion").val($ide);
    $("#infoCuen").hide();

    
    $("#btnRegistrarUsuario").val("Modificar Usuario");

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
    document.querySelector("#btnRegistrarUsuario").addEventListener("click", registrarUsuario);
    document.querySelector("#btnCerrarUsuario").addEventListener("click",cerrarModal);
}

//función que envia formulario de registro usuario
function registrarUsuario(e) {
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

    fetch("../dao/daoUsuario.php", {
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
    $("#nIdentificacion").val("");
    $("#usuario").val("");
    $("#clave").val("");
}

function cerrarModal(){
    location.href = location.href;
}