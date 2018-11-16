<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="compra.js"></script>
</head>
<body>
 <?php 
    $server = "localhost";

    $user = "root";

    $password = "";

    $db = "futbol";

    try {

        $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);

    //Con esta línea indicamos que si hay algún error se trate como una excepción

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $jugador = filter_input(INPUT_POST, 'jugador', FILTER_SANITIZE_STRING);
        
        
        //a');delete * from category;'=("
        if(!empty($nombre)){
            $sql = "insert into equipo (nombre) values (:nombre)";
            $st = $conn->prepare($sql);
            $st->execute(['nombre'=>$nombre]);
            
             echo 'Equipo creado '.$conn->lastInsertId();
        }
        else if(!empty($jugador)){
            $sql = "insert into equipo (nombre) values (:nombre)";
            $st = $conn->prepare($sql);
            $st->execute(['nombre'=>$nombre]);
            
             echo 'Equipo creado '.$conn->lastInsertId();
        }
        $res = $conn->query("select * from equipo");
        while ($n=$res->fetch(PDO::FETCH_ASSOC)){
            ?>
            <ul>
                <form>
                    <li><?= $n['nombre']?></li>
                    <?php 
                        $resJug = $conn->query("select * from Jugadores where id_equipo = ".$n['id']);
                        while ($nJug=$resJug->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <ul>
                            <li><?= $n['nombre']?></li>
                            <li><?= $n['dorsal']?></li>
                        </ul>
                    <?php
                        }
                    ?>
                    <input type="number" name='idEquipo' value="<?php echo $n['id'] ?>" hidden>
                    <input type="text" name="jugador">
                    <input type="submit" value="Añadir Jugador">
                </form>    
            </ul>
            <?php
        }

    } catch (PDOException $e) {

        echo "Connection failed: " . $e->getMessage();

    }
?>
    <form method="POST">
        Nombre Equipo:<input type="text" name="nombre">
        <input type="submit">
    </form>
    </body>
</html>

