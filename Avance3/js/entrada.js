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
				//valida el link
			   	if (document.form.link.value.length==0){ 
					 crear_div("error_link","Este campo no puede quedar vacio","link"); 
			      	 document.form.link.focus();
					 ban_error=1;
			   	}
				else
					borrar_div("error_link");
				//valida la Entrada
				var objNE = new nicEditors.findEditor("entrada");
			   	if (objNE.getContent().length==4){ 
					 crear_div("error_entrada","Debe escribir la entrada","entrada"); 
			      	 //document.form.nicEditors.findEditor('entrada').focus();
					 ban_error=1;
			   	}
				else
					borrar_div("error_entrada");
				
				if(ban_error==0)
					//el formulario se envia  
				   	document.form.botonSubmit.click();
				else
					return;
			} 
