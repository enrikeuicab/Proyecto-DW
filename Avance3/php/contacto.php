<?php

//Obteniendo datos del que manda mensaje
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];

echo "nombre: $nombre";

//CORREO DEL ADMINISTRADOR
$emailAdmin="erickof_dp@msn.com";

//CORREO DE PRUEBA
//$emailAdmin="erickof_dp@msn.com";

//Asunto y mensaje del correo
$asunto = "Contacto de Concursos de Programacion";
$mensaje='<html> <head>
    </head>
    <body>
<div style="font-family:Comic Sans MS;color:black;height:500px;width:600px;">
    <p style="font-size:14pt;" >El usuario '.$nombre.' te envio el siguiente mensaje</p>
	<p style="font-size:14pt;" >'.$mensaje.'</p>
	 <p style="color:#45yu89;font-size:14pt;" >Su correo electronico: '.$email.'</p>
    <p> <a style="color:black;" href="http://alanturing.cucei.udg.mx/libweb-dev/"> Ir a la pagina
    </a> </p>
</div>
    <br>
    </body>
    </html>';

    // Para enviar correso HTML se debe especificar el Content-type header. 
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    if(mail($emailAdmin, $asunto, $mensaje, $headers))
    	echo '<p>Correo enviado</p>';
    else
	echo '<p>Actualmente tenemos problemas para contactar al administrador. Intentalo mas tarde</p>';

    echo '<p> <a style="color:black;" href="http://alanturing.cucei.udg.mx/libweb-dev/"> Ir a la pagina principal.
    </a> </p>';

?>

