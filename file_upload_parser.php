<?php
//if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file1"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Comprobar si el archivo es un PDF
    if ($fileType != "pdf") {
        echo "Solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    // Verificar si el archivo ya existe
    if (file_exists($targetFile)) {
        echo "El archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar el tamaño del archivo (opcional, aquí se limita a 5MB)
    if ($_FILES["file1"]["size"] > 5000000) {
        echo "El archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk es 0 debido a un error
    if ($uploadOk == 0) {
        echo "Tu archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFile)) {
            echo "El archivo ". htmlspecialchars(basename($_FILES["file1"]["name"])). " ha sido subido.";
        } else {
            echo "Hubo un error al subir tu archivo.";
        }
    }
//}
?>
