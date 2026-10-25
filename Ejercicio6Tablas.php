<!-- <?php 
$file='contactos.csv';
$controlador= fopen($file,'r');
if(file_exists($file)&& ($controlador !== false)){
    echo "****   LISTA DE USUARIOS   ****";
    while(($fila = fgetcsv($controlador)) !== false){
        printf("%-20s | %-28s | %-15s" . PHP_EOL, $fila[0], $fila[1], $fila[2]);
    }
    fclose($controlador);
}
?> -->

<?php
$file = 'contactos.csv';

if (!file_exists($file) || ($controlador = fopen($file, 'r')) === false) {
    die("No se pudo abrir el archivo.");
}

// Leemos la primera línea para los encabezados el cursor de lectura se queda, tras leer, en el inicio de la segunda linea.
$encabezados = fgetcsv($controlador);
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
            width: 80%;
            margin: 20px auto;
            font-family: sans-serif;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px 14px;
            text-align: left;
        }
        th {
            background-color: #2b2b2b;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f8f8f8;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <!-- este foreach lee esa linea que hemos guardado antes que es un array de strings y lo separa en th que son cabeceras de columna  -->
            <?php foreach ($encabezados as $columna): ?>
                <th><?= htmlspecialchars($columna) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <!-- sigue leyendo el archivo hasta que no haya más líneas que leer, separador estándar es la "," -->
         <!-- para cambiar el delimitador de getcsv es "$encabezados = fgetcsv($controlador, 0, ';');" -->
        <?php while (($fila = fgetcsv($controlador)) !== false): ?>
            <tr>
                <?php foreach ($fila as $campo): ?>
                    <td><?= htmlspecialchars($campo) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
<?php 
fclose($controlador); 
?>
</body>
</html>