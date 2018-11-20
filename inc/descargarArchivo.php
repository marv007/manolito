<?php
session_start(); 

if(!isset($_SESSION["usuario"])){
   header("Location: index.php");
 }
 require '../clases/manejadorArchivo.php';

//Obtener parametros de archivo
$manArchivo = new ManejadorArchivo(); 
$arrArchivos = $manArchivo->obtenerArchivo();
$nombreArchivo = "no hay archivo";
$contador = 0;

while($contador < count($arrArchivos)){
    if($arrArchivos[$contador]->getIdArchivo() == $_GET['idArchivo']){
        $nombreArchivo = $arrArchivos[$contador]->getNombreArchivo();
        $rutaArchivo = $arrArchivos[$contador]->getRutaArchivo();
    }
    $contador++;
}

if($nombreArchivo != "no hay archivo"){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Type: application/force-download");
    header('Content-Disposition: attachment; filename='.basename($rutaArchivo.$nombreArchivo));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($rutaArchivo.$nombreArchivo));
    ob_clean();
    flush();
    readfile($rutaArchivo.$nombreArchivo);
    exit;
}


?>