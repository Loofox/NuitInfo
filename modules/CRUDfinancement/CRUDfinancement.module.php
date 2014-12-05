<?php
class CRUDfinancement extends Module{

	public function action_index(){

		$this->set_title("Liste");

		$data=FinancementManager::listefinancement();
		
		$this->tpl->assign('data',$data);

		$add = $_SERVER['REMOTE_ADDR'];
		echo $add;

	}
	
	public function action_modifier(){
		$this->set_title("Modifier");
	
		// recupère l'id et la référence 
		$id = $this->req->id;
		$ref= $this->req->ref;
		
		// passe ces informations dans le template
		
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

	
	public function action_vote($id_financement){

		$id_financement = $this->req->id;
		$nb_vote = $this->req->nb_vote;

		$nb_vote++;
		FinancementManager::vote($id_financement, $nb_vote);

		$this->site->ajouter_message('Votre vote a bien été pris en comtpe.');

		$this->site->redirect('CRUDfinancement');

	}
	

}	
?>