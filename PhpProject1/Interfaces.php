<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Interfaces
 *
 * @author dam
 */

trait utilsPrecio{
    public $iva =.21;
    public function PVP(){
        return $this->precio*(1+$this->iva);
    }
}

interface precios{
    
    public function pvp();
    public function descuento();
    
}
class Cd implements precios{
    
    public function pvp(){
        return 89;
    }
    public function descuento(){
        return 89;
    }
    
}
