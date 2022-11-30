<?php
class Comentario{
    private $id;
    private $idRuta;
    private $nombre;
    private $comentario;
    private $fecha;
    private $conexion;
    public function __construct($id, $idRuta, $nombre, $comentario, $fecha, $conexion){
        $this->id = $id;
        $this->idRuta = $idRuta;
        $this->nombre = $nombre;
        $this->comentario = $comentario;
        $this->fecha = $fecha;
        $this->conexion = $conexion;
    }
    public function getId(){
        return $this->id;
    }
    public function getIdRuta(){
        return $this->idRuta;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getConexion(){
        return $this->conexion;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setIdRuta($idRuta){
        $this->idRuta = $idRuta;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setComentario($comentario){
        $this->comentario = $comentario;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setConexion($conexion){
        $this->conexion = $conexion;
    }
    public function insertarComentario(){
        $resul = $this->conexion->prepare("INSERT INTO comentarios (idRuta, nombre, comentario, fecha) VALUES (?, ?, ?, ?)");
        $resul->execute(array($this->idRuta, $this->nombre, $this->comentario, $this->fecha));
    }
    public function buscarComentariosPorIdRuta(){
        $resul = $this->conexion->prepare("SELECT * FROM comentarios WHERE idRuta = ?");
        $resul->execute(array($this->idRuta));
        return $resul;
    }
}

?>