<?php
@session_start();
include ('../modele/class ModeleDonnees.php');

$table='?';
if(isset($_GET['table']) ) // pas de nom de table
{
  $table=$_GET['table'];
}

$monModele = new ModeleDonnees();

//___________________________________________________________________________________________________________________________\\

// ICI TABLE MEDECIN
if($table=='medecin')
{
  if(isset($_SESSION['donnees_postees']) ) // si il y a un tableau dans la session
  {
    $donnees_postees = array();
    $donnees_postees = $_SESSION['donnees_postees'];

    $nom=$donnees_postees["nom"];
    $prenom=$donnees_postees["prenom"];
    $adresse=$donnees_postees["adresse"];
    $cp=$donnees_postees["cp"];
    $ville=$donnees_postees["ville"];
    $tel=$donnees_postees["tel"];
    $specialite=$donnees_postees["specialite"];
    $departement=$donnees_postees["departement"];
    $mail=$donnees_postees["mail"];

    // Vérification des champs (si il ne sont pas vides ?)
    if( empty($nom) || empty($prenom) || empty($adresse) || empty($cp) || empty($ville) || empty($tel) || empty($specialite) || empty($departement) || empty($mail) )  // le signe || signifie OU
    {
      echo "<p>Un champ n'a pas été remplis</p>";
      echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
      die();
    }
    else // champs sont corrects ?
    {     
      $lesDonnees= $monModele->InsertIntoMedecin($nom,$prenom,$adresse,$cp,$ville,$tel,$specialite,$departement,$mail); // appel de fonction d'insertion

      header("Location: ../vue/v_confirmation.php"); // page de confirmation
    }
  }
  else
  {
    echo "<p>Données non récupérées</p>";
    echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
    die();
  }
}
// FIN TABLE MEDECIN

//___________________________________________________________________________________________________________________________\\
//___________________________________________________________________________________________________________________________\\

// ICI TABLE RAPPORT
if($table=='rapport')
{
  if(isset($_SESSION['donnees_postees']) ) // si il y a un tableau dans la session
  {
    $donnees_postees = array();
    $donnees_postees = $_SESSION['donnees_postees'];

    $idmedecin=$donnees_postees["idmedecin"];
    $idmedicament=$donnees_postees["idmedicament"];
    $quantite=$donnees_postees["quantite"];
    $date=$donnees_postees["date"];
    $motif=$donnees_postees["motif"];
    $bilan=$donnees_postees["bilan"];
    $idvisiteur=$donnees_postees["idvisiteur"];

    // Vérification des champs (si il ne sont pas vides ?)
    if(empty($idmedecin) || empty($idmedicament) || empty($quantite) || empty($date) || empty($motif) || empty($bilan))  // le signe || signifie OU
    {
      echo "<p>Un champ n'a pas été remplis</p>";
      echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
      die();
    }
    else // champs sont corrects ?
    {     
      $lesDonnees= $monModele->InsertIntoRapport($idmedecin,$idmedicament,$quantite,$date,$motif,$bilan,$idvisiteur); // appel de fonction d'insertion

      header("Location: ../vue/v_confirmation.php"); // page de confirmation
    }
  }
  else
  {
    echo "<p>Données non récupérées</p>";
    echo "<li><a href='../index.php?action=init'>Retour accueil</a></li>";
    die();
  }
}
// FIN TABLE RAPPORT

//___________________________________________________________________________________________________________________________\\

?>
