<?php
  /**
  * Clase que gestiona métodos de la tabla usuarios
  */

  require_once "base-catalogo.php";
  require_once "modelo-persona.php";
  require_once "modelo-rol.php";
  require_once "modelo-modulo-rol.php";
  require_once "modelo-modulo.php";
  define( "TABLA_USUARIOS", "usuarios" );

  class Usuario extends Catalogo
  {
    protected $id;
    protected $persona_id;
    protected $rol_id;
    protected $usuario;
    protected $contrasena;
    protected $estatus;
    protected $token_notificaciones;

    const USUARIO_BAJA = 0;
    const USUARIO_REGISTRADO = 1;
    const USUARIO_ACTIVADO = 2;
    const USUARIO_REGULAR = 3;

    const USUARIO_WEBSERVICE = -1;

    public static $USUARIO_ESTATUS = [
      0 => "BAJA" ,
      1 => "REGISTRADO" ,
      2 => "ACTIVADO",
      3 => "REGULAR"
    ];

    // Constructor
    public function __construct( )
    {
      parent::__construct( );
    }

    // Función para asignar atributos de la clase
    public function setAttributes( $parametros = array( ) )
    {
      foreach( $parametros as $atributo=>$valor )
      {
        $this->{$atributo} = $valor;
      }
    }

    // Método para validar inicio de sesión
    public function validarInicioSesion( )
    {
      $this->contrasena = md5( $this->contrasena );
      $sql = "select * from " . TABLA_USUARIOS . " where binary usuario='$this->usuario' and binary contrasena='$this->contrasena' and estatus>1 and deleted_at is null";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      $this->id = null;
      
      if( $max>0 )
      {
        $res->data_seek( 0 );
        $obj = $res->fetch_object( );

        $this->id = $obj->id;
        $this->persona_id = $obj->persona_id;
        $this->rol_id = $obj->rol_id;
        $this->usuario = $obj->usuario;

        if(	$this->persona_id )
        {
          $persona = new Persona( );
          $persona->setAttributes( ["id"=>$this->persona_id] );
          $resultadoPersona = $persona->consultarId( );
          unset( $persona );
        }
        $modulosRoles = array( );
        if( $this->rol_id )
        {
          $rol = new Rol( );
          $rol->setAttributes( ["id"=>$this->rol_id] );
          $resultadoRol = $rol->consultarId( );
          unset( $rol );
          // consulta de los modulos y acciones que cada rol puede ejecutar
          $modulos_roles = new ModuloRol();
          $resultadoModulosRoles = $modulos_roles->consultarPor("modulos_roles",["rol_id"=>$this->rol_id],"*");

          foreach ($resultadoModulosRoles["data"] as $modulo) {
            $modulos = new Modulo();
            $modulos->setAttributes(["id"=>$modulo["modulo_id"]]);
            $RespuestaModulo = $modulos->consultarId();
            $moduloNuevo["modulo_id"] = $modulo["modulo_id"];
            $moduloNuevo["accion"] = $modulo["accion"];
            $moduloNuevo["modulo"]["id"] = $RespuestaModulo["data"]["id"];
            $moduloNuevo["modulo"]["nombre"] = $RespuestaModulo["data"]["nombre"];
            $moduloNuevo["modulo"]["descripcion"] = $RespuestaModulo["data"]["descripcion"];
            array_push($modulosRoles,$moduloNuevo);
          }
        }

        session_start( );
        $_SESSION["id"] = $this->id;
        $_SESSION["persona_id"] = $this->persona_id;
        $_SESSION["rol_id"] = $this->rol_id;
        $_SESSION["usuario"] = $this->usuario;
        $_SESSION["nombre"] = $resultadoPersona["data"]["nombre"];
        $_SESSION["apellido_paterno"] = $resultadoPersona["data"]["apellido_paterno"];
        $_SESSION["apellido_materno"] = $resultadoPersona["data"]["apellido_materno"];
        $_SESSION["nombre_rol"] = $resultadoRol["data"]["descripcion"];
        $_SESSION["modulos"] = $modulosRoles;

        $resultado = array(
          "status"=>"200",
          "message"=>"OK",
          "data"=>array(
            "id"=>$this->id,
            "persona_id"=>$this->persona_id,
            "rol_id"=>$this->rol_id,
            "usuario"=>$this->usuario,
            "persona"=>$resultadoPersona["data"],
            "rol"=>$resultadoRol["data"],
            "modulos"=>$modulosRoles) );
      }
      else
      {
        $resultado = array(
          "status"=>"404",
          "message"=>"Verifique los datos de inicio de sesión.",
          "data"=>"" );
      }

      $res->close( );
      $this->mysqli->close( );
      return $resultado;
    }
  }
?>
