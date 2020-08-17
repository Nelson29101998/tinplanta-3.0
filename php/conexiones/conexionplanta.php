<?php
//Heroku CleanDB
/*
$servername = "sq65ur5a5bj7flas.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "fwrgmuou398ho96i";
$pass = "m7ws863tr0aghxbe";
$bd = "pf6950lfz90agkbs";
*/

//Xampp

$servername = "localhost";
$user = "root";
$pass = "";
$bd = "cuentatinplanta";

$conexionplanta = $conexionplanta = new mysqli($servername, $user, $pass, $bd);
if($conexionplanta -> connect_error){
    die("Conexión Fallida: " . $conexionplanta -> connect_error);
}
?>
