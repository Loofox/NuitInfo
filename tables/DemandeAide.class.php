<?PHP
 
class DemandeDAide{
         
		public $titre_aide;
        public $contenu_aide;
        public $id_user;
		public $id_type_aide;
         
			public function __construct(
										$titre_aide,			
										$contenu_aide,
										$id_user,
										$id_type_aide)
			{
			$this->titre_aide    	    = $titre_aide;
            $this->contenu_aide  	    = $contenu_aide;
			$this->id_user=$id_user;
            $this->id_type_aide	 	= $id_type_aide;

			}
}
 
?>