<?php
class conexion extends mysqli{
  private static $instance = NULL;
  private $host = 'localhost';
  private $database = 'ticketsys';
  private $username = 'root';
  private $password = '';

  private function __construct(){

  }

  public function getInstance(){
     if(self::$instance instanceof conexion){
         return self::$instance;
     }else{
         return self::$instance = new conexion();
     }

  }

  function execQuery($stmn){
    $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
    return $mysqli->query($stmn);
  }
}
?>
