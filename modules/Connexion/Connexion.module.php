<?php
class Connexion extends Module{
			

	public function action_login(){


		
		
		//les champs de formulaire sont Login et Pass, cf. Blocs/Login.bloc.tpl
		$login = $this->req->Login;
		$pass  = $this->req->Pass;

		if(AdminManager::chercherParLogin($login))
		{
			$a=new Admin();
			$a=AdminManager::chercherParLogin($login);
			$a->login = $login;
			
			if($a->pass == $pass)
			{
			$this->session->ouvrir($a);
	
			//passer des infos au template du bloc de login
			$this->tpl->assign('login',$a->login);
			$this->site->ajouter_message("Vous êtes connecté en tant que ".$a->login);
			}
			else{
			$this->site->ajouter_message("Mot de passe incorrects.",ALERTE);}
			
		}else{
		$this->site->ajouter_message("Identifiants incorrects.",ALERTE);
		}
		
		$this->site->redirect("index");
		
	}

	public function action_deconnect(){		
		$this->site->ajouter_message('Vous êtes déconnecté');							
		$this->session->fermer(); 			
		$this->site->redirect("index");
	}

}
?>