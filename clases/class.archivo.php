<?php

class Archivo{
  private $idArchivo;
  private $nombreArchivo;
  private $rutaArchivo;
  
  //getters
  public function getIdArchivo(){
    return $this->idArchivo;
  }

  public function getNombreArchivo(){
    return $this->nombreArchivo;
  }

  public function getRutaArchivo(){
      return $this->rutaArchivo;
  }

   //////////////setters
  public function setIdArchivo($idArchivo){
    $this->idArchivo = $idArchivo;
  }

  public function setNombreArchivo($nombreArchivo){
    $this->nombreArchivo = $nombreArchivo;
  }

  public function setRutaArchivo($rutaArchivo){
      $this->rutaArchivo = $rutaArchivo;
  }
}
  
?>