<?php 

require_once("core/conexion.php");

class crud extends conexion{
    /**
     * Class constructor.
     *
     * @param string $tabla The name of the table to be used in CRUD operations.
     */
    private   $pdo;
    public function __construct
    (
        public string $tabla
    )
    {
        parent::__construct();
        $this->pdo= $this->conexion();
    }

    /**
     * ConsultarTodo method retrieves all records from the specified table.
     *
     * This method prepares and executes a SQL SELECT statement to fetch all records
     * from the table defined by the $this->tabla property. It returns the results
     * as an array of objects.
     *
     * @return array An array of objects representing the records in the table.
     * @throws PDOException If there is an error executing the SQL statement.
     */

    public function consultarTodo(){

        try{
            $statement=$this->pdo->prepare("SELECT * FROM $this->tabla");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }


    /**
     * Consults a single record from the database table based on the provided ID.
     *
     * @param int $id The ID of the record to be consulted.
     * @return object|false Returns an object representing the record if found, or false if not found.
     * @throws PDOException If there is an error executing the query.
     */
    public function consultarUno(int $id){

        try{
            $statement=$this->pdo->prepare("SELECT * FROM $this->tabla WHERE id=?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }


    public function delete(int $id){

        try{
            $statement=$this->pdo->prepare("DELETE FROM $this->tabla WHERE id=?");
            $statement->execute([$id]);

        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }

    /**
     * Inserts a new record into the database table.
     *
     * @param string $columnas   A comma-separated string of column names.
     * @param string $marcadores A comma-separated string of placeholders for the values.
     * @param array  $datos      An associative array of data to be inserted, where the keys match the placeholders.
     *
     * @return void
     */

    public function crear(string $columnas, string $marcadores, array $datos){
         
     $statement=$this->pdo->prepare("INSERT INTO $this->tabla ($columnas) VALUES ($marcadores)");
     $statement->execute($datos);

    }


    
    public function modificar(string $columnas, array $datos){

        $statement=$this->pdo->prepare("UPDATE $this->tabla SET $columnas WHERE id=?");
        $statement->execute([...$datos]);
    }




    public function generateCSRFToken() {
        if (empty($_SESSION['csrf_token'])) {
            // Generamos un token único usando una combinación de md5 y uniqid con microtime para mayor entropía
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['csrf_token_expiry'] = time() + 3600; // Token válido por 1 hora
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Verifica si el token CSRF enviado es válido
     * 
     * @param string $token El token CSRF a verificar
     * @return bool True si el token es válido, false en caso contrario
     */
    public function verifyCSRFToken($token) {
        if (!empty($_SESSION['csrf_token']) 
        && hash_equals($_SESSION['csrf_token'], $token) 
        && $_SESSION['csrf_token_expiry'] >= time()) {
        // Si el token es válido y no ha expirado, lo regeneramos
        $this->generateCSRFToken();
        return true;
    }
    return false;
    }




}

?>
