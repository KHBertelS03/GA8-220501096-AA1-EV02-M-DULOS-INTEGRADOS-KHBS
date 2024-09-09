<?php
if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']);

    if (file_exists($file)) {
        // Establecer encabezados para la descarga
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));

        // Leer el archivo y enviarlo al navegador
        readfile($file);

        // Eliminar el archivo después de la descarga
        unlink($file);
        exit;
    } else {
        echo "Archivo no encontrado.";
    }
} else {
    echo "No se especificó ningún archivo.";
}
?>
