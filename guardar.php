<?php

$id = $_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$edad = $_REQUEST["edad"];
$puesto = $_REQUEST["puesto"];


$guardar = fopen("datos.txt","a");
fwrite($guardar,$_POST['id']."\n");
fwrite($guardar,$_POST['nombre']."\n");
fwrite($guardar,$_POST['apellidos']."\n");
fwrite($guardar,$_POST['edad']."\n");
fwrite($guardar,$_POST['puesto']."\n");
fclose($guardar);

echo "<script>alert('Datos Guardados Correctamente');
location.href='./visualizar.php'</script>";

?>
