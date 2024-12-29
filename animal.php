<?php

include_once("crud.php");

class Animal extends crud{

    public function __construct(

        public int $id=0,
        public string $nombre= "",
        public string $raza= "",
        public string $sexo= "",
        public string $color = "",
        public int $edad=0
    )
    {
        parent::__construct("Animal");
    }


    public function insertar(){

        $this->crear("id,nombre,raza,sexo,color,edad", "?,?,?,?,?,?" ,[$this->id,$this->nombre,$this->raza,$this->sexo,$this->color,$this->edad]);
    }




}




?>