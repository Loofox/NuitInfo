<?php
<<<<<<< HEAD
//require(dirname(__FILE__).'\..\..\pdf\fpdf.php');  // pour pouvoir utiliser la librairie fpdf dans les modules qui exdends THE modul

class Index extends Module{
=======
class index extends Module{
>>>>>>> 16f32ce6d1ecbc69bf53bc72d6950f75a28ed10c

	public function action_index(){

		$this->set_title("Liste des conseils");

		$data=array();
		$data=CRUDConseilManager::lister();
		$this->tpl->assign('data',$data);

	}

	public function action_detail(){
		$this->set_title("Détails");	

		$id_tuto = $this->req->id_tuto;
		$titre_conseil = $this->req->titre_conseil;
		$contenu = $this->req->contenu;
		$date_parution = $this->req->date_parution;
		$type_conseil = $this->req->type_conseil;
		
		$conseil = new CRUDConseil();
		$conseil = CRUDConseilManager::Afficher_detail_conseil($id_tuto);

		$this->tpl->assign("id_tuto",$id_tuto);	
		$this->tpl->assign("titre_conseil",$conseil->titre_conseil); 
		$this->tpl->assign("contenu",$conseil->contenu);
		$this->tpl->assign("date_parution",$date_parution);
		$this->tpl->assign("type_conseil",$type_conseil);
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