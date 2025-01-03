<?php 

require_once("core/conexion.php");

class crud extends conexion{
    private   $pdo;
    public function __construct(public string $tabla)
    {
        parent::__construct();
        $this->pdo= $this->conexion();
    }


    public function consultarTodo(){

        try{
            $statement=$this->pdo->prepare("SELECT * FROM $this->tabla");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }


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


    public function crear(string $columnas, string $marcadores, array $datos){
         
     $statement=$this->pdo->prepare("INSERT INTO $this->tabla ($columnas) VALUES ($marcadores)");
     $statement->execute($datos);

    }


    
    public function modificar(string $columnas, array $datos){

        $statement=$this->pdo->prepare("UPDATE $this->tabla SET $columnas WHERE id=?");
        $statement->execute([...$datos]);
    }






}

?>
