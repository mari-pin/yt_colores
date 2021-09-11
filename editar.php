<?php
/* echo'editar.php?id=1&colores=success&descripcion=este es un color verde';
echo '<br>'; */
/* guarda en una variable id lo que le estamos mandando */
$id = $_GET['id'];
$color = $_GET['colores'];
$descripcion = $_GET['descripcion'];

/* echo $id;
echo '<br>';
echo $color;
echo '<br>';
echo $descripcion;
echo'<br>'; */

//llamamos a la conexion 
include_once 'conexion.php';
// preparamos y ejecutamos la sentencia
$sql_editar ='UPDATE colores SET colores =?, descripcion=? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar -> execute(array($color,$descripcion,$id));

header('location:index.php');