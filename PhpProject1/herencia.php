<?php
    class Producto{
        public $nombre;
        public $precio;
        
        function __construct($nombre,$precio){
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
        function resumen(){
            return $this->nombre.' '. $this->precio;
        }
    }
    
    class Libro extends Producto{
        public $paginas;
        
        function __construct($nombre, $precio,$paginas) {
            parent::__construct($nombre, $precio);
            $this->paginas = $paginas;
        }
                function resumen(){
            return parent::resumen()." ".$this->paginas;
        }
    }
    
    $libro = new Libro('nombtr','precio',212);
    
    var_dump($libro);
    
    echo $libro->resumen();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

