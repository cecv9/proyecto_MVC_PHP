<?php
class conexion{

    public function __construct(

        public string $driver = "mysql",
        public string $host = "localhost",
        public string $user = "root",
        public string $pass = "",
        public string $database = "sunny_side",
        public string $charset = "utf8mb4"
    ){}



        public function conexion(){

            try{
                
                $dsn = "$this->driver:host=$this->host;dbname=$this->database;charset=$this->charset";
                $pdo = new PDO($dsn, $this->user, $this->pass);
              

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores con excepciones
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de obtención predeterminado
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Usar sentencias preparadas reales


                return $pdo;


            }catch(PDOException $mensaje){
                throw new Exception("Error de conexión a la base de Datos: " . $mensaje->getMessage());
            }
        }

        


    }



   


?>