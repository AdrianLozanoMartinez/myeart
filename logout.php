<?php
	session_start();    

	//BORRA SOLO LA SECCIÓN
	unset($_SESSION['email']); 

	//BORRA TODAS LAS SECCIONES INCLUSO EL DE PRODUCTO
	// $_SESSION = array();
	// session_destroy();	// eliminar la sesion

	header("Location: index.php");


    MAÑANA HACER QUE SE VEA EL USUARIO EN LA BARRA DE TAREAS, PONER QUE SE PUEDA USAR LOGOUT Y REGISTRAR