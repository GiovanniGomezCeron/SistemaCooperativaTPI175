<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
    <title>Listados Préstamos</title>
    
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
    "movimientos" => "listadoPrestamos",
    "cuentas" => "listadoCuentas",
    "socios" => "listadoSocios",
    "roles" => "listadoRoles",
    "usuarios" => "listadoUsuarios",
    "tipoCuenta" => "listadoTipoCuenta",
    "tipoOperacion" => "listadoTipoOperacion",
    "tipoMovimiento" => "listadoTipoMovimiento",
    "cerrarSesion"  => "cerrar"
);
include "../dao/daoSocio.php";
include "../pages/menu/menu.php";

$lista = listarSocios();
?>
    <hr class="m-0">
    <div class="container-fluid p-4 ">
        
        <h4 class="text-center bold">Listado de Préstamos</h4>
       <div class="row">

            <input type="text"  class="col-2" id="socio" placeholder="Dato de socio...">
            <button class="btn ml-3 bg-primary text-light" id="buscarSocio">
               Buscar
            </button>

            <button class="btn ml-3 bg-warning text-light float-right" data-toggle="modal" data-target="#modalRegistroPrestamo">Agregar Préstamo</button>
       </div> 


        <!--<table id="listadoSocios" class="table table-striped mt-3 " style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Identificación</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>-->
                <?php 
                $i = 1;

               /* foreach ($lista as $item) {
                    echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $item[0] . "</td>
                                <td>" . $item[1] . "</td>
                                <td title='".$item[5]."' data-toggle='tooltip'>" . $item[2] . "</td>
                                <td>" . $item[3] . "</td>
                                <td>" . $item[4] . "</td>
                                <td> 
                                    <div class='dropdown'>
                                        <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                            Op
                                        </button>
                                        <div class='dropdown-menu'>
                                            <a class='dropdown-item editar' data-toggle='modal' data-target='#modalRegistroSocio'>Editar</a>
                                            <a class='dropdown-item eliminar' href='#'>Eliminar</a>
                                        </div>
                                    </div>
                                </td>";
                                #<td><button class='editar btn  text-light bg-success' data-toggle='modal' data-target='#modalRegistroSocio'>Editar</button></td>
                                #<td><button class='eliminar btn  text-light bg-danger'>Eliminar</button></td>
                            "</tr>";
                           
                    $i++;
                }*/
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
<script src="../js/prestamo/prestamoScript.js"></script>

<!-- Bootstrap core JavaScript -->
<?php include "modal/modalRegistroPrestamo.php"?>
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