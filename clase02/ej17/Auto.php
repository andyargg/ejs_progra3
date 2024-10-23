<?php

class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;
    
    function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct' . $num_params;
        
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }
    
    function __construct2($marca, $color)
    {
        $this->__construct3($marca, $color, 0.0);
    }
    
    function __construct3($marca, $color, $precio)
    {
        $this->__construct4($marca, $color, $precio, new DateTime());
    }
    
    function __construct4($marca, $color, $precio, $fecha)
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }
    
    public function AgregarImpuestos($impuesto)
    {
        if (is_numeric($impuesto) && $impuesto > 0) {
            $this->_precio += $impuesto;
            echo "Impuesto sumado.\n";
        } else {
            echo "El valor del impuesto debe ser un número positivo.";
        }
    }
    
    public function Equals($otroAuto)
    {
        if (!$otroAuto instanceof Auto) {
            return false;
        }
        return $this->_marca === $otroAuto->_marca;
    }
    
    public static function Add($auto1, $auto2)
    {
        if (!$auto1 instanceof Auto || !$auto2 instanceof Auto) {
            echo "Uno o ambos objetos no son instancias de la clase Auto.\n";
            return 0;
        }
        
        if ($auto1->_marca === $auto2->_marca && $auto1->_color === $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        } else {
            echo "Los autos deben ser de la misma marca y color para sumar sus precios.\n";
            return 0;
        }
    }
    
    public function getColor()
    {
        return $this->_color;
    }
    
    public function getPrecio()
    {
        return $this->_precio;
    }
    
    public function getMarca()
    {
        return $this->_marca;
    }
    
    public function getFecha()
    {
        return $this->_fecha->format('Y-m-d');
    }
    
    public function mostrarInformacion()
    {
        return "Auto de marca {$this->_marca}, color {$this->_color}, precio {$this->_precio}, fabricado el {$this->_fecha->format('Y-m-d')}.";
    }
}

?>
