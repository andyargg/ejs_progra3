<?php
class Usuario {
    private $id;
    private $nombre;
    private $clave;
    private $mail;
    private $fechaRegistro;
    private $imagen;

    public function __construct($nombre, $clave, $mail, $imagen) {
        $this->id = rand(1, 10000);
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaRegistro = date("Y-m-d H:i:s"); 
        $this->imagen = $imagen;
    }

    public function guardarEnJson($path) {
        $usuarioArray = [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'clave' => $this->clave,
            'mail' => $this->mail,
            'fechaRegistro' => $this->fechaRegistro,
            'imagen' => $this->imagen
        ];

        if (!file_exists($path)) {
            file_put_contents($path, json_encode([$usuarioArray], JSON_PRETTY_PRINT));
        } else {
            $contenido = file_get_contents($path);
            $usuarios = json_decode($contenido, true);
            $usuarios[] = $usuarioArray;
            file_put_contents($path, json_encode($usuarios, JSON_PRETTY_PRINT));
        }

        return true;
    }

    public function subirImagen($directorioDestino) {
        $nombreTmp = $this->imagen['tmp_name'];
        $nombreOriginal = $this->imagen['name'];

        if (!is_dir($directorioDestino)) {
            mkdir($directorioDestino, 0777, true);
        }

        $rutaDestino = $directorioDestino . '/' . $nombreOriginal;

        if (move_uploaded_file($nombreTmp, $rutaDestino)) {
            return $rutaDestino;
        } else {
            return false;
        }
    }
    public static function cargarDesdeJson($path) {
        $usuarios = [];

        if (file_exists($path)) {
            $contenido = file_get_contents($path);
            $arrayUsuarios = json_decode($contenido, true);

            foreach ($arrayUsuarios as $usuarioData) {
                $usuario = new Usuario(
                    $usuarioData['nombre'],
                    $usuarioData['clave'],
                    $usuarioData['mail'],
                    $usuarioData['imagen'],
                    $usuarioData['id'], // Ya está definido en el JSON
                    $usuarioData['fechaRegistro'] // Ya está definido en el JSON
                );
                $usuarios[] = $usuario; 
            }
        } else {
            echo "El archivo no existe.";
        }

        return $usuarios; 
    }

     public static function usuariosComoArray($usuarios) {
        $lista = [];
        foreach ($usuarios as $usuario) {
            $lista[] = [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'mail' => $usuario->mail,
                'fechaRegistro' => $usuario->fechaRegistro,
                'imagen' => $usuario->imagen
            ];
        }
        return $lista;
    }
    public static function verificarUsuario($id, $path) {
        if (file_exists($path)) {
            $contenido = file_get_contents($path);
            $usuarios = json_decode($contenido, true);
        
            foreach ($usuarios as $usuario) {
                if ($usuario['id'] == $id) {
                    echo $usuario['id']. " id\n";    
                    return true; // Usuario encontrado
                }
            }
        }
        return false; // Usuario no encontrado
    }
    
}
