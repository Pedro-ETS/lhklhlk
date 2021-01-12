<?php
$registros = array();

if ($fh = fopen('datos.txt', 'r')) {
    while (!feof($fh)) {
        $lectura = fgets($fh);
        if($lectura != ""){
            array_push($registros, preg_replace("/\n/","",$lectura));
        }
    }
    fclose($fh);
}


echo "<table border=1 100%> ";
echo "<tr>";
echo "<td>";
echo "ID";
echo "</td>";
echo "<td>";
echo "Nombre";
echo "</td>";
echo "<td>";
echo "Apellidos";
echo "</td>";
echo "<td>";
echo "Edad";
echo "</td>";
echo "<td>";
echo "Puesto";
echo "</td>";
echo "<td>";
echo "Modificar";
echo "</td>";
echo "<td>";
echo "Eliminar";
echo "</td>";
echo "</tr>";

for ($indice = 0; $indice < count($registros); $indice+=5){
echo "<tr>";
echo "<td>";
print $registros[$indice];
echo "</td>";
echo "<td>";
print $registros[$indice+1];
echo "</td>";
echo "<td>";
print $registros[$indice+2];
echo "</td>";
echo "<td>";
print $registros[$indice+3];
echo "</td>";
echo "<td>";
print $registros[$indice+4];
echo "</td>";
$indice1 = $indice+1;
$indice2 = $indice+2;
$indice3 = $indice+3;
$indice4 = $indice+4;
$stri = "<td> <button onclick='modificar(".$registros[$indice].",\"".$registros[$indice1]."\", \"".$registros[$indice2]."\", \"".$registros[$indice3]."\", \"".$registros[$indice4]."\")'>Modificar</button> </td>";
echo $stri;   
echo "<td> <button onclick='eliminar($registros[$indice])'>Eliminar</button> </td>";   
echo "</tr>";
}

echo "</table>";

?>
<br>
<form action="guardarCambios.php" name= f1 action method = "POST">
        <table>
            <tr><td>Matricula:</td><td><input type="text" name="id" id="id" required></td></tr>
            <tr><td>Nombre:</td><td><input type="text" name="nombre" id="nombre" required></td></tr>
            <tr><td>Apellidos:</td><td><input type="text" name="apellidos" id="apellidos" required></td></tr>
            <tr><td>Edad:</td><td><input type="text" name="edad" id="edad" required></td></tr>
            <tr><td>Puesto:</td><td><input type="text" name="puesto" id="puesto" required></td></tr>
            <tr><td><input type="submit" value="Guardar"></td></tr>
        </table>
    </form>
<a href="insertar.html">Regresar</a>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
    function modificar(id, nombre, apellidos, edad, puesto){
        document.getElementById("id").value = id;
        document.getElementById("nombre").value = nombre;
        document.getElementById("apellidos").value = apellidos;
        document.getElementById("edad").value = edad;
        document.getElementById("puesto").value = puesto;
    }
    function eliminar(id){
        borrar = confirm("¿Estas seguro de eliminar estos datos?");
        if(borrar){
            $.ajax({
                type: "POST",
                url: 'eliminarBtn.php',
                data:{txtIdEliminar:id},
                success:function(html) {
                    alert(html);
                    location.href='./visualizar.php';
                }

            });
        }
    }
</script>