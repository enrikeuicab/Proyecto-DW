<?php

/*
*@return array
*Esta funcion busca usuarios y los lista
*/

function listarUsuarios(){

	//Conectarse a la base de datos
	require_once("inc/bdConexion.inc");
	$con = new mysqli($host,$user,$pass,$bd);

	//Verificar conexion
	if($con -> connect_error)
		die('Error de Conexion');

	//Creo la consulta
	$mi_query = "select * from Usuario";

	//Ejecuto la consulta
	$resultado = $con -> query($mi_query);

	//Cierro la conexion
	$con -> close();

	//Convierto el resultado a un arreglo
	if($resultado -> num_rows >= 1)
	{
		//$datos = $resultado -> fetch_array(MYSQLI_ASSOC);
		while($fila = $resultado -> fetch_assoc())
			$datos[]= $fila;
	}

	//Regreso la matriz
	return $datos;
}

/*
*@param int $id del usuario
*Esta funcion busca usuarios y los lista
*/

function eliminarUsuarios($id){
	//Conectarse a la base de datos
	require_once("bdConexion.inc");
	$con = new mysqli($host,$user,$pass,$bd);

	//Verificar conexion
	if($con -> connect_error)
		die('Error de Conexion');

	//Creo la consulta
	$mi_query = "delete from usuario where idusuario = $id";

	//Ejecuto la consulta
	$resultado = $con -> query($mi_query);

	//Cierro la conexion
	$con -> close();
}

/*
*@param int $id del usuario
*@return array $datos del usuario
*Esta funcion consulta usuarios y los lista
*/

function consultaUsuarios($id){

	//Conectarse a la base de datos
	require_once("bdConexion.inc");
	$con = new mysqli($host,$user,$pass,$bd);

	//Verificar conexion
	if($con -> connect_error)
		die('Error de Conexion');

	//Creo la consulta
	$mi_query = "select * from usuario where idusuario = $id";

	//Ejecuto la consulta
	$resultado = $con -> query($mi_query);

	//Cierro la conexion
	$con -> close();

	//Convierto el resultado a un arreglo
	if($resultado -> num_rows >= 1)
	{
		//$datos = $resultado -> fetch_array(MYSQLI_ASSOC);
		while($fila = $resultado -> fetch_assoc())
			$datos[]= $fila;
	}

	//Regreso la matriz
	return $datos;
	
}
?>
