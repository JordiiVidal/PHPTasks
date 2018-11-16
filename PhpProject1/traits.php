<?php

trait HTML{
    
    public function lista($tabla){
        $res="<ul>";
        foreach ($tabla as $valor){
            
            $res.="<li>".$valor."</li>";
             
        }
        return $res."</ul>";
    }
    public function select($tabla){
        $res="<select>";
        foreach ($tabla as $valor){
            
            $res.="<option>".$valor."</option>";
             
        }
        return $res."</select>";
    }
}
trait Tablas{
    public function duplicados($tabla){
        $res = array_count_values($tabla);
        $aux = [];
        foreach ($res as $c=>$v){
            if($v>1){
                $aux[]->$c;
            }
        }
        return $aux;
    }
    public function duplicadosPro($tabla){
        return array_unique(array_diff_key($tabla, array_unique($tabla)));
    }
}

class EjemploTrait{
    use HTML;
    public $datos=[1,2,3,4];
    function __toString() {
        return $this->lista($this->datos);
    }
}

$a = new EjemploTrait();

echo $a;
