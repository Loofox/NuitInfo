<?PHP
 
class DemandeDaide{
         
        //public $id_demande_daide;
		public $titre_aide;
        public $contenu_aide;
        public $nom_demandeur;
        public $prenom_demandeur;
        public $num_fixe;
        public $num_mobile;
        public $email;
        public $presentation;
		public $id_type_aide;
         
			public function __construct(//$id_demande_daide=NULL,
										$titre_aide=NULL,			
										$contenu_aide=NULL,
										$nom_demandeur=NULL,
										$prenom_demandeur=NULL,
										$num_fixe=NULL,
										$num_mobile=NULL,
										$email=NULL,
										$presentation=NULL,
										$id_type_aide=NULL)
			{
            //$this->id_demande_daide        = $id_demande_daide;
			$this->titre_aide      			 = $titre_aide;
            $this->contenu_aide   			 = $contenu_aide;
            $this->nom_demandeur   			 = $nom_demandeur;
            $this->prenom_demandeur   		 = $prenom_demandeur;
            $this->num_fixe   				 = $num_fixe;
            $this->num_mobile   			 = $num_mobile;
            $this->email   					 = $email;
            $this->presentation   			 = $presentation;
            $this->id_type_aide              = $id_type_aide;
			}
}
 
?>