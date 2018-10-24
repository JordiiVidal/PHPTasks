<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aula
 *
 * @author dam
 */
class Aula {
        private $nombre;
        private $capacidad;
        
        function __construct(string $nombre,int $capacidad=15) {
            $this->setNombre($nombre);
            $this->setCapacidad($capacidad);
        }
        function getNombre() {
            return $this->nombre;
        }

        function getCapacidad() {
            return $this->capacidad;
        }

        function setNombre($nombre) {
            if(empty($nombre)){
                throw new Exception('Nombre vacio');
            }else{
                $this->nombre = $nombre;    
            }
            
        }

        function setCapacidad($capacidad) {
            if($capacidad<10 || $capacidad>100){
                throw new Exception('Numero no valido');
            }else{
                $this->capacidad = $capacidad;
            }
                
        }
}
try {
    $aul1 = new Aula('');
    $aula01 = new Aula('Nombre');
    $aula01->setCapacidad(19000);
} catch (Exception $exc) {
    echo $exc->getMessage()." linea ".$exc->getLine();
}



