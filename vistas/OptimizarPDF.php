<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keiry PDF optimizar 🤍✔️</title>
    <link rel="stylesheet" href="css/inicio.css"> 
    <link rel="icon" href="../img/pdf.gif">
</head>
<body>

    <img class="keiry" src="img/Keiry.png"> 

    <nav>
        <ul>
            
            
            <li><a class="btini" href="inicio.html">Inicio</a></li>
            <li><a href="descargar.html">Descargar</a></li>
            <img class="kei" src="img/pdf.gif" alt="pdf">
            <li><a href="manual.html">Manual</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
            <li><a href="listausuarios.html">Usuarios</a></li>
            <li><a href="OptimizarPDf.php">OptimizarPDf</a></li>
            <li><form  action="../Controladores/logout.php" method="post"> <button type="submit">Cerrar sesión</button></form></li>
        </ul>
    </nav>



    <h1>Optimizar Archivos PDF</h1>
    <form class="formcarga" action="../Controladores/optimize_pdf.php" method="post" enctype="multipart/form-data">
        <label for="pdf_file">Cargar PDF:</label>
        <input  type="file" name="pdf_file" id="pdf_file" accept=".pdf" required>
        <br><br>
        <input  type="submit" value="Optimizar PDF">
    </form>

    <?php
    if (isset($_FILES['pdf_file'])) {
        $uploadDir = 'uploads/';
        $originalPdf = $uploadDir . basename($_FILES['pdf_file']['name']);
        $optimizedPdf = $uploadDir . 'optimized_' . basename($_FILES['pdf_file']['name']);

        // Mover el archivo subido al directorio de uploads
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $originalPdf)) {
            // Comando Ghostscript para optimizar el PDF
            $command = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -sOutputFile=$optimizedPdf $originalPdf";
            exec($command, $output, $returnVar);

            if ($returnVar === 0) {
                echo "<p>Archivo PDF optimizado exitosamente.</p>";
                echo "<a href='$optimizedPdf' download>Descargar PDF Optimizado</a>";
            } else {
                echo "<p>Ocurrió un error al optimizar el PDF.</p>";
            }
        } else {
            echo "<p>Error al cargar el archivo PDF.</p>";
        }
    }
    ?>
    <body class="fond" background="img/7.gif">

    </body>
