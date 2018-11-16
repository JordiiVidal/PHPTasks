<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author dam
 */
class Product {
    //put your code here
    
    public $nombre;
    public $precio;
    public static $iva;
    
    function __construct($nombre, $precio = 0){
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    
    function resumen(){
        return $this->nombre."".$this->precio;
    }
    
    function pvp(){
        return $this->precio * 1.21;
    }
    
}
echo "<pre>";
$a = new Product("Torbillo", 20);
$b = new Product("Tuerca");
echo "</pre>";