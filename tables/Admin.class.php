<?PHP
 
class Admin{
         
        //public $id_admin;
		public $mdp;
        public $login;
        public $email;
         
			public function __construct(//$id_admin=NULL,
										$mdp=NULL,			
										$login=NULL,
										$email=NULL
										)
			{
            //$this->id_admin        = $id_admin;
			$this->mdp      		 = $mdp;
            $this->login   			 = $login;
            $this->email   			 = $email;
			}
}
 
?>