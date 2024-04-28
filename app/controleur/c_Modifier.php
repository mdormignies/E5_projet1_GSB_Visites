<?php
@session_start();
include ('../modele/class ModeleDonnees.php');

$monModele = new ModeleDonnees();

if(isset($_SESSION['donnees_postees']) ) // si il y a un tableau dans la session
  {
    $donnees_postees = array();
    $donnees_postees = $_SESSION['donnees_postees'];
  }
  else
  {
    echo "<p>Données non récupérées</p>";
    echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
    die();
  }

if(!isset($donnees_postees["TableModifier"])) {
  echo "<p>Table non récupérée</p>";
  echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
  die();
}
else
{
  $TableAModifier=$donnees_postees["TableModifier"];

  //__________________________________________Modifier un Médecin_________________________________________________________________________________\\

  if($TableAModifier=="medecin") {
    $idmedecin=$donnees_postees["idmedecin"];
    $nom=$donnees_postees["nom"];
    $prenom=$donnees_postees["prenom"];
    $adresse=$donnees_postees["adresse"];
    $cp=$donnees_postees["cp"];
    $ville=$donnees_postees["ville"];
    $tel=$donnees_postees["tel"];
    $specialiteComplementaire=$donnees_postees["specialiteComplementaire"];
    $departement=$donnees_postees["departement"];
    $mail=$donnees_postees["mail"];

      // Vérification des champs (si il ne sont pas vides ?)
    if( empty($idmedecin) || empty($nom) || empty($prenom) || empty($adresse) || empty($cp) || empty($ville) || empty($tel) || empty($specialiteComplementaire) || empty($departement) || empty($mail))  // le signe || signifie OU
    {
      echo "<p>Un champ n'a pas été remplis</p>";
      echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
      die();
    }
    else // champs sont corrects ?
    {     
      $lesDonnees= $monModele->UpdateMedecin($idmedecin,$nom,$prenom,$adresse,$cp,$ville,$tel,$specialiteComplementaire,$departement,$mail); // appel de fonction d'insertion

      header("Location: ../vue/v_confirmation.php"); // page de confirmation
      exit(); // interruption après redirection
    }
  }
    
  //__________________________________________Modifier un Rapport_________________________________________________________________________________\\

  if($TableAModifier=="rapport") {
    $idrapport=$donnees_postees["idrapport"];
    $motif=$donnees_postees["motif"];
    $bilan=$donnees_postees["bilan"];

      // Vérification des champs (si il ne sont pas vides ?)
    if( empty($idrapport) || empty($motif) || empty($bilan))  // le signe || signifie OU
    {
      echo "<p>Un champ n'a pas été remplis</p>";
      echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
      die();
    }
    else // champs sont corrects ?
    {     
      $lesDonnees= $monModele->UpdateRapport($idrapport,$motif,$bilan); // appel de fonction d'insertion

      header("Location: ../vue/v_confirmation.php"); // page de confirmation
      exit(); // interruption après redirection
    }
  }

}
?>
