<?php

class Usuario {
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave, $mail) {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public static function verificarUsuario($nombre, $clave, $mail, $archivo) {
        if (!file_exists($archivo)) {
            return "Usuario no registrado";
        }

        $fp = fopen($archivo, 'r');
        if ($fp === false) {
            return "Error en el archivo";
        }

        while (($datos = fgetcsv($fp)) !== false) {
            if (count($datos) === 3 && $datos[2] === $mail) {
                if ($datos[1] === $clave) {
                    fclose($fp);
                    return "Verificado";
                } else {
                    fclose($fp);
                    return "Error en los datos";
                }
            }
        }

        fclose($fp);
        return "Usuario no registrado";
    }
}

?>
