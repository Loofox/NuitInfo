<?php
class CRUDConseils extends Module{

	public function action_index(){

		$this->set_title("Liste des conseils");

		$data=array();
		$data=CRUDConseilManager::lister();
		$this->tpl->assign('data',$data);
	}

	public function action_detail(){
		$this->set_title("Détail");	

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

	public function action_supprimer(){
		$this->set_title("Supprimer");

		$id_tuto=$this->req->id_tuto;

		CRUDConseilManager::supprimer($id_tuto);

		$this->site->redirect($module="CRUDConseils",$action="index");		
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
	
*/	

	public function action_ajouter(){
		$this->set_title("Formulaire de redaction de conseils");		


		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=CRUDConseils&action=valide","form1");

		
			$f->add_text("titre_conseil","titre_conseil","Titre")->set_required();			
			$f->add_textarea("contenu","contenu","Contenu")->set_required();	
			$f->add_text("date_parution","date_parution","Date parution")->set_required();			
			$f->add_text("type_conseil","type_conseil","Type du conseil")->set_required();		

		//règles de validation automatiques	
		$f->titre_conseil->set_validation("max-length:128"); 
		$f->contenu->set_validation("max-length:8000");
		$f->date_parution->set_validation("date:d-m-Y");		
		$f->type_conseil->set_validation("max-length:64"); 


		$f->add_submit("Valider","bntval")->set_value('Valider');		

		//pré-remplissage du formulaire avec des valeurs par défaut
		$f->populate();

		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		
		//stocke la structure du formulaire dans la session sous le nom "form"
		//pour une éventuelle réutilisation
		$this->session->form = $f;	
	}

	
	
	public function action_valide(){

		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->form;
		$form->reset_errors();


		//effectue les tests de vérification définis par l'utilisateur
		//si un des tests échoue : false
		$valide = $form->check();
	

		if($this->requete->titre_conseil == ''){
			$valide=false;
			$form->titre_conseil->set_error(true);
			$form->titre_conseil->set_error_message("champ vide !");
		}
		elseif($this->requete->contenu == ''){
			$valide=false;
			$form->contenu->set_error(true);
			$form->contenu->set_error_message("champ vide !");
		}
		elseif($this->requete->date_parution == ''){
			$valide=false;
			$form->date_parution->set_error(true);
			$form->date_parution->set_error_message("champ vide !");
		}
		elseif($this->requete->type_conseil == ''){
			$valide=false;
			$form->type_conseil->set_error(true);
			$form->type_conseil->set_error_message("champ vide !");
		}

		//si un des tests a échoué
		if( $valide==false ){	
		
			$this->site->ajouter_message('Tous les champs ne sont pas remplis.',ALERTE);			

			//on pré-remplit avec les valeurs déjà saisies
			$form->populate();		
			//passe le formulaire dans le template sous le nom "form"
			$this->tpl->assign("form",$form);
		}
		//tous les tests ont été validés
		else{

			//création d'une instance de ApportAide
			$m=new Conseil(
							$this->requete->titre_conseil,
							$this->requete->contenu,
							$this->requete->date_parution,
							$this->requete->type_conseil);

			//enregistrement (insertion) dans la base
			ConseilManager::creer($m);

			//passe un message pour la page suivante
			$this->site->ajouter_message('L\ajout de conseil est enregistrée!');			

			//redirige vers le module par défaut
			$this->site->redirect('index');
		}
			



	}
	
	
	
}	
?>