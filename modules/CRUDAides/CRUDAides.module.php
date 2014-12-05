<?php
class CRUDAides extends Module{

	public function action_index(){

		$this->set_title("Liste des aides");

		$data=array();
		$data=CRUDAideManager::lister();
		$this->tpl->assign('data',$data);
	}

	public function action_detail(){
		$this->set_title("Détail");	

		$id_demande_daide = $this->req->id_demande_daide;
		$titre_aide = $this->req->titre_aide;
		$contenu_aide = $this->req->contenu_aide;
		$id_user=$this->session->user->id;
		$id_type_aide = $this->req->id_type_aide;
		
		$aide = new CRUDAide();
		$aide = CRUDAideManager::Afficher_detail_aide($id_demande_daide);
		$user_temp=UserManager::chercherParID($id_user);
		
		$login=$user_temp->login;
		$this->site->ajouter_message(" poule ".$user_temp->login);
		
		$this->tpl->assign("id_demande_daide",$id_demande_daire);	
		$this->tpl->assign("titre_aide",$conseil->titre_aide); 
		$this->tpl->assign("contenu_aide",$aide->contenu_aide);
		$this->tpl->assign("login_user",$login);
		$this->tpl->assign("id_type_aide",$id_type_aide);
	}

/*	public function action_modifier(){
		$this->set_title("Modifier");
	
		//recupère l'id et la référence 
		$id = $this->req->id;
		$ref= $this->req->ref;
		
		//passe ces informations dans le template
		
		$this->tpl->assign("id",$id);
		$this->tpl->assign("reference",$ref);		
	
		
	}
	public function action_supprimer(){
		$this->set_title("Supprimer");

		//recupère l'id et la référence 
		$id = $this->req->id;
		$ref= $this->req->ref;
		
		//passe ces informations dans le template
		
		$this->tpl->assign("id",$id);
		$this->tpl->assign("reference",$ref);		
		
	}
	

	public function action_ajouter(){
		$this->set_title("Ajouter");	
	//..préparer un formulaire	
		
	}

	public function action_detail(){
		$this->set_title("Détail");	
		
		//recupère l'id et la référence 
		$id = $this->req->id;
		$ref= $this->req->ref;
		
		//passe ces informations dans le template
		
		$this->tpl->assign("id",$id);
		$this->tpl->assign("reference",$ref);		
		
		
	}
*/
	
	
}	
?>