<?php

$email="erickof_dp@msn.com";

$asunto = "Concurso Pendiente";

$mensaje='<html> <head>
    <title>Concurso pendiente de ser aceptado</title>
    </head>
    <body>
<div style="font-family:Comic Sans MS;color:black;height:500px;width:600px;border:1px solid white;">
    <p style="font-size:14pt;" >Saludos</p>
	<p style="font-size:14pt;" >Tu concurso se encuentra en estado pendiente,
	en espera de ser revisado por el administrador del sitio,
	 tan pronto como este sea aceptado te lo notificaremos en un correo de respuesta.</p>
	 <p style="color:#45yu89;font-size:14pt;" >Mientras tanto puedes ver si encuentras un concurso 
	 en el que estes interesado.</p>
    <p> <a style="color:black;" href="http://alanturing.cucei.udg.mx/libweb-dev/"> Ir a la pagina 
    </a> </p>
<img style="position: absolute; top: 0px; left: 0px;" src="http://alanturing.cucei.udg.mx/libweb-dev/img/Bottom_texture.jpg" alt="Imagen genérica" />
</div>
    <br>
    </body>
    </html>';
    
    /* Para enviar correso HTML se debe especificar el Content-type header. */
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    
    if(mail($email, $asunto, $mensaje, $headers))
	echo 'correo mandado con exito';
else
	echo 'no se pudo mandar el correo';

?>