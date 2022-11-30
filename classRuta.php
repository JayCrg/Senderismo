<?php
include_once 'classConexion.php';
include_once 'classComentario.php';
class Ruta{
    private $id;
    private $titulo;
    private $descripcion;
    private $desnivel;
    private $distancia;
    private $notas;
    private $dificultad;

    public function __construct($id, $titulo, $descripcion, $desnivel, $distancia, $notas, $dificultad){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->desnivel = $desnivel;
        $this->distancia = $distancia;
        $this->notas = $notas;
        $this->dificultad = $dificultad;
        $this->conexion = new Conexion();
    }
    
    public function buscarComentariosPorIdRuta(){
        $arrayCom = array();
        $comentarios = $this->conexion->buscarTodosComentarios($this->id);
        while($fila = $comentarios->fetch_assoc()){
            $arrayCom[] = new Comentario($fila['id'], $fila['idRuta'], $fila['nombre'], $fila['comentario'], $fila['fecha'], $this->conexion);
        }
        return $comentarios;
    }

    public function insertarComentario($comentario, $nombre){
        $this->conexion->insertarComentario($this->ruta, $comentario, $nombre);
    }

    public function getComentarios(){
        return $this->conexion->buscarTodosComentarios($this->id);
    }

}

?>