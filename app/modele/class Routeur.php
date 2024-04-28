<?php
class Routeur
{
	private $_action;
	private $_table;
	private $_route; // chemin du fichier contrôleur
	
	public function __construct()
	{	
		$this->_action = '?'; 
		$this->_route = '?'; 
		$this->_table = '?';
		$this->_tri = '?'; 
		$this->_idmedecin = NULL;
		$this->_idrapport = NULL;
	}
	
	private function set_chemin_controleur()
	{
		switch($this->_action) {
			case 'init' : 
				{
					$this->_route = './controleur/c_Accueil.php?type=init';
					break;
				}
			case 'login' : 
				{
					$this->_route = './controleur/c_Accueil.php?type=login';
					break;
				}
			case 'inscription' : 
				{
					$this->_route = './controleur/c_Inscription.php';
					break;
				}
			case 'deconnexion' : 
				{
					$this->_route = './controleur/c_Deconnexion.php';
					break;
				}
			case 'controleLogin' : 
				{
					$this->_route = './controleur/c_Login.php';
					break;
				}				
			case 'liste' : 
				{
					
					$this->_route = './controleur/c_Liste.php?table='.$this->_table.'&tri='.$this->_tri;
					break;
				}
			case 'ajouter' :
				{
					
					$this->_route = './controleur/c_Ajouter.php?table='.$this->_table;
					break;
				}
			case 'selectionner' :
				{					
					$this->_route = './controleur/c_Selectionner.php?table='.$this->_table.'&idmedecin='.$this->_idmedecin.'&idrapport='.$this->_idrapport;
					break;
				}
			case 'modifier' : 
				{
					$this->_route = './controleur/c_Modifier.php';
					break;
				}
			case 'chercher' :
				{
					
					$this->_route = './controleur/c_Chercher.php?table='.$this->_table;
					break;
				}
	
			default:
			{ 	$this->_route = './controleur/c_Accueil.php?type=erreur' ; }
		}
	}
	
	public function rediriger($action,$table,$tri,$idmedecin, $idrapport)
	{
		$this->_action = $action;
		$this->_table = $table; // '?' si inexistante
		$this->_tri = $tri; // '?' si inexistant
		$this->_idmedecin = $idmedecin; // '?' si inexistant
		$this->_idrapport = $idrapport; // '?' si inexistant
		$this->set_chemin_controleur();
		$url = $this->_route;
		header("Location: $url"); // redirige
		die ("erreur inattendue");
	}
}
?>