<<?php
    class conexion extends PDO
    {
        private $servidor = 'localhost';
        private $usuario = 'root';
        private $contrasena = "";
        private $baseDatos = "senderismo";
        public function __construct()
        {
            try {
                parent::__construct(
                    "mysql:host=$this->servidor;dbname=$this->baseDatos;charset=utf8",
                    $this->usuario,
                    $this->contrasena
                );
            } catch (PDOException $e) {
                die("<p><H3>No se ha podido establecer la conexión.
              <P>Compruebe si está activado el servidor de bases de
              datos MySQL.</H3></p>\n <p>Error: " . $e->getMessage() .
                    "</p>\n");
            }
        }
        // BUSCAR
        public function buscarPorNombre($nombre)
        {
            $resul = $this->prepare("SELECT * FROM senderos WHERE nombre LIKE '%?%'");
            $resul->execute(array($nombre));
            return $resul;
        }

        public function buscarPorDescripcion($descripcion)
        {
            $resul = $this->prepare("SELECT * FROM senderos WHERE descripcion LIKE '%?%'");
            $resul->execute(array($descripcion));
            return $resul;
        }

        public function buscarPorId($id)
        {
            $resul = $this->prepare("SELECT * FROM senderos WHERE id = ?");
            $resul->execute(array($id));
            return $resul;
        }

        public function buscarTodo()
        {
            $resul = $this->prepare("SELECT * FROM senderos");
            $resul->execute();
            return $resul;
        }
        public function buscarTodosComentarios($idRuta)
        {
            $resul = $this->prepare("SELECT * FROM comentarios WHERE idRuta = ?");
            $resul->execute(array($idRuta));
            return $resul;
        }
        // INSERTAR
        public function insertarRuta($nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad)
        {
            $resul = $this->prepare("INSERT INTO senderos (nombre, descripcion, desnivel, distancia, notas) VALUES (?, ?, ?, ?, ?, ?)");
            $resul->execute(array($nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad));
            return $resul;
        }
        public function insertarComentario($idruta, $comentario, $nombre)
        {
            $resul = $this->prepare("INSERT INTO comentarios (id_ruta, texto, fecha, nombre) VALUES (?, ?, ?, ?)");
            $resul->execute(array($idruta, $comentario, date("Y-m-d")), $nombre);
            return $resul;
        }
        // BORRAR
        public function borrar($id)
        {
            $resul = $this->prepare("DELETE FROM senderos WHERE id=?");
            $resul->execute(array($id));
            return $resul;
        }
        //UPDATE
        public function actualizar($id, $nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad)
        {
            $resul = $this->prepare("UPDATE senderos SET nombre=?, descripcion=?, desnivel=?, distancia=?, notas=?, dificultad=? WHERE id=?");
            $resul->execute(array($nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad, $id));
            return $resul;
        }
    }
