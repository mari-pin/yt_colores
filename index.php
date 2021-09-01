<?php

include_once'conexion.php';

/* primero la sentencia */
$sql_leer = 'SELECT * FROM colores';


$gsent = $pdo->prepare($sql_leer);
$gsent-> execute();
/* con la funcion fetchAll podemos consumir todo el resultado */
$resultado = $gsent->fetchAll();
/* nos va a dar el array con la informacion de la tabla */
var_dump($resultado);

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Proyecto PHP Y MAMP</title>
</head>

<body>
    <h1>Colores de bootstrap</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- foreach nos da los campos como datos tengamos en la tabla y   -->
                <?php  foreach($resultado as $dato):?>
                <!-- añadimos el php para que nos pinte el color correspondiente a cada casillla -->
                <div class="alert alert-<?php echo $dato['colores'];?>
 text-uppercase" role="alert">
                    <!-- nos da el color y la descripcion con los echo -->
                    <?php echo $dato['colores'];?>


                </div>
                <?php  endforeach ?>
            </div>
        </div>
    </div>







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>


</body>

</html>