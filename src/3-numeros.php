<?php
// Generar tres números aleatorios enteros entre 0 y 100
$n1 = rand(0, 100);
$n2 = rand(0, 100);
$n3 = rand(0, 100);

// El calculo de las sumas de los 3 numeros
$suma = $n1 + $n2 + $n3;

// Con esto se muestra las sumas
echo "Números: $n1, $n2, $n3\n";
echo "Suma: $suma\n";
?>
