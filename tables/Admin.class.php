<?PHP
 
class Admin{
         
		public $mdp;
        public $login;
        public $email;
         
			public function __construct(
										$mdp=NULL,			
										$login=NULL,
										$email=NULL
										)
			{
			$this->mdp      		 = $mdp;
            $this->login   			 = $login;
            $this->email   			 = $email;
			}
}
 
?>