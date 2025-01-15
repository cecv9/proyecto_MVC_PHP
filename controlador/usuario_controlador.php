<?php 
require_once("modelo/usuario.php");
class UsuarioControlador extends Usuario{
    

        public function __construct()
        {
            parent::__construct();
        }

        public function indexUsuarios(){

            require_once("vista/usuarios.php");

        }

        public function mostrarUsuario(){

           
            if(isset($_REQUEST["id"])){
                $usuario=$this->consultarUno($_REQUEST["id"]);
            }else{
                $usuario= $this;
            }
            require_once("vista/usuario_formulario.php");



        }

        public function guardar(){

            $this->id=$_POST["id"];
            $this->nombre=$_REQUEST["nombre"];
            $this->apellido=$_REQUEST["apellido"];
            $this->telefono=$_REQUEST["telefono"];
            $this->edad=$_REQUEST["edad"];
            $this->id>0?$this->actualizar():$this->insertar();
            header("Location:index.php");
            exit();
        }


        public function eliminar(){

            //$this->delete($_REQUEST["id"]);

            $id=$_REQUEST["id"];
            $this->delete($id);
            header("Location:index.php");

        }



}


?>