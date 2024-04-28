<?php
include('class ConnexionDB.php');

class ModeleDonnees
{
	private $maConnexion ;
	
	public function __construct()
	{
		$dBase = new ConnexionDB(); 
		$this->maConnexion = $dBase->get_connexion();
	}

//______________________________________________________Login______________________________________________________________________________\\

	public function VerifierLogin($le_login, $le_mdp)
	{
		$lesResultats = "non_autoriser";

		// Requête pour récupérer le hachage du mot de passe pour le login donné
		$requete = "SELECT mdp FROM visiteur WHERE login = :le_login";
		$ordre = $this->maConnexion->prepare($requete);
		$ordre->bindParam(':le_login', $le_login);
		$ordre->execute();
		$resultat = $ordre->fetch(PDO::FETCH_ASSOC); // Récupérer le résultat en tant que tableau associatif

		if ($resultat) {
			// Récupérer le hachage du mot de passe stocké dans la base de données
			$mdp_hache = $resultat['mdp'];

			// Vérifier si le mot de passe fourni correspond au hachage dans la base de données
			if (password_verify($le_mdp, $mdp_hache)) {
				$lesResultats = "autoriser";
			}
		}

		return $lesResultats;
	}
//_______
	public function RecupererIDlogin($le_login)
	{
		$nb_lignes = 0 ;

		$requete = "SELECT idvisiteur FROM visiteur WHERE login = '$le_login';";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetch(PDO::FETCH_OBJ);
		return $lesResultats;
	}

//______________________________________________________SELECT tout______________________________________________________________________________\\
	
	public function selectAll($nomTable)
	{
		$requete = "SELECT * FROM $nomTable ;";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetchAll();
		return $lesResultats;
	}
//_______
	public function selectTri($nomTable,$tri)
	{
		$requete = "SELECT * FROM $nomTable order by $tri ;";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetchAll();
		return $lesResultats;
	}

//______________________________________________________INSERT______________________________________________________________________________\\

	public function InsertIntoVisiteur($nom, $prenom, $login, $mdp, $adresse, $cp, $ville, $tel, $dateEmbauche)
	{
		// Hacher le mot de passe
		$mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);

		$requete = "INSERT INTO visiteur(nom,prenom,login,mdp,adresse,cp,ville,tel,dateEmbauche) 
					VALUES (:nom,:prenom,:login,:mdp,:adresse,:cp,:ville,:tel,:dateEmbauche);";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->bindValue(':nom', $nom);
		$ordre->bindValue(':prenom', $prenom);
		$ordre->bindValue(':login', $login);
		$ordre->bindValue(':mdp', $mdp_hache); // Utiliser le mot de passe haché
		$ordre->bindValue(':adresse', $adresse);
		$ordre->bindValue(':cp', $cp);
		$ordre->bindValue(':ville', $ville);
		$ordre->bindValue(':tel', $tel);
		$ordre->bindValue(':dateEmbauche', $dateEmbauche);
		$ordre->execute();
	}
//_______
	public function InsertIntoMedecin($nom,$prenom,$adresse,$cp,$ville,$tel,$specialite,$departement,$mail)
	{
		$requete= "INSERT INTO medecin(nom,prenom,adresse,cp,ville,tel,specialiteComplementaire,departement,mail) 
					VALUES (:nom,:prenom,:adresse,:cp,:ville,:tel,:specialite,:departement,:mail);";

		$ordre = $this->maConnexion->prepare($requete);
			$ordre->bindValue(':nom', $nom);
			$ordre->bindValue(':prenom', $prenom);
			$ordre->bindValue(':adresse', $adresse);
			$ordre->bindValue(':cp', $cp);
			$ordre->bindValue(':ville', $ville);
			$ordre->bindValue(':tel', $tel);
			$ordre->bindValue(':specialite', $specialite);
			$ordre->bindValue(':departement', $departement);
			$ordre->bindValue(':mail', $mail);
		$ordre->execute();
	}
//_______
	public function InsertIntoRapport($idmedecin, $idmedicament, $quantite, $date, $motif, $bilan, $idvisiteur)
	{
    // Insérer dans la table rapport
		$requete_rapport = "INSERT INTO rapport (date, motif, bilan, idvisiteur, idmedecin) 
							VALUES (:date, :motif, :bilan, :idvisiteur, :idmedecin);";

		$ordre_rapport = $this->maConnexion->prepare($requete_rapport);
			$ordre_rapport->bindValue(':date', $date);
			$ordre_rapport->bindValue(':motif', $motif);
			$ordre_rapport->bindValue(':bilan', $bilan);
			$ordre_rapport->bindValue(':idvisiteur', $idvisiteur);
			$ordre_rapport->bindValue(':idmedecin', $idmedecin);
		$ordre_rapport->execute();

    // Récupérer l'id généré automatiquement
    	$idrapport = $this->maConnexion->lastInsertId();

    // Insérer dans la table offrir
    	$requete_offrir = "INSERT INTO offrir (idrapport, idmedicament, quantite) 
                    		VALUES (:idrapport, :idmedicament, :quantite);";

		$ordre_offrir = $this->maConnexion->prepare($requete_offrir);
			$ordre_offrir->bindValue(':idrapport', $idrapport);
			$ordre_offrir->bindValue(':idmedicament', $idmedicament);
			$ordre_offrir->bindValue(':quantite', $quantite);
		$ordre_offrir->execute();
	}

