<?php
    if (isset($_FILES['nombre_archivo_cliente'])) {
        if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
            $nombreDirectorio = "archivos/";
            $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
            $nombreCompleto = $nombreDirectorio . $nombrearchivo;

            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                echo "Archivo repetido, se cambiará el nombre a $nombrearchivo <br><br>";
            }

            move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);
            echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio<br>";
        } else {
            echo "No se ha podido subir el archivo <br>";
        }
    }
    ?>