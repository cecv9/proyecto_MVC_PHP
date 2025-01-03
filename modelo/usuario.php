<?php 
require_once("core/crud.php");

class Usuario extends crud{


    public function __construct(

        public int $id=0,
        public string $nombre="",
        public string $apellido="",
        public  string $telefono="",
        public int $edad=0
    )
    {
        parent::__construct("usuarios");

    }



    public function insertar(){

        $this->crear("id,nombre,apellido,telefono,edad", "?,?,?,?,?" ,[$this->id,$this->nombre,$this->apellido,$this->telefono,$this->edad]);

    }


    public function actualizar(){

        $this->modificar("nombre=?,apellido=?,telefono=?,edad=?",[$this->nombre,$this->apellido,$this->telefono,$this->edad,$this->id]);
    }


    public function eliminar(){

        $this->delete($this->id);
    }





    // ========================
    // Getters y Setters
    // ========================

    // Getter y Setter para id
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter y Setter para nombre
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    // Getter y Setter para apellido
    public function getApellido(): string {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    // Getter y Setter para telefono
    public function getTelefono(): string {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    // Getter y Setter para edad
    public function getEdad(): int {
        return $this->edad;
    }

    public function setEdad(int $edad): void {
        $this->edad = $edad;
    }

}



?>