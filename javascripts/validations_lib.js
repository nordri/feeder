/*Librería de apoyo donde tendremos métodos standard de validaciones*/

//Valida presencia
//Ejemplo: validatesPresenceOf("login", "El nombre de usuario no se debe dejar vacío");
function validatesPresenceOf(field, msg){
  if(msg == undefined){msg = field + ": No se puede dejar vacío";}
  if(document.getElementById(field).value == ''){
    addError(msg);
  }
}

//Valida dos campos iguales
function validatesConfirmationOff(field1, field2, msg){
  if(msg == undefined){msg = "Las contraseñas no coinciden";}
	var p1 = document.getElementById(field1).value;
	var p2 = document.getElementById(field2).value;
	
	if (p1 != p2) {
		addError(msg);
	}
}

//Valida formato email
function validatesEmailFormatOf(field, msg){
  if(msg == undefined){msg = "Formato de email incorrecto";}
	var regex = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

	var email = document.getElementById(field).value;
	if (regex.test(email) == false) {
    addError(msg);
	} 
}


function validatesUrlFormatOf(url, msg) {
  if(msg == undefined){msg = "Url con formato incorrecto";}
   var regexp = /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
   if(regexp.test(url) == false){
     addError(msg);
   }
}

//Añadimos el error al array de errores.
function addError(msg){
  errors.push(msg);
}

//Mostramos una lista con los errores y cancelamos el envío del formulario
function showErrors(){
  if(errors.length > 0){
    var html = '<ul>';
    for(var i=0; i< errors.length; i++){
      html += '<li>' + errors[i] + '</li>';
    }
    document.getElementById('validation_errors').innerHTML= html;
    document.getElementById('validation_errors').style["display"] = ""
    return false
  }else{
    return true
  }
}