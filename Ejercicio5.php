<?php 
$file = 'tareas.txt';
$nuevasTareas = ['Comprar café', 'Beber agua', 'Correr', 'Pasear Perros'];
$content = implode(PHP_EOL, $nuevasTareas) . "\n";


file_put_contents($file, $content, FILE_APPEND);

echo "--Lista de tareas--" . PHP_EOL;
echo file_get_contents($file);
?>


<?php 
//OTRA FORMA PARA APROVECHAR EL FOREACH
$file = 'tareas.txt';
$nuevasTareas = ['Comprar café', 'Beber agua', 'Correr', 'Pasear Perros'];

foreach ($nuevasTareas as $tarea) {
    // Concatenamos el salto de línea al final de cada elemento
    file_put_contents($file, $tarea . PHP_EOL, FILE_APPEND);
}

echo "--Lista de tareas--" . PHP_EOL;

// echo para imprimir la salida devuelta por la función
if (file_exists($file)) {
    echo file_get_contents($file);
}
?>