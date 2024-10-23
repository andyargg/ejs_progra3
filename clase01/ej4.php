<!-- Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla. -->
<!-- Andres Arguindegui -->
 
<?php

function calcular($operador, $op1, $op2){
    switch ($operador){
        case "+":
            $resultado = $op1 + $op2;
            break;
        case "-":
            $resultado = $op1 - $op2;
            break;
        case "*":
            $resultado = $op1 * $op2;
            break;
        case "/":
            if ($op2 == 0) {
                $resultado = "Error: División por cero";
            } else {
                $resultado = $op1 / $op2;
            }
            break;
        default:
            $resultado = "Operador no válido";
            break;
    }
    return $resultado;
}

echo "El resultado es: " . calcular("*", 40,3);