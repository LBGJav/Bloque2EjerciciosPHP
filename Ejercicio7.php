<?php 
$archivo = 'productos2.txt'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 25px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 14px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .error {
            color: #d9534f;
            background-color: #fdf7f7;
            border: 1px solid #d9534f;
            padding: 15px;
            width: 60%;
            margin: 25px auto;
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
<?php 
    if (!file_exists($archivo)) {
    echo '<div class="error"><strong>Error:</strong> El archivo "' . htmlspecialchars($archivo) . '" no existe.</div>';
    } else {
        // 2. Abrimos en modo lectura
        $handle = fopen($archivo, 'r');

        if ($handle !== false) {
            ?>
            <table>
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Precio (€)</th>
                    <th>Cantidad Disponible</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 3. Leemos línea por línea
                while (($linea = fgets($handle)) !== false) {
                    // Limpiamos saltos de línea y espacios al inicio/final
                    $lineaLimpia = trim($linea);

                    // Evitamos procesar líneas vacías accidentales
                    if ($lineaLimpia === '') {
                        continue;
                    }

                    // 4. Separamos los valores por el espacio
                    $datos = explode(' ', $lineaLimpia);

                    // Verificamos que contenga al menos los 3 campos esperados
                    if (count($datos) >= 3) {
                        $nombre   = $datos[0];
                        $precio   = $datos[1];
                        $cantidad = $datos[2];
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($nombre) ?></td>
                            <td><?= htmlspecialchars($precio) ?> €</td>
                            <td><?= htmlspecialchars($cantidad) ?></td>
                        </tr>
                        <?php
                    }
                }
                // Cerramos el descriptor del archivo
                fclose($handle);
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo '<div class="error"><strong>Error:</strong> No se pudo abrir el archivo para lectura.</div>';
    }
}
?>
</body>
</html>