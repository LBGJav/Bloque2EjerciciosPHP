<?php
$file = 'contador.txt';
 
// Si el archivo no existe, crearlo con el valor inicial de 0
if (!file_exists($file)) {
    $contador = 0;
    $fp = fopen($file, 'w');
    fwrite($fp, $contador);
    fclose($fp);
}
 
// Leer el valor actual del contador desde el archivo
$fp = fopen($file, 'r');
$contador = fread($fp, filesize($file));
fclose($fp);
 
// Incrementar el contador
$contador++;
 
// Escribir el nuevo valor del contador en el archivo
$fp = fopen($file, 'w');
fwrite($fp, $contador);
fclose($fp);
 
// Mostrar el contador al usuario
echo "Esta página ha sido visitada $contador veces.<br>";

////OTRA FORMA
/*$archivo = 'contador.txt';
 
if (!file_exists($archivo)) {
    file_put_contents($archivo, 0);
}
 
$contador = (int)file_get_contents($archivo);
$contador++;
file_put_contents($archivo, $contador);
 
echo "Visitas totales: $contador";
*/