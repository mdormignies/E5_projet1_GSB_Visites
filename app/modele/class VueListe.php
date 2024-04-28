<?php

class VueListe {
	
	private $_donnees = array() ; 
	private $_table;
	
	public function __construct($donnees = '?',$table='?')
	{	
		$this->_donnees = $donnees; 
		$this->_table = $table; 
	}
	
	public function afficher()
	{
		
		if($this->_donnees == '?' OR $this->_table == '?')
		{
			header("Location: ../index.php?action=erreur");// ou erreur 404
		}
		else
		{
			include ('../vue/v_liste_donnees.php'); // charge la vue
		}
	}
	
}