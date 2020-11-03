//Campos del formulario
const registroUsuarioInput = document.getElementById('registro-usuario');
const registroCorreoInput = document.getElementById('registro-correo');
const registroContrasenaInput = document.getElementById('registro-contrasena');
const registroConfirmacionContrasenaInput = document.getElementById('registro-confirmacion-contrasena');
const span1 = document.getElementById('mostrar-registro-contrasena');
const span2 = document.getElementById('mostrar-registro-confirmacion-contrasena');


//UI
const formulario = document.getElementById('registro-formulario');


class Usuario {

}

class UI {

}

const ui = new UI();
const administrarUsuario = new Usuario();

//Registro de eventos
eventListeners();
function eventListeners() {
  registroUsuarioInput.addEventListener('input', datosUsuario);
  registroCorreoInput.addEventListener('input', datosUsuario);
  registroContrasenaInput.addEventListener('input', datosUsuario);
  registroConfirmacionContrasenaInput.addEventListener('input', datosUsuario);
  formulario.addEventListener('submit', nuevoUsuario);
  span1.addEventListener('click', mostrarSpan);
  span2.addEventListener('click', mostrarSpan);
}

//Objeto con la información del Usuario
const usuarioObj = {
  usuario: '',
  correo: '',
  contrasena: '',
  confirmacionContrasena: ''
}

//Agrega datos al objeto de cita
function datosUsuario(e) {
  usuarioObj[e.target.name] = e.target.value;
}

function nuevoUsuario(e) {
  e.preventDefault();

  //Extraer la información del objeto de usuario
  const {usuario, correo, contrasena, confirmacionContrasena} = usuarioObj;

  //validar
}

function mostrarSpan(e) {
  const span = e.target;
  console.log(span);
  console.log(registroContrasenaInput);
  if (span.parentNode === registroContrasenaInput) {
    if (registroContrasenaInput.type === "password") {
      registroContrasenaInput.type = "text";
      span.classList.remove("glyphicon-eye-open");
      span.classList.add("glyphicon-eye-close");
    } else {
      registroContrasenaInput.type = "password";
      span.classList.remove("glyphicon-eye-close");
      span.classList.add("glyphicon-eye-open");
    }
  }
}

/* function hideOrShowPassword(){
  var password1,password2,check;

  password1=document.getElementById("registro-contrasena");
  password2=document.getElementById("registro-confirmacion-contrasena");
  check = document.getElementById("ver");

  if(check.checked==true) // Si la checkbox de mostrar contraseña está activada
  {
      password1.type = "text";
      password2.type = "text";
  }
  else // Si no está activada
  {
      password1.type = "password";
      password2.type = "password";
  }
} */

/* class Usuario {
  constructor() {

  }
}

const usuarioObj = {
  usuario: '',
  contrasena: ''
}


function datosUsuario(e) {
  usuarioObj[e.target.name] = e.target.value;
  console.log(usuarioObj);
}

//Extrae la información del usuario del form
const { usuario, contrasena } = usuarioObj;

//validar
var expreg= /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,20}/;
if (expreg.test(contrasenaInput.value)) {
  ui.imprimirAlerta('No cumple con los criterios', 'error');
  return;
} 

var Usuarios = {};

Usuarios.validacionContrasena = function () {
  var contrasena = $('#registro-contrasena').val();
  var confirmacionContrasena = $('#registro-confirmacion-contrasena').val();
  var mensaje = "";

  if(!contrasena){
    return false;
  }
  if(contrasena !== confirmacionContrasena){
    mensaje += "Constraseñas diferentes";
    $('#registro-contrasena').css("background-color", "#FFAEAE");
    $('#registro-confirmacion-contrasena').css("background-color", "#FFAEAE");
}else if( contrasena.length && contrasena.length < 5){
    mensaje += " Contraseña muy corta";
    $('#registro-contrasena').css("background-color", "#FFAEAE");
    $('#registro-confirmacion-contrasena').css("background-color", "#FFAEAE");
  }else if(contrasena.length > 20){
    mensaje += " Contraseña muy larga";
    $('#registro-contrasena').css("background-color", "#FFAEAE");
    $('#registro-confirmacion-contrasena').css("background-color", "#FFAEAE");
  }else{
    $('#registro-contrasena').css("background-color", "#89C6A4");
    $('#registro-confirmacion-contrasena').css("background-color", "#89C6A4");
  }

  return mensaje;
};

Usuarios.mostrarMensaje = function (mensaje,tipo){
  if("success"== tipo){
    $('#registro-mensaje').removeClass("alert alert-danger").addClass("alert alert-success");
  }else if("error" == tipo){
    $('#registro-mensaje').removeClass("alert alert-success").addClass("alert alert-danger");
  }
  $('#registro-mensaje').text("");
  $('#registro-mensaje').text(mensaje);
  $('#registro-mensaje').show();
};
Usuarios.ocultarMensaje = function(){
    $('#registro-mensaje').hide();
};


Usuarios.registro = function (ev) {
  ev.preventDefault(); //Evita el envío del formulario hasta comprobar
Usuarios.ocultarMensaje();
  var resultado = Usuarios.validacionContrasena();
  if (resultado.length){
  Usuarios.mostrarMensaje(resultado,"error");
  }else{
    if($('#registro-chkTerminos').length && !$('#registro-chkTerminos').is(':checked')){
      Usuarios.mostrarMensaje("Por favor acepte terminos y condicioes");
    }else{
      $( "#registro-formulario" ).unbind('submit').submit();
    }
  }
};

Usuarios.aceptarTerminos = function(){
  $('#registro-chkTerminos').prop( "checked", true );
};

$(document).ready(function ($) {
  $( "#registro-formulario" ).on('submit',Usuarios.registro );
  $('#registro-btnAceptar').on('click', Usuarios.aceptarTerminos);
});
 */