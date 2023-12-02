<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Registro Usuario</title>
</head>

<body>

	<!--Formulario de registro de usuarios-->
	<div class="wrapper-main" id="formRegistroUsuario">
		<div class="container-fluid">
			<div class="card col-12 mx-auto border ">
				<div class="row pt-4 pl-2 pb-4 pr-3">

					<div class="col-12">
						<!--<h4 class="text-center col-12"> Registro de Usuarios </h4>-->
						<form action="" method="post">
                        <fieldset>
			<legend><i class="far fa-address-card" ></i> &nbsp; Información personal</legend>
			
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
</fieldset>
        
<fieldset id="infoCuen">                                    
			<legend>
            <br>
            <i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
			<div class="group-form">
				<div class="row col-12">
					<div class="col-6">
						<div class="form-group">
							<label for="usuario" class="bmd-label-floating">Nombre de usuario</label>
							<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario" id="usuario" maxlength="35">
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="clave" class="bmd-label-floating">Contraseña</label>
							<input type="password" class="form-control" name="clave" id="clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="clave2" class="bmd-label-floating">Repetir contraseña</label>
							<input type="password" class="form-control" name="clave2" id="clave2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
						</div>
					</div>
				</div>
			</div>
		</fieldset >
        <fieldset id="nuevaCon">
			<legend style="margin-top: 40px;">
            <br>
            <i class="fas fa-lock"></i> &nbsp; Nueva contraseña</legend>
			<p>Para actualizar la contraseña de esta cuenta ingrese una nueva y vuelva a escribirla. En caso que no desee actualizarla debe dejar vacíos los dos campos de las contraseñas.</p>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="usuario_clave_nueva_1" class="bmd-label-floating">Contraseña</label>
							<input type="password" class="form-control" name="usuario_clave_nueva_1" id="usuario_clave_nueva_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="usuario_clave_nueva_2" class="bmd-label-floating">Repetir contraseña</label>
							<input type="password" class="form-control" name="usuario_clave_nueva_2" id="usuario_clave_nueva_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
						</div>
					</div>
				</div>
			</div>
		</fieldset>
            <fieldset>
            <legend >
            <br>    
            <i class="fas fa-medal" ></i> &nbsp; Nivel de privilegio</legend>
			<div class="group-form">
				<div class="row col-12">
					<div class="col-12">
						<p><span class="badge badge-info">Control total</span> Permisos para registrar, actualizar y eliminar</p>
						<p><span class="badge badge-success">Edición</span> Permisos para registrar y actualizar</p>
						<p><span class="badge badge-dark">Registrar</span> Solo permisos para registrar</p>
						<div class="form-group">
							<select class="form-control" name="usuario_privilegio_reg">
								<option value="" selected="" disabled="">Seleccione una opción</option>
								<option value="1">Control total</option>
								<option value="2">Edición</option>
								<option value="3">Registrar</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</fieldset>

        <fieldset id="inicio">
        <br>
			<p class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de usuario y contraseña</p>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="usuario_admin" class="bmd-label-floating">Nombre de usuario</label>
							<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_admin" id="usuario_admin" maxlength="35" required="" >
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="clave_admin" class="bmd-label-floating">Contraseña</label>
							<input type="password" class="form-control" name="clave_admin" id="clave_admin" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
						</div>
					</div>
				</div>
			</div>
		</fieldset>
        <br>
								<div class="row col-12">
									<input type="submit" value="Registrar Usuario" class="btn btn-success active ml-3" id="btnRegistrarUsuario">				
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