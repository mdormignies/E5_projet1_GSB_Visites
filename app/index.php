<?php
@session_start();
include ('modele/class Routeur.php');
if(isset($_GET['action'])) // si l'action vient par l'url
{
	$action = $_GET['action'];
}
else
{
	$action = 'init';
}

if(isset($_POST)) // si il y a un tableau POST
{
	$donnees_postees = array();
	$donnees_postees = $_POST;
	$_SESSION['donnees_postees']=$donnees_postees;
}


$table = '?'; 
if(isset($_GET['table'])) // si l'action vient par l'url
{
	$table = $_GET['table'];
}
$tri = '?'; 
if(isset($_GET['tri'])) // si l'action vient par l'url
{
	$tri = $_GET['tri'];
}

$idmedecin = isset($_GET['idmedecin']) ? $_GET['idmedecin'] : null;
$idrapport = isset($_GET['idrapport']) ? $_GET['idrapport'] : null;

$routeur = new Routeur();
$routeur->rediriger($action, $table, $tri, $idmedecin, $idrapport);

die("erreur inattendue");
?>

