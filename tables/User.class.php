<?php
//exemple de table Membre
/*
//structure SQL : 
CREATE TABLE `Membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
*/



//exemple de classe en relation avec la table
class User{
		
		public $id;
		public $mail;
		public $nom;
		public $prenom;
		public $login;
		public $pass;
		public $tel;
		public $type;
		
		public function __construct($login=NULL, $nom=NULL, $prenom=NULL, $mail=NULL, $pass=NULL, $id=NULL, $tel=NULL, $type='user'){
			$this->id = $id;			
			$this->login=$login;
			$this->nom= $nom;
			$this->prenom=$prenom;
			$this->mail=$mail;
			$this->pass=$pass;
			$this->tel=$tel;
			$this->type=$type;
		}
		
		
		//éventuellement setters et getters
		
		
}

?>