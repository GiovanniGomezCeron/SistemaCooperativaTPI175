<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Registro Socio</title>
</head>

<body>

	<!--Formulario de registro de socios-->
	<div class="wrapper-main" id="formRegistroSocio">
		<div class="container-fluid">
			<div class="card col-12 mx-auto border ">
				<div class="row pt-4 pl-2 pb-4 pr-3">
					<div class="col-4 p-0 mh-100">
						<img src="<?php echo $path;?>images/socios3.png" class="col-10 m-0 h-75 rounded">
					</div>

					<div class="col-8">
						<!--<h4 class="text-center col-12"> Registro de Socio </h4>-->
						<form action="" method="post">
							<div class="row col-12">
								<div class="col-6">
									<div class="form-group">
										<label for="nombres">Nombres</label>
										<input type="text" name="nombres" id="nombres" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="apellidos">Apellidos</label>
										<input type="text" name="apellidos" id="apellidos" class="form-control">
									</div>
								</div>
							</div>

							<div class="row col-12">
								<div class="col-6">
									<div class="form-group">
										<label for="direccion">Dirección</label>
										<input type="text" name="direccion" id="direccion" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="telefono">Teléfono</label>
										<input type="text" name="telefono" id="telefono" class="form-control">
									</div>
								</div>
							</div>

							<div class="row col-12">
								<div class="col-6">
									<div class="form-group">
										<label for="tipoIdentificacion">Tipo Identificación</label>
										<select name="tipoIdentificacion" id="tipoIdentificacion" class="form-control">
											<option value="1">DUI</option>
											<option value="2">NIT</option>
											<option value="3">Pasaporte</option>
											<option value="4">Carnet de minoridad</option>
										</select>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="nIdentificacion">N° Identificación</label>
										<input type="text" name="nIdentificacion" id="nIdentificacion" class="form-control">
									</div>
								</div>
							</div>

							<div class="row col-12">
									<div class="col-6">
										<div class="form-group">
											<label for="usuario">Usuario</label>
											<input type="text" id="usuario" name="usuario" class="form-control">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="clave">Contraseña</label>
											<input type="password" autocomplete="false" name="clave" id="clave" class="form-control">
										</div>
									</div>
								</div>

								<div class="row col-12">
									<input type="submit" value="Registrar Socio" class="btn btn-success active ml-3" id="btnRegistrarSocio">				
								</div>

						</form>
					</div>
				</div>
				<!--<div class="row">
					<div id="fondo">

					</div>
				</div>-->
			</div>
		</div>
	</div>
</body>

</html>