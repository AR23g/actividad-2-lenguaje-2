<?php
$entradas = [
    ['nombre' => ' Alice ', 'correo' => 'alice@example.com', 'edad' => '29'],
    ['nombre' => '<b>Bob</b>', 'correo' => 'bob@@example', 'edad' => '30'],
    ['nombre' => '   ', 'correo' => 'charlie@example.com', 'edad' => '999'],
];


function limpiar_texto(string $s): string {
    return trim(strip_tags($s));
}

function correo_valido(string $c): bool {
    return (bool) filter_var($c, FILTER_VALIDATE_EMAIL);
}

function edad_valida($e): ?int {
    $n = filter_var($e, FILTER_VALIDATE_INT, [
        "options" => ["min_range" => 0, "max_range" => 120]
    ]);
    return $n === false ? null : $n;
}


$para_insertar = [];

foreach ($entradas as $i => $fila) {
    $nombre = limpiar_texto($fila['nombre'] ?? '');
    $correo = trim($fila['correo'] ?? '');
    $edad = edad_valida($fila['edad'] ?? null);

    $errores = [];
    if ($nombre === '') $errores[] = 'nombre vacío';
    if (!correo_valido($correo)) $errores[] = 'correo inválido';
    if ($edad === null) $errores[] = 'edad inválida';

    
    if (!empty($errores)) {
        error_log("Fila $i descartada: " . implode(', ', $errores));
        continue;
    }

    
    $para_insertar[] = [
        'nombre' => $nombre,
        'correo' => $correo,
        'edad' => $edad
    ];
}


print_r($para_insertar);

?>
