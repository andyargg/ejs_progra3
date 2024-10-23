<?php

function invertirArray($array) {
    $n = count($array);
    for ($i = 0; $i < $n / 2; $i++) {
        $temp = $array[$i];
        $array[$i] = $array[$n - 1 - $i];
        $array[$n - 1 - $i] = $temp;
    }
    return $array;
}

// Ejemplo de uso
$palabra = ['h', 'o', 'l', 'a']; 
$palabraInvertida = invertirArray($palabra);

echo implode('', $palabraInvertida); 

