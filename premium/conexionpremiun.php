<?php
//Heroku CleanDB

$servername = "sq65ur5a5bj7flas.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "fwrgmuou398ho96i";
$pass = "m7ws863tr0aghxbe";
$bd = "pf6950lfz90agkbs";


//Xampp
/*
$servername = "localhost";
$user = "root";
$pass = "";
$bd = "cuentatinplanta";
*/
$conexionpremium = $conexionpremium = new mysqli($servername, $user, $pass, $bd);
if($conexionpremium -> connect_error){
    die("Conexión Fallida: " . $conexionpremium -> connect_error);
}
?>
