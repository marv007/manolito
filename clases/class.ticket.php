<?php

class Ticket{
  private $idTicket;
  private $idUsuario;
  private $asunto;   
  private $problema;  
  private $solucion = '';
  private $fechaInicio = '';   
  private $fechaFinal = '';
  private $estado ='Activo';
  private $prioridad;
  private $idArchivo; 
  private $idTecnico;  
  
  

  //getters
  public function getIdTicket(){
    return $this->idTicket;
  }

  public function getIdUsuario(){
    return $this->idUsuario;
  }

  public function getAsunto(){
      return $this->asunto;
  }

  public function getProblema(){
      return $this->problema;
 }

  public function getSolucion(){
      return $this->solucion;
  }

  public function getFechaInicio(){
      return $this->fechaInicio;
  }

  public function getFechaFinal(){
      return $this->fechaFinal;
  }

  public function getEstado(){
    return $this->estado;
  }

  public function getPrioridad(){
    return $this->prioridad;
 }

  public function getIdArchivo(){
    return $this->idArchivo;
  }

  public function getIdTecnico(){
    return $this->idTecnico;
  }

  //////////////setters
  public function setIdTicket($idTicket){
    $this->idTicket = $idTicket;
  }

  public function setIdUsuario($idUsuario){
    $this->idUsuario = $idUsuario;
  }

  public function setAsunto($asunto){
      $this->asunto = $asunto;
  }

  public function setProblema($problema){
      $this->problema = $problema;
 }

  public function setSolucion($solucion){
      $this->solucion = $solucion;
  }

  public function setFechaInicio($fechaInicio){
      $this->fechaInicio = $fechaInicio;
  }

  public function setFechaFinal($fechaFinal){
      $this->fechaFinal = $fechaFinal;
  }

  public function setEstado($estado){
      $this->estado = $estado;
  }

  public function setPrioridad($prioridad){
      $this->prioridad = $prioridad;
 }

  public function setIdArchivo($idArchivo){
      $this->idArchivo = $idArchivo;
  }


}

?>