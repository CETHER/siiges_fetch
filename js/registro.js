class Usuario {
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

/* //validar
var expreg= /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,20}/;
if (expreg.test(contrasenaInput.value)) {
  ui.imprimirAlerta('No cumple con los criterios', 'error');
  return;
} */