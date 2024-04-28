<?php
@session_start();
include ('../modele/class ModeleDonnees.php');
include ('../modele/class VueUneDonnee.php');

$table = '?';
$idmedecin = NULL;
$idrapport = NULL;

if(isset($_GET['table'])) {
  $table = $_GET['table'];

  // Vérifiez la présence des paramètres et définissez-les
  $idmedecin = isset($_GET['idmedecin']) ? $_GET['idmedecin'] : NULL;
  $idrapport = isset($_GET['idrapport']) ? $_GET['idrapport'] : NULL;
}

$monModele = new ModeleDonnees();

if($idmedecin!=NULL){
  $lesDonnees = $monModele->selectUnMedecin($table,$idmedecin);
}
if($idrapport!=NULL){
  $lesDonnees = $monModele->selectUnRapport($table,$idrapport);
}

$maListe = new VueUneDonnee($lesDonnees,$table);
$maListe->afficher();

//___________________________________________________________________________________________________________________________\\

?>
