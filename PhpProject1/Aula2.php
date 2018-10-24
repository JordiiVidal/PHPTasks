<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aula2
 *
 * @author dam
 */
class Aula2 {
    
    private $nombre;
    private $capacidad;
    private $maxAlumno;
    private $codigo;
    
    function __construct(string $nombre,int $capacidad = 15, string $codigo) {
        $this->nombre=$nombre;
        $this->capacidad=$capacidad;
        $this->codigo = $codigo;
        $this->maxAlumno = 25;
        
    }
    function __get($name) {
        if($name == 'ratio'){
            return $this->capacidad/$this->maxAlumno;
        }
        if(property_exists('Aula2', $name)){
            return $this->$name;
        }else{
        
            throw  new Exception('propiedad no conocida');
        }
    }
    function __set($name, $value) {
        if($name =='nombre'){
            if(!empty(value)){
                $this->nombre= $value;
            }else{
                throw new Exception('El nombre no pudede');
            }
         
        }elseif ($name == 'capacidad') {
            if ($value >= 10 and $value <= 100){
                $this->capacidad = $value;
            }else{
                throw new Exception('Capacidad entre 10 y 100');
            }
        }elseif (property_exists($this, $property)) {
            
        }else{
            throw new Exception('Propiedad descon');
        }
    }
    //put your code here
}
$a=new Aula2('DAM');
echo $a->maxAlumno=50;
echo $a -> ratio;