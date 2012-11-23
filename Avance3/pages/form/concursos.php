<?
//Cargar el archivo de funciones
require_once("../../php/usuariosFunciones.php");

//Llamar funcion requerida
//Obtener datos
$usuarios = listarUsuarios();

/*echo '<pre>';
echo var_dump($usuarios);
echo '</pre>';*/
		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>CREAR CONCURSO</title>
	<link rel="stylesheet" type="text/css" href="../../css/template.css" media="screen" />
	<!-- Para el editor -->
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<!--
	<link rel="stylesheet" href="/jwysiwyg/jquery.wysiwyg.css" type="text/css" media="screen" charset="utf-8" />
	<style type="text/css" media="screen"> textarea{ width: 800px; height: 100px; } </style>
-->	
	<script language="javascript" type="text/javascript" src="../../js/concurso.js"></script>		
	

</head>
<body>
	
		<div id="page-background-glare">
		<div id="page-background-glare-image">
			<div id="main">
				<div class="marco">
					<div class="marco-tl"></div><div class="marco-tr"></div>
					<div class="marco-bl"></div><div class="marco-br"></div>
					<div class="marco-tc"></div><div class="marco-bc"></div>
					<div class="marco-cl"></div><div class="marco-cr"></div>
					<div class="marco-cc"></div>
					<div class="marco-body">
						<div class="header">
							<div class="header-center">
								<div class="header-png"></div>
								<div class="header-jpeg"></div>
							</div>
						</div>
					<div class="content-layout">
						<div class="content-layout-row">
						<div class="layout-cell content">

<!--		*********************************************** INICIA POST  ***********************************************		-->
	
						<div class="post">
							<div class="post-tl"></div><div class="post-tr"></div>
							<div class="post-bl"></div><div class="post-br"></div>
							<div class="post-tc"></div><div class="post-bc"></div>
							<div class="post-cl"></div><div class="post-cr"></div>
							<div class="post-cc"></div>
<!--		*********************************************** INICIA ENCABEZADO DE POST  ***********************************************		-->			
							<div class="post-body">
								<div class="post-inner">
									<h2 class="postheader"> 
										<span class="componentheading">CREAR CONCURSO</span>
									</h2>
								</div>
								<div class="cleared"></div>
							</div>
						</div>
						<div class="post">
						<div class="post-tl"></div> <div class="post-tr"></div>
						<div class="post-bl"></div> <div class="post-br"></div>
						<div class="post-tc"></div> <div class="post-bc"></div>
						<div class="post-cl"></div> <div class="post-cr"></div>
						<div class="post-cc"></div>
						<div class="post-body">
						<div class="post-inner">
							<div class="postcontent">
								<form name="form1" action="../../php/usuarioAltaConcurso.php" method="post" enctype="multipart/form-data">
									<fieldset>
										<legend>Datos generales</legend>
<?
//Para imprimir usuarios en un select
echo '<label for="id_usuario">Usuario que lo publica (pendiente)</label>';
echo '<select name="id_usuario">';
echo '<option selected value="0">Elije un usuario</option>';
foreach($usuarios as $clave => $valor)
	echo '<option value="',$valor['idUsuario'],'">',$valor['Usuario'],'</option>';
echo'</select>';
echo '<br /><br />';
?>
										<label for="nombre">Nombre del concurso</label>
										<input type="text" id="nombre" name="nombre" required maxlength="40" autofocus placeholder="Nombre del concurso"/><br /><br />
										<label for="fechaI">Fecha de inicio</label>
										<input type="date" id="fechaI" name="fechaI" required maxlength="10" placeholder="DD/MM/AA"/>
										<br /><br />
										<label for="fechaF">Fecha de fin</label>
										<input type="date" id="fechaF" name="fechaF" required maxlength="10" placeholder="DD/MM/AA"/>
										<br /><br />

										<select name="categoria" id="categoria" required>
										   <option selected value="0">Elige Categoria</option>
										   <option value="1">Java</option> 
										   <option value="2">C</option> 
										   <option value="3">C++</option>
										   <option value="4">C#</option> 
										   <option value="5">PHP</option> 
										   <option value="6">Perl</option>
										   <option value="7">ASP</option> 
										   <option value="8">Abierta</option>    
										</select>
										<br /><br />
										<label for="dificultad">Dificultad</label>
										<select name="dificultad" id="dificultad" required>
										   <option selected value="0">Elige una opci&oacute;n</option>
										   <option value="Basico">Basico</option> 
										   <option value="Intermedio">Intermedio</option> 
										   <option value="Avanzado">Avanzado</option>   
										</select>
										<br /><br />
										<label for="hashTag">Hashtag para Twitter</label>
										<input type="text" id="hashTag" name="hashTag" required maxlength="15" pattern="^#[a-zA-Z0-9]+" title="#nombreHashTag" placeholder="#HashTag"/>
										<br /><br />
										<label for="descripcionB">Breve descripcion</label>
										<textarea name="descripcionB" id="descripcionB" style="width: 100%;"></textarea>
										<!--<input style="width: 100%;height: 200px;"type="text" id="descripcionB" name="descripcionB" required maxlength="120" placeholder="Escriba una breve descripcion"/>-->
									</fieldset>
																									
									<fieldset>
										<legend>Datos principales</legend>
										<label for="imagen">Imagen principal del concurso</label><br />
										<input id="imagen" name="imagen" type="file" accept="image/*"/>
										<button type="button" onClick="agregaInput()">Agregar otra imagen</button>
										<br id="brClave"/><br />
										<label for="descripcion">Descripcion del concurso</label>
										<textarea name="descripcion" id="descripcion" style="width: 100%;height:300px;"></textarea>
									</fieldset>
										<!--CAMPO CUANTOS IMG AGREGO USUARIO-->
										<input type="hidden" name="contador" id="contador" value="999"/>	
										<button type="button" onClick="valida_envia()">Enviar</button>
										<button type="submit" style="display:none;" name="botonSubmit"></button>
								
								</form>
								</div>
								<div class="cleared"></div>
							</div>
							<div class="cleared"></div>
						</div>
					</div>
					
					<div class="footer">
				<div class="footer-t"></div>
				<div class="footer-l"></div>
				<div class="footer-b"></div>
				<div class="footer-r"></div>
				<div class="footer-body">
					<div class="footer-text">
						<p>Copyright © 2012. Todos Los Derechos Reservados.</p>
					</div>
					<div class="cleared"></div>
				</div>
			</div>
<!--		*********************************************** FIN PIE DE PAGINA  ***********************************************		-->						
			<div class="cleared"></div>
		</div>
	</div>
	<div class="cleared"></div>
</div>
</div>
</div>

</div>
</div>
</div>	
	
</body>
</html>
