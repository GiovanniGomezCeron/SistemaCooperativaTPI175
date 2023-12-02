<?php 


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

        case "editar" :
                editarSocio();
            break;

        case "eliminar":
                eliminarSocio();
            break;

        case "iniciarSesion":
                iniciarSesion();
            break;

        default :
            break;
    }
}

function iniciarSesion(){
    include "../config/conexion.php";
    include "../dao/util/sqlUsuario.php";

    //session_start();

    $username = $_REQUEST["username"];
    $password = $_REQUEST["clave"];

    
    $stm = $conexion->prepare(COMPROBAR_USUARIO);
    $stm->bind_param("ss",$username,$password);

    if($stm->execute()){
        $data = $stm->get_result();
        
        $data = $data->fetch_assoc();

        session_start();

        $_SESSION["user"] = $data["nombre"];

    }
    
}


//función para obtener lista de socios
function listarUsuarios(){
    include "util/sqlUsuario.php";

    include "../config/conexion.php";
    $stm = $conexion->query(SELECCIONAR_TOODS_EMPLEADOS);
    if($stm){
        return $stm->fetch_all();
    }
    return null;
}



function editarUsuario(){
    include "../config/conexion.php";

    $posicion = $_POST["posicion"];

    $empleado = 0;
    $identificacion = 0;

    $data = obtenerParametros();

    $stm = $conexion->prepare(OBTENER_CLAVES_PRIMARIAS);
    $stm->bind_param("i",$_POST["posicion"]);

    if($stm->execute()){
       $result = $stm->get_result();
       $array  = $result->fetch_assoc();

       $empleado = $array["empleado"];
       $identificacion = $array["identificacion"];
    }

    $stm = $conexion->prepare(ACTUALIZAR_EMPLEADO);
    $stm->bind_param("ssi",$data["nombre"],$data["apellido"],$empleado);

    if($stm->execute()){
        echo json_encode("Modificado con exito");
    }

    $stm = $conexion->prepare(ACTUALIZAR_IDENTIFICACION);
    $stm->bind_param("ssi",$data["nIdentificacion"],$data["tIdentificacion"],$identificacion);

    if($stm->execute()){
        echo json_encode("Modificado con exito");
    }
    
}

//función que ingresa el empleado a la bd
function ingresarEmpleado()
{
    //incluyendo la conexion a bd
    include "../config/conexion.php";

    //obtener parametros de formulario
    $data = obtenerParametros();

    #ingresando data a bd

    //ingresar usuario
    $idUsuario = 0;

    $stm = $conexion->prepare(INGRESAR_USUARIO);
    $stm->bind_param("ss",$data["usuario"],$data["clave"]);

    if($stm->execute()){
        $stm = $conexion->query(SELECCIONAR_ULTIMO_USUARIO);
        if($stm){
            $data["idUsuario"] = $stm->fetch_row()[0];
        }
    }

    #ingresar identificacion
    $idIdentificacion = 0;
    $stm = $conexion->prepare(INGRESAR_IDENTIFICACION);
    $stm->bind_param("si",$data["nIdentificacion"],$data["tIdentificacion"]);
    if($stm->execute()){
        $stm = $conexion->query(SELECCIONAR_ULTIMA_IDENTIFICACION);
        if($stm){
            $data["nIdentificacion"] = $stm->fetch_row()[0];
        }
    }
  

    $vacio = "";
    #ingresando Empleado 
    $stm = $conexion->prepare(INGRESAR_EMPLEADO);
   
        $stm->bind_param("ssii",$data["nombre"],$data["apellido"],$data["nIdentificacion"],
        $data["idUsuario"]);

    if($stm->execute()){
        echo json_encode("Registro ingresado!");
    }

}

