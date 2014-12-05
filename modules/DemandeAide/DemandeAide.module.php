<?php
class DemandeAide extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Demande d'aide");		

		$TypeAide = TypeAideManager::listeTypeAide();

		
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=DemandeAide&action=valide","form1");
			$f->add_header("Faire une demande d'aide");
		
			$f->add_text("titre","titre","Titre")->set_required();	
			$f->add_select("choixAide","choixAide","Type d'aide",$TypeAide)->set_required();		
			$f->add_textarea("contenu","contenu","Contenu")->set_required();				
	

		//règles de validation automatiques	
		$f->titre->set_validation("max-length:128"); 
		


		$f->add_submit("Valider","bntval")->set_value('Valider');		

		//pré-remplissage du formulaire avec des valeurs par défaut
		$f->populate();

		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		
		//stocke la structure du formulaire dans la session sous le nom "form"
		//pour une éventuelle réutilisation
		$this->session->form_1 = $f;				
	}

	public function action_valide(){

		$this->set_title("Faire une demande d'aide");	
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->form_1;
		$form->reset_errors();


		//effectue les tests de vérification définis par l'utilisateur
		//si un des tests échoue : false
		$valide = $form->check();
	

		if($this->requete->titre == ''){
			$valide=false;
			$form->titre->set_error(true);
			$form->titre->set_error_message("champ vide !");
		}
		elseif($this->requete->contenu == ''){
			$valide=false;
			$form->contenu->set_error(true);
			$form->contenu->set_error_message("champ vide !");
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
			$m=new DemandeDAide($_POST["titre"],
						$_POST["contenu"],
						$this->session->user->id,
						$_POST["choixAide"]
						);

			//enregistrement (insertion) dans la base
			DemandeAideManager::creer($m);

			//passe un message pour la page suivante
			$this->site->ajouter_message('Votre demande est maintenant visible par tous !');			

			//redirige vers le module par défaut
			$this->site->redirect('index');
		}
			



	}

}
?>