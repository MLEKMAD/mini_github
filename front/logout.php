<?php
session_start();
$bdd= new PDO("mysql:host=localhost;dbname=DBacters","root","");
$req =$bdd->query("UPDATE acters SET connect = 0 WHERE id='".$_SESSION["id"]."'");
unset($_SESSION["id"]);
header("Location: Authentification.php");

