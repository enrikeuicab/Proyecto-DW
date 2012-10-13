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
function valida_envia(){
	ban_error=0; 
	//valida el motivo
	var objNE = new nicEditors.findEditor("motivo");
	if (objNE.getContent().length==4){ 
		 crear_div("error_motivo","Debe escribir un motivo","motivo");
		 ban_error=1;
	}
	else
		borrar_div("error_motivo");
	
	if(ban_error==0)
		//el formulario se envia  
		document.form.botonSubmit.click();
	else
		return;
} 
