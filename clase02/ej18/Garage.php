<?php

require_once __DIR__ . '/../ej17/Auto.php';



class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = null)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora !== null ? $precioPorHora : 0.0;
        $this->_autos = []; 
    }

    public function mostrarGarage()
    {
        $informacion = "Razón Social: {$this->_razonSocial}\n";
        $informacion .= "Precio por Hora: {$this->_precioPorHora}\n";
        $informacion .= "Cantidad de Autos: " . count($this->_autos) . "\n";

        if (!empty($this->_autos)) {
            $informacion .= "Autos en el garaje:\n";
            foreach ($this->_autos as $auto) {
                $informacion .= $auto->mostrarInformacion() . "\n";
            }
        } else {
            $informacion .= "No hay autos en el garaje.\n";
        }

        return $informacion;
    }

    public function equals(Auto $auto)
    {
        foreach ($this->_autos as $autoEnGaraje) {
            if ($autoEnGaraje->equals($auto)) {
                return true;
            }
        }
        return false;
    }

    public function add(Auto $auto)
    {
        if ($this->equals($auto)) { 
            return "El auto ya está en el garaje.";
        }
        $this->_autos[] = $auto;
        return "Auto agregado exitosamente.";
    }

    public function remove(Auto $auto)
    {
        foreach ($this->_autos as $index => $autoEnGaraje) {
            if ($autoEnGaraje->equals($auto)) {
                unset($this->_autos[$index]);
                $this->_autos = array_values($this->_autos); 
                return "Auto eliminado exitosamente.";
            }
        }
        return "El auto no está en el garaje.";
    }

    public function getRazonSocial()
    {
        return $this->_razonSocial;
    }

    public function setRazonSocial($razonSocial)
    {
        $this->_razonSocial = $razonSocial;
    }

    public function getPrecioPorHora()
    {
        return $this->_precioPorHora;
    }

    public function setPrecioPorHora($precioPorHora)
    {
        $this->_precioPorHora = $precioPorHora;
    }
}

?>
