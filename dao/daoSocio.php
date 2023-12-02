<?php 
//creando constantes
include "util/sqlSocio.php";

//parametro de operacion a realizar
$op = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : "";

//verificando operación a realizar
elegirOperacion($op);

//verificar el tipo de operación a realizar (ingresar,modificar,entre otros)
function elegirOperacion($op)
{
    switch ($op) {
        case "ingresar":
            ingresarSocio();
            break;

        case "editar":
            editarSocio();
            break;

        case "eliminar":
            eliminarSocio();
            break;

        default:
            break;
    }
}



function eliminarSocio()
{
    include "../config/conexion.php";

    $socio = 0;

    $stm = $conexion->prepare(SELECCIONAR_SOCIO);
    $stm->bind_param("i", $_POST["posicion"]);

    if ($stm->execute()) {
        $socio = (($stm->get_result())->fetch_assoc())["id"];
    }

    $stm = $conexion->prepare(ELIMINAR_SOCIO);
    $stm->bind_param("i", $socio);

    if ($stm->execute()) {
        echo json_encode("Socio eliminado correctamente!");
        return;
    }
    echo json_encode();
}



//función para obtener lista de socios
function listarSocios()
{
    include "../config/conexion.php";
    $stm = $conexion->query(SELECCIONAR_TOODS_SOCIOS);
    if ($stm) {
        return $stm->fetch_all();
    }
    return null;
}



function editarSocio()
{
    include "../config/conexion.php";

    $posicion = $_POST["posicion"];

    $socio = 0;
    $identificacion = 0;

    $data = obtenerParametros();

    $stm = $conexion->prepare(OBTENER_CLAVES_PRIMARIAS);
    $stm->bind_param("i", $_POST["posicion"]);

    if ($stm->execute()) {
        $result = $stm->get_result();
        $array = $result->fetch_assoc();

        $socio = $array["socio"];
        $identificacion = $array["identificacion"];
    }

    $stm = $conexion->prepare(ACTUALIZAR_SOCIO);
    $stm->bind_param("sssi", $data["nombre"], $data["apellido"],$data["telefono"], $socio);

    if ($stm->execute()) {
        echo json_encode("Modificado con exito");
    }

    $stm = $conexion->prepare(ACTUALIZAR_IDENTIFICACION);
    $stm->bind_param("ssi", $data["nIdentificacion"], $data["tIdentificacion"], $identificacion);

    if ($stm->execute()) {
        echo json_encode("Modificado con exito");
    }

}

//función que ingresa el socio a la bd
function ingresarSocio()
{
    //incluyendo la conexion a bd
    include "../config/conexion.php";

    //obtener parametros de formulario
    $data = obtenerParametros();

    #ingresando data a bd

    //ingresar usuario
    $idUsuario = 0;

    $stm = $conexion->prepare(INGRESAR_USUARIO);
    $stm->bind_param("ss", $data["usuario"], $data["clave"]);

    if($stm->execute()){
        $stm = $conexion->query(SELECCIONAR_ULTIMO_USUARIO);
        if($stm){
            $data["idUsuario"] = $stm->fetch_row()[0];
        }
    }

    #ingresar identificacion
    $idIdentificacion = 0;
    $stm = $conexion->prepare(INGRESAR_IDENTIFICACION);
    $stm->bind_param("si", $data["nIdentificacion"], $data["tIdentificacion"]);
    if($stm->execute()){
        $stm = $conexion->query(SELECCIONAR_ULTIMA_IDENTIFICACION);
        if($stm){
            $data["nIdentificacion"] = $stm->fetch_row()[0];
        }
    }


    $codigo = obtenerCodigoSocio($data["nombre"], $data["apellido"]);

    #ingresando socio 
    $stm = $conexion->prepare(INGRESAR_SOCIO);

    $stm->bind_param(
        "ssissi",
        $data["nombre"],
        $data["apellido"],
        $data["nIdentificacion"],
        $data["telefono"],
        $codigo,
        $data["idUsuario"]
    );

    if($stm->execute()){
        echo json_encode("Registro ingresado!");
    }

}

function obtenerCodigoSocio($nombre, $apellido)
{
    $completo = $nombre . $apellido;
    $completo = str_replace(" ", "", $completo);

    $iteracion = rand(1, 6);

    $codigo = "";

    for ($i = 1; $i <= 6; $i++) {
        if ($i == $iteracion) {
            $n = rand(0, 9);
            $codigo .= $n;

        } else {
            $n = rand(0, strlen($nombre));
            $codigo .= $completo[$n];
            $completo[$n] = " ";
            $completo = str_replace(" ","",$completo);
        }
    }
    return $codigo;
}


//obtiene parametros de formulario mediante POST
function obtenerParametros()
{
    return array(
        "nombre" => $_POST["nombres"],
        "apellido" => $_POST["apellidos"],
        "telefono" => $_POST["telefono"],
        "tIdentificacion" => $_POST["tipoIdentificacion"],
        "nIdentificacion" => $_POST["nIdentificacion"],
        "usuario" => $_POST["usuario"],
        "clave" => $_POST["clave"]
    );
}


//constantes de setencias sql
/*function crearConstantes(){
    //ingresar usuario
    define("INGRESAR_USUARIO","INSERT INTO usuario(usuario,clave,rol) VALUES(?,?,3)");

    //ingresar socio
    define("INGRESAR_SOCIO",
    "INSERT INTO socio(nombre,apellido,identificacion,direccion,telefono,codigoSocio,usuario)
     VALUES(?,?,?,?,?,?,?)");

    //ingresar nuevo numero de identificacion
    define("INGRESAR_IDENTIFICACION","INSERT INTO identificacion(numero,tipoIdentificacion)
            VALUES(?,?)");

    //obtener usuario recien creado
    define("SELECCIONAR_ULTIMO_USUARIO","SELECT MAX(id) FROM usuario");

    //obtener id de identificación recien creada
    define("SELECCIONAR_ULTIMA_IDENTIFICACION","SELECT MAX(id) FROM identificacion");

    //listando socios
    define("SELECCIONAR_TOODS_SOCIOS","SELECT nombre,apellido,i.numero, direccion, telefono,ti.tipo
                                       FROM socio s
                                       INNER JOIN identificacion i
                                       ON i.id = s.identificacion
                                       INNER JOIN tipoIdentificacion ti
                                       ON ti.id = i.tipoIdentificacion");

    //obtener claves primarias
    define("OBTENER_CLAVES_PRIMARIAS","SELECT s.id socio ,i.id identificacion FROM socio s
                                       INNER JOIN identificacion i 
                                       ON i.id = s.identificacion
                                       LIMIT ?,1;");

   //actualizar socio
    define("ACTUALIZAR_SOCIO","UPDATE FROM socio SET nombre=?,apellido=?,direccion=?,telefono=? WHERE id=?");

    //actualizar identificacion
    define("ATUALIZAR_IDENTIFICACION","UPDATE FROM identificacion SET numero,tipoIdentificacion=? WHERE id=?");
    
    //eliminar socio
    define("ELIMINAR_SOCIO","DELETE FROM socio WHERE id = (SELECT id FROM socio LIMIT ?,1)");

}*/
