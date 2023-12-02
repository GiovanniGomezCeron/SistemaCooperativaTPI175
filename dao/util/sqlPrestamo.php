<?php 

    //ingresar usuario
    define("OBTENER_COINCIDENCIAS","SELECT nombre,apellido FROM socio s
    INNER JOIN identificacion i 
    ON i.id = s.identificacion
    WHERE i.numero LIKE ? OR
          s.nombre LIKE '?' OR 
          s.apellido LIKE ? OR 
          s.telefono LIKE ? OR 
          s.codigoSocio LIKE ?");
