//FUNCIONES PARA AGREGAR O QUITAR DIVS
function crear_div(id_div,texto,id_contenedor){
	if (document.getElementById(id_div) == null) {
		br = document.createElement('br');
		div = document.createElement('div');
		div.setAttribute('id', id_div);
		div.setAttribute('style', "color:red");
		textoDiv = document.createTextNode(texto);
		div.appendChild(textoDiv);
		x = document.getElementById(id_contenedor);
		x.parentNode.insertBefore(div, x);
	}
}
function borrar_div(id_div){
	if (document.getElementById(id_div) != null) {
		x = document.getElementById(id_div);
		x.parentNode.removeChild(x);
	}
}

//FUNCIONES DE VALIDACION DE CAMPOS
function valida_envia(){
	ban_error=0; 
	//valida el nombre del concurso 
	if (document.form1.nombre.value.length==0 || document.form1.nombre.value.length>60){ 
		 crear_div("error_nombre","Este campo no puede ser nulo y no puede exceder los 60 caracteres","nombre"); 
		 document.form1.nombre.focus(); 
		 ban_error=1;
	}
	else
		borrar_div("error_nombre");
	//valida el correo 
	if (!(/^[0-9a-zA-Z_\-\.]+@[0-9a-zA-Z\-\.]+\.[a-z]{2,4}$/.test(document.form1.email.value))){ 
		 crear_div("error_email","Por favor ingrese su correo valido para una respuesta a su mensaje","email"); 
		 document.form1.email.focus(); 
		 ban_error=1;
	}
	else
		borrar_div("error_email");
	//valida la descripcion breve
	var objNE = new nicEditors.findEditor("mensaje");
	if (objNE.getContent().length==4){ 
		 crear_div("error_mensaje","Debe escribir su mensaje","mensaje");
		 ban_error=1;
	}
	else
		borrar_div("error_mensaje");
	
	if(ban_error==0)
		//el formulario se envia  
		document.form1.botonSubmit.click();
	else
		return;
} 

