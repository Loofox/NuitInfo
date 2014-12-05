<?PHP
 
class Financement{
         
		public $id_financement;
        public $nb_vote;
        public $contenu;

         
			public function __construct($nb_vote=NULL,
										$contenu=NULL,
										$id_financement=NULL)
			{
			$this->id_financement      	 = $id_financement;
            $this->nb_vote   			 = $nb_vote;
            $this->contenu   			 = $contenu;
			}
}
 
?>