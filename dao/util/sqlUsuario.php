<?php 

    //ingresar usuario
    define("COMPROBAR_USUARIO","SELECT s.nombre,s.apellido FROM usuario u
                                INNER JOIN socio s 
                                ON s.usuario = u.id
                                WHERE u.usuario =? AND u.clave =?");

    //ingresar usuario
    define("INGRESAR_USUARIO","INSERT INTO usuario(usuario,clave,rol) VALUES(?,?,3)");

    //ingresardatos
    define("INGRESAR_EMPLEADO",
    "INSERT INTO empleado(nombre,apellido,identificacion,usuario)
     VALUES(?,?,?,?)");

    //ingresar nuevo numero de identificacion
    define("INGRESAR_IDENTIFICACION","INSERT INTO identificacion(numero,tipoIdentificacion)
            VALUES(?,?)");

    //obtener usuario recien creado
    define("SELECCIONAR_ULTIMO_USUARIO","SELECT MAX(id) FROM usuario");

    //obtener id de identificación recien creada
    define("SELECCIONAR_ULTIMA_IDENTIFICACION","SELECT MAX(id) FROM identificacion");

    //listando empleados
    define("SELECCIONAR_TOODS_EMPLEADOS","SELECT u.usuario,nombre,apellido,i.numero,ti.tipo,u.rol
                                       FROM empleado e
                                       INNER JOIN identificacion i
                                       ON i.id = e.identificacion
                                       INNER JOIN tipoIdentificacion ti
                                       ON ti.id = i.tipoIdentificacion
                                       INNER JOIN usuario u
                                       ON u.id = e.usuario");

    //obtener claves primarias
    define("OBTENER_CLAVES_PRIMARIAS","SELECT e.id empleado ,i.id identificacion FROM empleado e
                                       INNER JOIN identificacion i 
                                       ON i.id = e.identificacion
                                       LIMIT ?,1;");

   //actualizar Empleado
    define("ACTUALIZAR_EMPLEADO","UPDATE empleado SET nombre=?,apellido=? WHERE id=?");

    //actualizar identificacion
    define("ACTUALIZAR_IDENTIFICACION","UPDATE  identificacion SET numero=?,tipoIdentificacion=? WHERE id=?");
    
    //eliminar socio
    define("ELIMINAR_EMPLEADO","DELETE FROM empleado WHERE id = ?");

    //obtener id empleado
    define("SELECCIONAR_EMPLEADO","SELECT id FROM empleado LIMIT ?,1");