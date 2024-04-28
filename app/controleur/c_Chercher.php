<?php
@session_start();
include ('../modele/class VueListe.php');
include ('../modele/class ModeleDonnees.php');


$table='?';
if(isset($_GET['table']) ) // pas de nom de table
{
  $table=$_GET['table'];
}

$monModele = new ModeleDonnees();

if(isset($_SESSION['donnees_postees']) ) // si il y a un tableau dans la session
  {
    $donnees_postees = array();
    $donnees_postees = $_SESSION['donnees_postees'];

//__________________________________________Chercher avec date__________________________________________________________________\\

      if(isset($donnees_postees["ChercherDate"]) ){
        $ChercherDate=$donnees_postees["ChercherDate"];

        $lesDonnees = $monModele->selectAvecDate($table,$ChercherDate);

        if ($lesDonnees=='AucuneDate'){
          echo "<h2>Aucun rapport trouver pour cette date !<h2><p><a href='../index.php?action=liste&table=rapport'>Retour à la liste</a></p>";
        }
        else {
          $maListe = new VueListe($lesDonnees,$table);
          $maListe->afficher();
        }
      }
//__________________________________________Chercher avec nom__________________________________________________________________\\

      if(isset($donnees_postees["ChercherNom"]) ){
        $ChercherNom=$donnees_postees["ChercherNom"];

        $lesDonnees = $monModele->selectAvecNom($table,$ChercherNom);

        if ($lesDonnees=='AucunNom'){
          echo "<h2>Aucun médecin trouver avec ce nom !<h2><p><a href='../index.php?action=liste&table=medecin'>Retour à la liste</a></p>";
        }
        else {
          $maListe = new VueListe($lesDonnees,$table);
          $maListe->afficher();
        }
      }
  }

?>