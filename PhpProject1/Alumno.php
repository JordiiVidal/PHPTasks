<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alumno
 *
 * @author dam
 */
class Alumno {
     private $nombre;
     //private $edad;
     private $anyo;
     
     function getNombre() {
         return $this->nombre;
     }

     function getEdad() {
         return date('Y')-$this->anyo;
     }

     function setNombre($nombre) {
         if(empty($nombre)){
             throw new Exception('Vacio no');
         }else{
            $this->nombre = $nombre;
         }       
     }

     function setEdad($edad) {
         if($edad >18){
            $this->anyo = date('Y')-$edad;
         }else{
             throw new Exception('Numero no valido');
         }      
     }
}
try{

    $alumno1 = new Alumno();
    $alumno1->setEdad(19);
    $alumno1->setNombre('pedor');
    echo $alumno1->getEdad();
    //echo $alumno1->nombre;//aunque haya un atru¡ibuto privado con el __get permite ver
    
} catch (Exception $exc) {
    $exc->getMessage()." linea ".$exc->getLine();
}

