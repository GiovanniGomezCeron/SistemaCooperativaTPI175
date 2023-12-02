<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
    <title>Registro Usuario</title>
    
	<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<link href="../css/all.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="../css/owl.carousel.min.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="../css/jquery.fancybox.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">

    <link href="../css/styleClient.css" rel="stylesheet">
    
    <!--<link href="../js/dataTable/dataTables.bootstrap5.min.css" rel="stylesheet">-->
    <link href="../js/dataTable/data/jquery.dataTables.min.css" rel="stylesheet">

    <link href="../css/zebra/css/flat/zebra_dialog.css" rel="stylesheet">
</head>


<body>
<?php 

$url = "../";
$links = array(
    "movimientos" => "listadoMovimientos",
    "cuentas" => "listadoCuentas",
    "socios" => "listadoSocios",
    "roles" => "listadoRoles",
    "usuarios" => "listadoUsuarios",
    "tipoCuenta" => "listadoTipoCuenta",
    "tipoOperacion" => "listadoTipoOperacion",
    "tipoMovimiento" => "listadoTipoMovimiento"
);
include "../dao/daoUsuario.php";
include "../pages/menu/menu.php";

$lista = listarUsuarios();
?>
    <hr class="m-0">
    <div class="container-fluid p-4 ">
        
        <h4 class="text-center bold">Listado de Usuarios</h4>
       <div class="row mb-3">
            <button class="ingresar btn ml-3 bg-primary text-light" data-toggle="modal" data-target="#modalRegistroUsuario">Agregar Usuarios</button>
       </div> 
        <table id="listadoUsuarios" class="table table-striped mt-3 " style="width:100%">
            <thead>
            <tr>
                    <th>N°</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Identificación</th>
                    <th>Rol</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;

                foreach ($lista as $item) {
                    echo "<tr>
                    <td>" . $i . "</td>
                    <td>" . $item[0] . "</td>
                    <td>" . $item[1] . "</td>  
                    <td>" . $item[2] . "</td>           
                    <td>" .$item[4].": ".$item[3]. "</td>   
                    <td>" . ($item[5]=="1" ? 'Administrador' : ''), ($item[5]=="2" ? 'Empleado' : ''), ($item[5]=="3"? 'Socio' : '') . "</td> 
                                <td><button class='editar btn  text-light bg-success' data-toggle='modal' data-target='#modalRegistroUsuario'>Editar</button></td>
                                <td><button class='eliminar btn  text-light bg-danger'>Eliminar</button></td>
                            </tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table> 
    </div>

<div class="alert alert-primary col-3 float-right hide" id="alertaMensaje">
    <button class="close" data-dismiss="alert">&times</button>
    <strong>Registro Guardado!</strong>
</div>
 
<script src="../vendor/jquery/jquery.min.js"></script>

<script src="../js/dataTable/jquery.dataTables.min.js"></script>
<script src="../js/usuarios/usuariosScript.js"></script>

<!-- Bootstrap core JavaScript -->
<?php include "modal/modalRegistroUsuario.php"?>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/imagesloaded.pkgd.min.js"></script>
<script src="../js/isotope.pkgd.min.js"></script>
<script src="../js/filter.js"></script>
<script src="../js/jquery.appear.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.fancybox.min.js"></script>
<script src="../js/zebraDialog/zebra_dialog.src.js"></script>


</body>
</html>