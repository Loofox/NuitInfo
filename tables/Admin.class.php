<?PHP
 
class Admin{
        public $id_admin;
		public $mdp;
        public $login;
        public $email;
		public $type;
         
			public function __construct($id_admin=NULL,
										$mdp=NULL,			
										$login=NULL,
										$email=NULL,
										$type='admin'
										)
			{
			$this->id_admin			 = $id_admin;
			$this->mdp      		 = $mdp;
            $this->login   			 = $login;
            $this->email   			 = $email;
			$this->type=$type;
			}
}
 
?>