<!-- Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”. -->
<!-- Andres Arguindegui -->
 
<?php 

function numeroEnPalabras($num) {
    switch ($num) {
        case 20: return 'veinte';
        case 21: return 'veintiuno';
        case 22: return 'veintidós';
        case 23: return 'veintitrés';
        case 24: return 'veinticuatro';
        case 25: return 'veinticinco';
        case 26: return 'veintiséis';
        case 27: return 'veintisiete';
        case 28: return 'veintiocho';
        case 29: return 'veintinueve';
        case 30: return 'treinta';
        case 31: return 'treinta y uno';
        case 32: return 'treinta y dos';
        case 33: return 'treinta y tres';
        case 34: return 'treinta y cuatro';
        case 35: return 'treinta y cinco';
        case 36: return 'treinta y seis';
        case 37: return 'treinta y siete';
        case 38: return 'treinta y ocho';
        case 39: return 'treinta y nueve';
        case 40: return 'cuarenta';
        case 41: return 'cuarenta y uno';
        case 42: return 'cuarenta y dos';
        case 43: return 'cuarenta y tres';
        case 44: return 'cuarenta y cuatro';
        case 45: return 'cuarenta y cinco';
        case 46: return 'cuarenta y seis';
        case 47: return 'cuarenta y siete';
        case 48: return 'cuarenta y ocho';
        case 49: return 'cuarenta y nueve';
        case 50: return 'cincuenta';
        case 51: return 'cincuenta y uno';
        case 52: return 'cincuenta y dos';
        case 53: return 'cincuenta y tres';
        case 54: return 'cincuenta y cuatro';
        case 55: return 'cincuenta y cinco';
        case 56: return 'cincuenta y seis';
        case 57: return 'cincuenta y siete';
        case 58: return 'cincuenta y ocho';
        case 59: return 'cincuenta y nueve';
        case 60: return 'sesenta';
        default: return "Número fuera del rango permitido";
    }
}

$num = 57; 
echo "El número $num en palabras es: " . numeroEnPalabras($num);
?>