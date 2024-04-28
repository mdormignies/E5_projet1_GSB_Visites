<?php
@session_start();
include ('../modele/class VueListe.php');
include ('../modele/class ModeleDonnees.php');


$table='?';
if(isset($_GET['table']) ) // pas de nom de table
{
  $table=$_GET['table'];
}

$tri = '?'; 
if(isset($_GET['tri'])) // si l'action vient par l'url
{
	$tri = $_GET['tri'];
}
	
$monModele = new ModeleDonnees();
if($tri == '?') // tri pas demandé
{
  $lesDonnees = $monModele->selectAll( $table );
}
else
{
  $lesDonnees = $monModele->selectTri( $table , $tri);
}
$maListe = new VueListe($lesDonnees,$table);
$maListe->afficher();

?>
