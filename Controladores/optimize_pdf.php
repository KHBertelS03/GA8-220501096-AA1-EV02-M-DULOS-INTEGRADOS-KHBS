<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keiry PDF optimizar 🤍✔️</title>
    <link rel="stylesheet" href="../vistas/css/inicio.css"> 
    <link rel="icon" href="../vistas/img/pdf.gif">
</head>
<body>

    <img class="keiry" src="../vistas/img/Keiry.png"> 

    <nav>
        <ul>
            
            
            <li><a class="btini" href="../vistas/inicio.html">Inicio</a></li>
            <li><a href="../vistas/descargar.html">Descargar</a></li>
            <img class="kei" src="img/pdf.gif" alt="pdf">
            <li><a href="../vistas/manual.html">Manual</a></li>
            <li><a href="../vistas/sobrenosotros.html">Sobre nosotros</a></li>
            <li><a href="../vistas/listausuarios.html">Usuarios</a></li>
            <li><a href="../vistas/OptimizarPDf.php">OptimizarPDf</a></li>
            <li><form  action="../Controladores/logout.php" method="post"> <button type="submit">Cerrar sesión</button></form></li>
        </ul>
    </nav>

<?php
if (isset($_FILES['pdf_file'])) {
    $uploadDir = 'uploads/';
    $originalPdf = $uploadDir . basename($_FILES['pdf_file']['name']);
    $optimizedPdf = $uploadDir . 'optimized_' . basename($_FILES['pdf_file']['name']);

    // Ruta completa de ghostscript.exe este es el componente que nos optimiza el pdf
    $ghostscriptPath = 'C:\xampp\htdocs\Crudkeiryfinal\Controladores\ghostscript\gswin64c.exe'; // Cambia esta ruta a la ubicación real de ghostscript.exe

    // Mover el archivo subido al directorio de uploads para hacer la optimizacion 
    if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $originalPdf)) {
        // Comando Ghostscript para optimizar el PDF
        $command = "\"$ghostscriptPath\" -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -sOutputFile=\"$optimizedPdf\" \"$originalPdf\"";
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            echo "<p>Archivo PDF optimizado exitosamente.</p>";
            echo "<a href='download.php?file=" . urlencode($optimizedPdf) . "'>Descargar PDF Optimizado</a>";
            //eliminar archivo despues de  optimizarlo y descargarlo 
            unlink($originalPdf); //eliminar archivo original una vez optimizado


        } else {
            echo "<p>Ocurrió un error al optimizar el PDF.</p>";
        }
    } else {
        echo "<p>Error al cargar el archivo PDF.</p>";
    }
} else {
    echo "<p>No se ha seleccionado ningún archivo PDF.</p>";
}
?>

<body class="fond" background="../vistas/img//7.gif">
        
        </body>
    