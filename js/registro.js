//Campos del formulario
const registroUsuarioInput = document.getElementById('registro-usuario');
const registroCorreoInput = document.getElementById('registro-correo');
const registroContrasenaInput = document.getElementById('registro-contrasena');
const registroConfirmacionContrasenaInput = document.getElementById('registro-confirmacion-contrasena');
const span1 = document.getElementById('mostrar-registro-contrasena');
const span2 = document.getElementById('mostrar-registro-confirmacion-contrasena');
const chkTerminos = document.getElementById('registro-chkTerminos');
const btnRegistrarse = document.getElementById('registro-btnRegistrarse');
const instruccionesContrasena = document.getElementById('instrucciones_contrasena');
const instruccionesContrasena2 = document.getElementById('instrucciones_contrasena2');
const btnAceptar = document.getElementById('registro-btnAceptar');

const url = document.getElementById('url');
const webService = document.getElementById('webService');


//UI
const formulario = document.getElementById('registro-formulario');


class Usuario {

  constructor() {
    //Objeto con la información del Usuario
  }


  //Agrega datos al objeto de usuario
  datosUsuario(e) {
    usuarioObj[e.target.name] = e.target.value;
    console.log(usuarioObj);
  }
  

  registrarUsuario(e){
    //Valida y agrega un nuevo usuario a la clase Usuario
    e.preventDefault();
  
    //Extraer la información del objeto de usuario
    const {usuario, correo, contrasena, confirmacionContrasena} = usuarioObj;
    
    const data = new FormData();
    data.append('webService', webService.value);
    data.append('url', url.value);
    data.append('usuario', usuarioObj.usuario);
    data.append('correo', usuarioObj.correo);
    data.append('contrasena', usuarioObj.contrasena);
    fetch('controllers/control-usuario.php', {
      method: 'post',
      body: data
    })
      .then(function(response) {
        console.log(response);
        location.href = response.url;
    })
      .catch(function(err) {
        console.log(err);
    });
  }

  
  
}

class UI {

  //Función que habilita el botón de registro hasta que acepte los términos y condiciones
  habilitarBtnRegistro(e) {
    if (e.target == btnAceptar) {
      chkTerminos.checked=true;
    }
    if (chkTerminos.checked==true ) {
      btnRegistrarse.classList.remove('disabled');
      btnRegistrarse.classList.add('active');
    } else {
      btnRegistrarse.classList.remove('active');
      btnRegistrarse.classList.add('disabled');
    }
  }

  //Función que muestra y oculta el password en el formulario de registro
  mostrarSpan(e) {
    e.preventDefault();
    const span = e.target;
    let contrasenaInput;
    //
    if (span.parentNode.parentNode.childNodes[3] === registroContrasenaInput) {
      contrasenaInput = registroContrasenaInput;
    } else if(span.parentNode.parentNode.childNodes[3] === registroConfirmacionContrasenaInput){
      contrasenaInput = registroConfirmacionContrasenaInput;
    }
    switch (contrasenaInput.type) {
      case 'password':
        contrasenaInput.type = 'text';
        span.classList.remove('glyphicon-eye-open');
        span.classList.add('glyphicon-eye-close');
        break;
      case 'text':
        contrasenaInput.type = 'password';
        span.classList.remove('glyphicon-eye-close');
        span.classList.add('glyphicon-eye-open');
        break;
      default:
        break;
    }
  }

  validarContrasena() {
    var x = registroContrasenaInput;
    var txt = instruccionesContrasena;
    var y = registroConfirmacionContrasenaInput;
    var expreg= /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,20}/;
    txt.style.fontSize="14px";
    txt.style.fontWeight= "bold";
    if(expreg.test(x.value)){
      x.style.backgroundColor = "#89C6A4";
      txt.innerHTML= 'Contraseña segura';
      txt.style.color = "#89C6A4";
    } else {
      x.style.backgroundColor = "#FFAEAE";
      txt.style.color = "#FFAEAE";
      txt.innerHTML= 'No cumple los criterios';
      y.value="";
    }
  }

  confirmarContrasena() {
    const x = registroContrasenaInput;
    const y = registroConfirmacionContrasenaInput;
    const txt = instruccionesContrasena2;
    txt.style.fontSize="14px";
    txt.style.fontWeight= "bold";
    if(x.value !== "" && y.value !== ""){
      if(x.value != y.value){
        y.style.backgroundColor = "#FFAEAE";
        x.style.backgroundColor = "#FFAEAE";
        x.focus();
        y.value="";
        txt.style.color = "#FFAEAE";
        txt.innerHTML= 'Las contraseñas no coninciden';
      }else{
        y.style.backgroundColor = "#89C6A4";
        x.style.backgroundColor = "#89C6A4";
        txt.style.color = "#89C6A4";
        txt.innerHTML= 'Contraseñas correctas';
      }
    }
  }
}

const usuarioObj = {
  usuario: '',
  correo: '',
  contrasena: '',
  confirmacionContrasena: ''
}

const ui = new UI();
const administrarUsuario = new Usuario({...usuarioObj});


//Registro de eventos
eventListeners();
function eventListeners() {
  registroUsuarioInput.addEventListener('input', administrarUsuario.datosUsuario);
  registroCorreoInput.addEventListener('input', administrarUsuario.datosUsuario);
  registroContrasenaInput.addEventListener('input', administrarUsuario.datosUsuario);
  registroConfirmacionContrasenaInput.addEventListener('input', administrarUsuario.datosUsuario);
  formulario.addEventListener('submit', administrarUsuario.registrarUsuario);
  span1.addEventListener('click', ui.mostrarSpan);
  span2.addEventListener('click', ui.mostrarSpan);
  chkTerminos.addEventListener('click', ui.habilitarBtnRegistro);
  btnAceptar.addEventListener('click', ui.habilitarBtnRegistro);
}

