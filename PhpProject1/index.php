<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Introduc la Frase</h1>
        <form>
            <input type="text" name="frase">
            <input type="submit">
        </form>
        <?php
            echo "D10S";
            $frase = filter_input(INPUT_GET, "frase");
            if(!empty($frase)):
                if(palindromo($frase)):
                    ?>
        <p>La frase <b><?=$frase?></b> ES palindroma</p>
        <?php else: ?>
        <p>La frase <b><?=$frase?></b> No es palindroma</p>
        <?php
                endif;
            endif;
            
            function palindromo($frase){
               $frase = strtolower(str_replace('', '', $frase));
               $frase = str_replace(['á','é','í','ó','ú'], ['a','e','i','o','u'], $frase);
                return $frase == strrev($frase);
            }
            
        ?>
    </body>
</html>
