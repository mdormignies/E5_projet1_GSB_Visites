<?php
@session_start();
include ('../modele/class ModeleDonnees.php');

$monModele = new ModeleDonnees();

//___________________________________________________________________________________________________________________________\\

if(isset($_SESSION['donnees_postees']) ) // si il y a un tableau dans la session
  {
    $donnees_postees = array();
    $donnees_postees = $_SESSION['donnees_postees'];

    $nom=$donnees_postees["nom"];
    $prenom=$donnees_postees["prenom"];
    $login=$donnees_postees["login"];
    $mdp=$donnees_postees["mdp"];
    $adresse=$donnees_postees["adresse"];
    $cp=$donnees_postees["cp"];
    $ville=$donnees_postees["ville"];
    $tel=$donnees_postees["tel"];
    $dateEmbauche=$donnees_postees["dateEmbauche"];

    // Vérification des champs (si il ne sont pas vides ?)
    if( empty($nom) || empty($prenom) || empty($login) || empty($mdp) || empty($adresse) || empty($cp) || empty($ville) || empty($tel) || empty($dateEmbauche))  // le signe || signifie OU
    {
      echo "<p>Un champ n'a pas été remplis</p>";
      echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
      die();
    }
    else // champs sont corrects ?
    {     
      $lesDonnees= $monModele->InsertIntoVisiteur($nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$tel,$dateEmbauche); // appel de fonction d'insertion

      header("Location: ../vue/v_confirmation.php"); // page de confirmation
      exit(); // interruption après redirection
    }
  }
  else
  {
    echo "<p>Données non récupérées</p>";
      echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
      die();
  }

//___________________________________________________________________________________________________________________________\\

?>
