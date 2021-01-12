<?php

    $id = $_REQUEST["txtIdEliminar"];

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

    $eliminado = false;
    for ($indice = 0; $indice < count($registros); $indice+=5){
        if($registros[$indice] == $id){
            array_splice($registros, $indice, 5);
            $eliminado = true;
        }
    }

    
    
    file_put_contents("datos.txt", "");
    $guardar = fopen("datos.txt","a");
    
    for ($indice = 0; $indice < count($registros); $indice+=5){
        fwrite($guardar,$registros[$indice]."\n");
        fwrite($guardar,$registros[$indice+1]."\n");
        fwrite($guardar,$registros[$indice+2]."\n");
        fwrite($guardar,$registros[$indice+3]."\n");
        fwrite($guardar,$registros[$indice+4]."\n");
    }
    fclose($guardar);



    echo 'Registro eliminado';

    
?>