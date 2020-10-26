//Campos del formulario
const usuarioInput = document.querySelector('#usuario');
const contrasenaInput = document.querySelector('#contrasena');

//UI
const formulario = document.querySelector('#login');

class Usuario {
  constructor() {

  }
}

class UI {
  imprimirAlerta(mensaje, tipo) {
    //Crear el div
    const divMensaje = document.createElement('div');
    divMensaje.style.fontSize="14px";
    divMensaje.style.fontWeight= "bold";

    if (tipo === 'error') {
      contrasenaInput.style.backgroundColor = "#FFAEAE";
      divMensaje.style.color = "#FFAEAE";

    } else {
      contrasenaInput.style.backgroundColor = "#89C6A4";
      divMensaje.style.color = "#89C6A4";

    }
    //Mensaje de error
    divMensaje.innerHTML = mensaje;

    //Agregar al DOM
    document.querySelector('#').insertBefore(divMensaje, document.querySelector('#'))

  }
}

const ui = new UI();


//Registrar de eventos
eventListeners();
function eventListeners() {
  usuarioInput.addEventListener('input', datosUsuario);
  contrasenaInput.addEventListener('input', datosUsuario);

  formulario.addEventListener('submit', login);
}

const usuarioObj = {
  usuario: '',
  contrasena: ''
}

function datosUsuario(e) {
  usuarioObj[e.target.name] = e.target.value;
  console.log(usuarioObj);
}

// Valida y hace login
function login(e) {
  e.preventDefault();

  //Extrae la información del usuario del form
  const { usuario, contrasena } = usuarioObj;

  //validar
  var expreg= /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,20}/;
  if (expreg.test(contrasenaInput.value)) {
    ui.imprimirAlerta('No cumple con los criterios', 'error');
    return;
  }
  
}