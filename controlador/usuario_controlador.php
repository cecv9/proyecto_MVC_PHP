<?php 
require_once("modelo/usuario.php");
class UsuarioControlador extends Usuario{
    

        public function __construct(
   
        )
        {
            session_start(); // Inicia la sesión si no está iniciada
            parent::__construct();
        }

        public function indexUsuarios(){

            require_once("vista/usuarios.php");

        }

        public function mostrarUsuario(){

           
            if(isset($_REQUEST["id"])){
                $id = isset($_GET["id"]) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null;

                if ($id !== null && $id !== false) {
                    $usuario = $this->consultarUno($id);
                    if ($usuario === null) {
                       $_SESSION['flash'] = ['error' => 'Usuario no encontrado.'];
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    $usuario = new Usuario();
                }
            
                // Generar un token CSRF para el formulario
                $csrf_token = $this->generateCSRFToken();
                
                // Pasar el token al formulario
                require_once("vista/usuario_formulario.php");



        }
    }

        public function guardar(){
        // Verificación CSRF (METODO QUE IMPLEMENETE LA PROTECCION CSRF)
         if (!$this->verifyCSRFToken($_POST['csrf_token'])) {
            $_SESSION['flash'] = ['error' => 'Error de seguridad detectado.'];
        header("Location:index.php");
     
    }
        // Validación y sanitización de datos (DEL FORMULARIO  DEL FRONTEND)
         $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
         $nombre = strip_tags($_POST['nombre']); // Elimina tags HTML
         $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); // Convierte caracteres especiales a entidades HTML xd
         $apellido = strip_tags($_POST['apellido']);
        $apellido = htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8');
         $telefono = strip_tags($_POST['telefono']);
         $telefono = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
         $edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT, ["options" => ["min_range"=>0, "max_range"=>150]]);

          if($nombre && $apellido && $telefono && $edad !== false){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->edad = $edad;
            $this->id>0?$this->actualizar():$this->insertar();
            header("Location:index.php");
            exit();
        }

    }


        public function eliminar(){

            //$this->delete($_REQUEST["id"]);

            $id=$_REQUEST["id"];
            $this->delete($id);
            header("Location:index.php");

        }



}


?>