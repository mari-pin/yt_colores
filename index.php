<?php
/* hemos hecho la conexion con SQL */
include_once'conexion.php';

//LEER
/* He  creado la sentencia*/
$sql_leer = 'SELECT * FROM colores';

/* He  preparado la sentencia*/
$gsent = $pdo->prepare($sql_leer);

/* ejecutamos la sentencia */
$gsent-> execute();

/* con la funcion fetchAll podemos consumir todo el resultado */
$resultado = $gsent->fetchAll();

/* nos va a dar el array con la informacion de la tabla -->(var_dump($resultado);)*/


//AGREGAR
if ($_POST) {
   $color = $_POST['colores'];
   $descripcion = $_POST['descripcion'];
//creamos la sentencia insetar colores, y ponemos interrogantes como campos tenemos para que sea mas seguro,
   $sql_agregar =  'INSERT INTO colores (colores,descripcion) VALUES (?,?) ';
   //inventamos una variable y la preparamos
   $sentencia_agregar = $pdo->prepare($sql_agregar);

   //y la ejecutamos
   $sentencia_agregar-> execute(
       array($color,$descripcion));

   header('location:index.php');    
}
//guardamos en la variable id lo que nos trea por url
if ($_GET) {
    $id = $_GET['id'];
   //unico porque es solo para un elemento
    $sql_unico = 'SELECT * FROM colores WHERE id=?';
    $gsent_unico = $pdo->prepare( $sql_unico);
    $gsent_unico-> execute(array($id));
    //fetch porque es un resultado unico y el id es unico siempre
    $resultado_unico =  $sql_unico->fetch();

    var_dump( $resultado_unico);
}




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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Proyecto PHP Y MAMP</title>
</head>

<body>
    <h1>Colores de bootstrap</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- foreach  que consume la variable local, y nos da los campos como datos tengamos en la tabla y   -->
                <?php  foreach($resultado as $dato):?>
                <!-- añadimos el php para que nos pinte el color correspondiente a cada casillla -->
                <div class="alert alert-<?php echo $dato['colores'];?>
 text-uppercase" role="alert">

                    <!-- nos da el color y la descripcion con los echo -->
                    <?php echo $dato['colores'];?>
                    -
                    <?php echo $dato['descripcion'];?>

                    <a href="index.php?id= <?php echo $dato['id'];?>" class="float-right">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                </div>
                <?php  endforeach ?>

                <div class="col-md-6">
                    <?php if (!$_GET): ?> 
                    <h2>Agregar Elementos</h2>
                    <form method="POST">
                        <input type="text" class="form- control mt-3 " name="colores">
                        <input type="text" class="form- control mt-3 " name="descripcion">
                        <button class="btn btn-primary mt-3 text-capitalice">Agregar Colores</button>
                    </form>
                    <?php endif ?>

                    <?php if ($_GET): ?> 
                    <h2>EDITAR ELEMENTOS</h2>
                    <form method="GET" action = "editar.php">
                        <input type="text" class="form- control mt-3 " name="colores">
                        <input type="text" class="form- control mt-3 " name="descripcion">
                        <button class="btn btn-primary mt-3 ">Agregar Colores</button>
                    </form>
                    <?php endif ?>

                </div>
            </div>

        </div>
    </div>







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>



















</body>




</html>