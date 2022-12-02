<?php
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
            $resul = $this->prepare("SELECT * FROM rutas WHERE titulo LIKE ?");
            $resul->execute(array("%".$nombre."%"));
            return $resul->fetchAll();
        }

        public function buscarPorDescripcion($descripcion)
        {
            $resul = $this->prepare("SELECT * FROM rutas WHERE descripcion LIKE ?");
            $resul->execute(array("%".$descripcion."%"));
            return $resul->fetchAll();
        }
        public function buscarPorId($id)
        {
            $resul = $this->prepare("SELECT * FROM rutas WHERE id = ?");
            $resul->execute(array($id));
            return $resul->fetchAll();
        }

        public function buscarTodo()
        {
            $resul = $this->prepare("SELECT * FROM rutas");
            $resul->execute();
            return $resul->fetchAll();
        }
        public function buscarTodosComentarios($idRuta)
        {
            $resul = $this->prepare("SELECT * FROM rutas_comentarios WHERE id_ruta = ?");
            $resul->execute(array($idRuta));
            return $resul->fetchAll();
        }
        // INSERTAR
        public function insertarRuta($nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad)
        {
            $resul = $this->prepare("INSERT INTO rutas (titulo, descripcion, desnivel, distancia, dificultad, notas) VALUES (?, ?, ?, ?, ?, ?)");
            $resul->execute(array($nombre, $descripcion, $desnivel, $distancia, $dificultad, $notas));
            return $resul->fetchAll();
        }
        public function insertarComentario($idruta, $comentario, $nombre)
        {
            $resul = $this->prepare("INSERT INTO rutas_comentarios (id_ruta, texto, fecha, nombre) VALUES (?, ?, ?, ?)");
            $resul->execute(array($idruta, $comentario, date("Y-m-d"),$nombre));
                // return $resul->fetchAll();
        }
        // BORRAR
        public function borrar($id)
        {
            $resul = $this->prepare("DELETE FROM rutas WHERE id=?");
            $resul->execute(array($id));
            return $resul->fetchAll();
        }
        //UPDATE
        public function actualizar($id, $nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad)
        {
            $resul = $this->prepare("UPDATE rutas SET titulo=?, descripcion=?, desnivel=?, distancia=?, notas=?, dificultad=? WHERE id=?");
            $resul->execute(array($nombre, $descripcion, $desnivel, $distancia, $notas, $dificultad, $id));
            return $resul->fetchAll();
        }
    }
