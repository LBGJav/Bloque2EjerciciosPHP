<?php
$file = 'config.txt';
 
// Comprobar si el archivo existe
if (file_exists($file)) {
    // Abrir el archivo en modo lectura
    $fp = fopen($file, 'r');
   
    // Leer el archivo línea por línea
    while ($linea = fgets($fp)) {
        // explode devuelve array con la clave y valor utilizando el separador "="
        list($clave, $valor) = explode('=', trim($linea));
        echo "Clave: $clave, Valor: $valor <br>";
    }
   
    // Cerrar el archivo
    fclose($fp);
} else {
    echo "El archivo de configuración no existe.";
}
 
//OTRA FORMA
/*
$config = [];
 
foreach (file('config.txt') as $linea) {
    $linea = trim($linea);
    if ($linea !== '' && str_contains($linea, '=')) {
        [$clave, $valor] = explode('=', $linea, 2);
        $config[trim($clave)] = trim($valor);
    }
}
 
foreach ($config as $clave => $valor) {
    echo "$clave: $valor<br>";
}
*/