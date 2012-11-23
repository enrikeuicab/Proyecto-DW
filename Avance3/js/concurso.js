//FUNCIONES PARA AGREGAR Y QUITAR LOS CAMPOS DE IMAGEN
var i=2;
function agregaInput()
{
	br = document.createElement('br');
	br.setAttribute('id','br'+i);
	label = document.createElement('label');
	label.setAttribute('id','label'+i);
	boton = document.createElement('button');
	boton.setAttribute('type','button');
	boton.setAttribute('id','boton'+i);
	boton.setAttribute('onclick','borrarElemento('+i+')');
	textoBoton = document.createTextNode('Eliminar');
	boton.appendChild(textoBoton);
	textoLabel = document.createTextNode('Imagen '+i+' ');
	label.appendChild(textoLabel);
	input = document.createElement('input');
	input.setAttribute('type','file');
	input.setAttribute('name','tel'+i);
	input.setAttribute('id','tel'+i);
	x = document.getElementById("brClave");
	x.parentNode.insertBefore(br,x);
	x.parentNode.insertBefore(label,x);
	x.parentNode.insertBefore(input,x);
	x.parentNode.insertBefore(boton,x);
	i++;
}
function borrarElemento(i){
	x = document.getElementById('boton'+i);
	y = document.getElementById('tel'+i);
	z = document.getElementById('label'+i);
	w = document.getElementById('br'+i);
	x.parentNode.removeChild(x);
	y.parentNode.removeChild(y);
	z.parentNode.removeChild(z);
	w.parentNode.removeChild(w);
}
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
	if (document.form1.nombre.value.length==0 || document.form1.nombre.value.length>40){ 
		 crear_div("error_nombre","Este campo no puede ser nulo y no puede exceder los 40 caracteres","nombre"); 
		 document.form1.nombre.focus(); 
		 ban_error=1;
	}
	else
		borrar_div("error_nombre");
	//valida las fecha de inicio
	/*if (document.form1.fechaI.value.length==0 || !/^\d{1,2}\/\d{1,2}\/\d{2,4}$/.test(document.form1.fechaI.value)){ 
		 crear_div("error_fechaI","Este campo no puede ser nulo y debe cumplir el formato del ejemplo","fechaI"); 
		 document.form1.fechaI.focus();
		 ban_error=1;
	}
	else
		borrar_div("error_fechaI");
	//valida las fecha de fin
	if (document.form1.fechaF.value.length==0 || !/^\d{1,2}\/\d{1,2}\/\d{2,4}$/.test(document.form1.fechaF.value)){ 
		 crear_div("error_fechaF","Este campo no puede ser nulo y debe cumplir el formato del ejemplo","fechaF"); 
		 document.form1.fechaF.focus();
		 ban_error=1;
	}
	else
		borrar_div("error_fechaF");*/
	//valida el campo de categoria	
	if (document.form1.dificultad.selectedIndex==0){ 
	   crear_div("error_categoria","Debe elegir un elemento de la lista","categoria");
	   ban_error=1;
	}
	else
		borrar_div("error_categoria");
	//valida el campo de dificultad	
	if (document.form1.dificultad.selectedIndex==0){ 
	   crear_div("error_dificultad","Debe elegir un elemento de la lista","dificultad");
	   ban_error=1;
	}
	else
		borrar_div("error_dificultad");
	//valida hashtag
	if (document.form1.hashTag.value.length==0 || !/(^|\s)#(\w+)/.test(document.form1.hashTag.value)){ 
		 crear_div("error_hashtag","Este campo no puede ser nulo y debe cumplir el formato del ejemplo","hashTag"); 
		 document.form1.hashTag.focus();
		 ban_error=1;
	}
	else
		borrar_div("error_hashtag");
	//valida la descripcion breve
	var objNE = new nicEditors.findEditor("descripcionB");
	if (objNE.getContent().length==4){ 
		 crear_div("error_descB","Debe escribir una breve descripcion del concurso","descripcionB");
		 ban_error=1;
	}
	else
		borrar_div("error_descB");
	//valida la imagen
	if (document.form1.imagen.value.length==0){ 
		 crear_div("error_imagen","Debe seleccionar una imagen que representara el concurso","imagen"); 
		 document.form1.imagen.focus(); 
		 ban_error=1;
	}
	else
		borrar_div("error_imagen");
	//valida la descripcion
	var objNE = new nicEditors.findEditor("descripcion");
	if (objNE.getContent().length==4){ 
		 crear_div("error_desc","Debe escribir una descripcion del concurso","descripcion");
		 ban_error=1;
	}
	else
		borrar_div("error_desc");
	
	if(ban_error==0)
	{
		//se cuentan los input tipo file que quedaron al final
		var contador = 0;
		input = document.getElementsByTagName('input');
		for(var i in input) 
		{
			//console.log(input[i]);
			if(input[i].type=="file")
				contador++;
		}
		//asignando contador a input para que sea enviado
		document.form1.contador.value = contador;
		//el formulario se envia  
		document.form1.botonSubmit.click();
	}
	else
		return;
} 
