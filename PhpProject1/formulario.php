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

    $db = "shakira";

    try {

        $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);

    //Con esta línea indicamos que si hay algún error se trate como una excepción

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_STRING);
        
        //a');delete * from category;'=("
         $delte = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        
        if(!empty($delte)){
            $sql = "delete from category where id = :delete";
            $st = $conn->prepare($sql);
            $st->execute(['id'=>$id]);
        }
        else if(!empty($nombre)){
            $sql = "insert into category (nombre) values (:nombre)";
            $st = $conn->prepare($sql);
            $st->execute(['nombre'=>$nombre]);
            
             echo 'Registro creado '.$conn->lastInsertId();
        }
        $res = $conn->query("select * from category");
        while ($n=$res->fetch(PDO::FETCH_ASSOC)){
            ?>
    <form method="POST"><?= $n['nombre']?>
        <input type="hidden" name="id" value="<?= $n['id'] ?>">
        <input type="submit" value="Borrar">
    </form>
            <?php
        }

    } catch (PDOException $e) {

        echo "Connection failed: " . $e->getMessage();

    }
?>
    <form method="get">
            Nomber:<input type="text" name="nombre">
            <input type="submit">
        </form>
    </body>
</html>