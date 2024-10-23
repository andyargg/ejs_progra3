<?php
class Producto {
    private $id;
    private $codigoBarra;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;
    private static $filePath = 'productos.json'; 

    public function __construct($codigoBarra, $nombre, $tipo, $stock, $precio) {
        $this->id = rand(1, 10000);
        $this->codigoBarra = $codigoBarra;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    public function guardarProducto() {
        $productos = $this->cargarProductos();

        foreach ($productos as &$productoExistente) {
            if ($productoExistente['codigoBarra'] === $this->codigoBarra) {
                $productoExistente['stock'] += $this->stock;
                $this->guardarProductos($productos); 
                return "Actualizado";
            }
        }

        $nuevoProducto = [
            'id' => self::emularID(),
            'codigoBarra' => $this->codigoBarra,
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'stock' => $this->stock,
            'precio' => $this->precio
        ];

        $productos[] = $nuevoProducto;
        $this->guardarProductos($productos); 
        return "Ingresado";
    }

    private static function emularID() {
        return rand(1, 10000);
    }

    private function cargarProductos() {
        if (file_exists(self::$filePath)) {
            $jsonData = file_get_contents(self::$filePath);
            return json_decode($jsonData, true);
        }
        return []; 
    }

    private static function guardarProductos($productos) {
        file_put_contents(self::$filePath, json_encode($productos, JSON_PRETTY_PRINT));
    }
    public static function verificarProductoPorCodigo($codigoBarra, $path) {
        if (file_exists($path)) {
            $contenido = file_get_contents($path);
            $productos = json_decode($contenido, true);
        
            foreach ($productos as $producto) {
                if ($producto['codigoBarra'] == $codigoBarra) {
                    echo "\ncodigo barra " . $producto['codigoBarra'] . "\n";   
                    return true; 
                }
            }
        }
        return false; 
    }
    public static function verificarStock($codigoBarra, $path) {
        if (file_exists($path)) {
            $contenido = file_get_contents($path);
            $productos = json_decode($contenido, true);
        
            foreach ($productos as $producto) {
                if ($producto['codigoBarra'] == $codigoBarra) {
                    if ($producto['stock'] > 1) {
                        echo $producto['stock'] . " stock\n";

                        return true; 
                    } else {
                        return false; 
                    }
                }
            }
        }
        return false; 
    }
    public static function actualizarStock($codigoBarra, $nuevoStock, $path) {
        // 1. Comprobar si el archivo JSON existe
        if (file_exists($path)) {
            // 2. Leer el archivo JSON
            $contenido = file_get_contents($path);
            
            // 3. Decodificar el JSON
            $productos = json_decode($contenido, true);
    
            // 4. Modificar el stock del producto
            $productoEncontrado = false; // Variable para comprobar si se encontró el producto
    
            foreach ($productos as &$producto) {
                if ($producto['codigoBarra'] == $codigoBarra) {
                    $producto['stock'] = $nuevoStock; // Actualiza el stock
                    $productoEncontrado = true; // Indica que se encontró y actualizó el producto
                    break; // Salir del bucle
                }
            }
    
            // 5. Verificar si se realizó la actualización
            if ($productoEncontrado) {
                // 6. Codificar el arreglo de vuelta a JSON
                $nuevoContenido = json_encode($productos, JSON_PRETTY_PRINT);
    
                // 7. Escribir el nuevo contenido de vuelta en el archivo
                file_put_contents($path, $nuevoContenido);
    
                echo 'El stock del producto con código de barra ' . $codigoBarra . ' se ha actualizado a ' . $nuevoStock . ".\n";
            } else {
                echo 'No se encontró un producto con el código de barra ' . $codigoBarra . ".\n";
            }
        } else {
            echo 'El archivo no existe.' . "\n";
        }
    }
    public static function realizarVenta($codigoBarra, $cantidad, $path) {
        if (file_exists($path)) {
            $contenido = file_get_contents($path);
            $productos = json_decode($contenido, true);
        
            foreach ($productos as $producto) {
                if ($producto['codigoBarra'] == $codigoBarra) {
                    (int)$producto['stock'] -= $cantidad;    
                    echo 'stock ahora:' . $producto['stock'] . "\n";
                    self::actualizarStock($codigoBarra, $producto['stock'], $path);
                    

                }
            }
        }
        return false; 
    }
}
?>
