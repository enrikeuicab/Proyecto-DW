<?php

	//Conectarse a la base de datos
	require_once("inc/bdConexion.inc");
	$con = new mysqli($host,$user,$pass,$bd);

	//Verificar conexion
	if($con -> connect_error)
		die('Error de Conexion');

	//Variables
	
	//Siguiente linea temporal, sera modificada cuando use sesiones
	$id_usuario = $_POST["id_usuario"];

	$nombreConcurso = $_POST["nombre"];
	$fechaI = $_POST["fechaI"];
	$fechaF = $_POST["fechaF"];
	$categoria = $_POST["categoria"];
	$hashtag = $_POST["hashTag"];
	$dificultad = $_POST["dificultad"];
	$descripcionB = $_POST["descripcionB"];
	//$descripcion = $_POST["descripcion"];
	$descripcion = $_POST["descripcion"];
	$estatus = "Pendiente";
	$contadorImg = $_POST["contador"];

        echo "$id_usuario, $nombreConcurso, $fechaI, $fechaF, $categoria, $hashtag, $dificultad, $descripcionB, $descripcion, $estatus , $contadorImg";

	//PARA LAS IMAGENES
	//Se define el tamaño que se permitirá (en KB por eso lo multiplicamos por 1024)
	$tamanioPermitido = 500 * 1024;

	//Tenemos una lista con las extensiones que aceptaremos
	$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");
	echo '<pre>'.var_dump($_FILES).'</pre>';
	//Obtenemos la extensión del archivo
	$extencion = explode(".", $_FILES["imagen"]["name"]);
	$extension = end($extencion);

	//Validamos el tipo de archivo, el tamaño en bytes y que la extensión sea válida
	if ((($_FILES["imagen"]["type"] == "image/gif")
	      || ($_FILES["imagen"]["type"] == "image/jpeg")
	      || ($_FILES["imagen"]["type"] == "image/png")
	      || ($_FILES["imagen"]["type"] == "image/pjpeg"))
	      && ($_FILES["imagen"]["size"] < $tamanioPermitido)
	      && in_array($extension, $extensionesPermitidas)){
		      //Si no hubo un error al subir el archivo temporalmente
		      if ($_FILES["imagen"]["error"] > 0){
		             echo "Return Code: " . $_FILES["imagen"]["error"] . "<br />";
		      }
		      else{
		            //Si el archivo ya existe se muestra el mensaje de error
		            if (file_exists("../img/" . $_FILES["imagen"]["name"])){
		                   echo $_FILES["imagen"]["name"] . " already exists. ";
		            }
		            else{
		                   //Se mueve el archivo de su ruta temporal a una ruta establecida
		                   @copy($_FILES["imagen"]["tmp_name"],"../img/" /*. $_FILES["imagen"]["name"]*/);
		                   /*move_uploaded_file($_FILES["imagen"]["tmp_name"],
		                           "../img/" . $_FILES["imagen"]["name"]);*/
		                   echo "Archivo almacenado en: " . "../img/" . $_FILES["imagen"]["name"];
		            }
		      }
	}
	else{
	     echo "Archivo inválido";
	}	


	//Creo la consulta
	$mi_query = "insert into Concurso (idUsuario, Nombre, DescripcionBreve, Descripcion, Hashtag, Dificultad, FechaInicio, FechaFin, Estatus) values ($id_usuario,'$nombreConcurso','$descripcionB','$descripcion','$hashtag','$dificultad','$fechaI','$fechaF','$estatus')";

	//Ejecuto la consulta
	$resultado = $con -> query($mi_query);
	// verificamos que no haya error
	if (!$mi_query)
		echo 'La consulta contiene errores';

	//Cierro la conexion
	$con -> close();

	//
	//header("Location: http://alanturing.cucei.udg.mx/libweb-dev/");
	//header("Refresh: 4; url=http://alanturing.cucei.udg.mx/libweb-dev/");
?>
