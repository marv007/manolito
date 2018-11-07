<?php

class Usuario{
  private $idUsuario;
  private $departamento;
  private $correo;   
  private $nombre;  
  private $password;
  private $rol ;   
 

   //getters
   public function getIdUsuario(){
    return $this->idUsuario;
  }

  public function getIdDepartamento(){
    return $this->departamento;
  }

  public function getCorreo(){
      return $this->correo;
  }

  public function getNombre(){
      return $this->nombre;
 }

  public function getPassword(){
      return $this->password;
  }

  public function getRol(){
      return $this->rol;
  }

  //////////////setters
  public function setIdUsuario($idUsuario){
    $this->idUsuario = $idUsuario;
  }

  public function setDepartamento($departamento){
    $this->departamento = $departamento;
  }

  public function setCorreo($correo){
      $this->correo = $correo;
  }

  public function setNombre($nombre){
      $this->nombre = $nombre;
 }

  public function setPassword($password){
      $this->password = $password;
  }

  public function setRol($rol){
      $this->rol = $rol;
  }
}
?>