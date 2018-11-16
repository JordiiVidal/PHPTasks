<!DOCTYPE html>
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

    $sql = "select * from category ";

    $resul = $conn->query($sql);

    while ($registro=$resul->fetch()){
        echo $registro['nombre']."<br/>";
    }
    
    print_r($registro);

} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}?>

</body>
</html>