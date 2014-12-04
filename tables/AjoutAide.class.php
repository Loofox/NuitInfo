<?PHP
 
class AjoutAide{
		public $titre_apport;
        public $contenu_apport;
        public $nom_personne;
        public $prenom_personne;
        public $num_fixe;
        public $num_mobile;
        public $email;
        public $presentation;
		public $id_type_apport;
         
			public function __construct(
										$titre_apport=NULL,			
										$contenu_apport=NULL,
										$nom_personne=NULL,
										$prenom_personne=NULL,
										$num_fixe=NULL,
										$num_mobile=NULL,
										$email=NULL,
										$presentation=NULL,
										$id_type_apport=NULL)
			{
			$this->titre_apport    	    = $titre_apport;
            $this->contenu_apport  	    = $contenu_apport;
            $this->nom_personne		   	= $nom_personne;
            $this->prenom_personne      = $prenom_personne;
            $this->num_fixe    			= $num_fixe;
            $this->num_mobile   		= $num_mobile;
            $this->email    			= $email;
            $this->presentation   		= $presentation;
            $this->id_type_apport	 	= $id_type_apport;

			}
}
 
?>