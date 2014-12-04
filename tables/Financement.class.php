<?PHP
 
class Financement{
         
		public $id_financement;
        public $nb_vote;
        public $contenu;

         
			public function __construct($id_financement,
										$nb_vote,
										$id_type_aide)
			{
			$this->id_financement      	 = $id_financement;
            $this->nb_vote   			 = $nb_vote;
            $this->contenu   			 = $contenu;
			}
}
 
?>