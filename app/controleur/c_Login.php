<?php
@session_start(); // le @ masque une éventuelle erreur

include ('../modele/class ModeleDonnees.php');
$monModele = new ModeleDonnees();

//___________________________________________________________________________________________________________________________\\

if(isset($_SESSION['donnees_postees']) ) // si il y a un tableau dans la session
  {
    $donnees_postees = array();
    $donnees_postees = $_SESSION['donnees_postees'];

    $login=$donnees_postees["login"];
    $mdp=$donnees_postees["mdp"];

    // Vérification des champs (si il ne sont pas vides ?)
    if( empty($login) || empty($mdp))  // le signe || signifie OU
    {
      header("Location: ../index.php?action=erreur"); // redirection vers la page vue erreur
      exit(); // interruption après redirection
    }
    else // champs sont corrects ?
    {     
      $lesDonnees= $monModele->VerifierLogin($login,$mdp); // appel de fonction d'insertion

      if($lesDonnees=='autoriser')
      {
        $Resultat= $monModele->RecupererIDlogin($login);
        if($Resultat)
        {
          $idvisiteur = $Resultat->idvisiteur;

          $_SESSION['login'] = $login ;
          $_SESSION['idvisiteur'] = $idvisiteur;

          header("Location: ../index.php?action=init");
        }
        else {
          echo "<h2>Id visiteur non trouvé</h2><p><a href='../vue/v_pasdecompte.php'>Retour</a></p>";
        }
      }
      else {
        echo "<h2>Accès non autorisé</h2><p><a href='../vue/v_pasdecompte.php'>Retour</a></p>" ;
      }
    }
  }
  else
  {
    header("Location: ../index.php?action=erreur");
    exit(); // interruption après redirection
  }

//___________________________________________________________________________________________________________________________\\
?>