//______________________________________________________UPDATE______________________________________________________________________________\\

	public function UpdateMedecin($idmedecin,$nom,$prenom,$adresse,$cp,$ville,$tel,$specialite,$departement,$mail)
	{
		$requete= "UPDATE medecin
		SET nom = :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville, tel = :tel, specialiteComplementaire = :specialite, departement = :departement, mail = :mail
		WHERE idmedecin = :idmedecin ;";

		$ordre = $this->maConnexion->prepare($requete);
			$ordre->bindValue(':idmedecin', $idmedecin);
			$ordre->bindValue(':nom', $nom);
			$ordre->bindValue(':prenom', $prenom);
			$ordre->bindValue(':adresse', $adresse);
			$ordre->bindValue(':cp', $cp);
			$ordre->bindValue(':ville', $ville);
			$ordre->bindValue(':tel', $tel);
			$ordre->bindValue(':specialite', $specialite);
			$ordre->bindValue(':departement', $departement);
			$ordre->bindValue(':mail', $mail);
		$ordre->execute();
	}
//_______
	public function UpdateRapport($idrapport,$motif,$bilan)
	{
		$requete= "UPDATE rapport
		SET motif = :motif, bilan = :bilan
		WHERE idrapport = :idrapport ;";

		$ordre = $this->maConnexion->prepare($requete);
			$ordre->bindValue(':idrapport', $idrapport);
			$ordre->bindValue(':motif', $motif);
			$ordre->bindValue(':bilan', $bilan);
		$ordre->execute();
	}

//______________________________________________________SELECT précis______________________________________________________________________________\\
	
	public function selectQuelMedecin()
	{
		$requete = "SELECT idmedecin, nom, prenom, specialiteComplementaire FROM medecin ;";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetchAll(PDO::FETCH_ASSOC);
		return $lesResultats;
	}
//_______
	public function selectQuelMedicament()
	{
		$requete = "SELECT idmedicament, nomCommercial, libelle FROM medicament JOIN famille ON medicament.idfamille = famille.idfamille ;";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetchAll(PDO::FETCH_ASSOC);
		return $lesResultats;
	}
//_______
	public function selectAvecDate($nomTable,$la_date)
	{
		$nb_lignes = 0 ;

		$requete = "SELECT * FROM $nomTable WHERE date = '$la_date' ;";

		if(empty($la_date)){
			echo "<h2>Date non valide !<h2><p><a href='../index.php?action=liste&table=rapport'>Retour à la liste</a></p>";
			die();
		}

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$nb_lignes = $ordre->rowCount();

		if($nb_lignes==0) {
			$lesResultats = "AucuneDate" ;
		}
		else {
			$lesResultats=array();
			$lesResultats = $ordre->fetchAll();
		}
		return $lesResultats;
	}
//_______
	public function selectAvecNom($nomTable,$le_nom)
	{
		$nb_lignes = 0 ;

		$requete = "SELECT * FROM $nomTable WHERE LOWER(nom) = LOWER('$le_nom') ;";

		if(empty($le_nom)){
			echo "<h2>Veuillez remplir le champ avant de valider !<h2><p><a href='../index.php?action=liste&table=medecin'>Retour à la liste</a></p>";
			die();
		}

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$nb_lignes = $ordre->rowCount();

		if($nb_lignes==0) {
			$lesResultats = "AucunNom" ;
		}
		else {
			$lesResultats=array();
			$lesResultats = $ordre->fetchAll();
		}
		return $lesResultats;
	}
//_______
	public function selectUnMedecin($nomTable,$idmedecin)
	{
		$requete = "SELECT * FROM $nomTable WHERE idmedecin = $idmedecin ;";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetchAll();
		return $lesResultats;
	}
//_______
	public function selectUnRapport($nomTable,$idrapport)
	{
		$requete = "SELECT * FROM $nomTable WHERE idrapport = $idrapport ;";

		$ordre = $this->maConnexion->prepare($requete);
		$ordre->execute();
		$lesResultats=array();
		$lesResultats = $ordre->fetchAll();
		return $lesResultats;
	}
}
?>
