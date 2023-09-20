if (isset($_FILES['nombre_archivo_cliente'])) {
    $nombreDirectorio = "archivos/";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;
    $archivoTmp = $_FILES['nombre_archivo_cliente']['tmp_name'];

    // Verificar que el archivo sea una imagen y cumpla con el tamaño máximo de 1MB
    $extensionesValidas = array('jpg', 'jpeg', 'gif', 'png');
    $extension = strtolower(pathinfo($nombrearchivo, PATHINFO_EXTENSION));

    if (in_array($extension, $extensionesValidas) && $_FILES['nombre_archivo_cliente']['size'] <= 1000000) {
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiará el nombre a $nombrearchivo <br><br>";
        }
        move_uploaded_file($archivoTmp, $nombreDirectorio . $nombrearchivo);
        echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio<br>";
    } else {
        echo "El archivo no es válido. Asegúrate de que sea una imagen (jpg, jpeg, gif o png) y que no exceda 1MB de tamaño.<br>";
    }
} else {
    echo "No se ha podido subir el archivo <br>";
}
?>