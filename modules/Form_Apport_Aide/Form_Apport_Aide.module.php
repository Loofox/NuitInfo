<?php
class Form_Apport_Aide extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Formulaire de proposition de service");		

		$TypeAide = TypeAideManager::listeTypeAide();

		
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=Form_Apport_Aide&action=valide","form1");
			$f->add_header("Formulaire de proposition de service");
		
			$f->add_text("titre","titre","Titre")->set_required();	
			$f->add_select("choixAide","choixAide","Type d'aide",$TypeAide)->set_required();			
			$f->add_text("nom","nom","Nom")->set_required();	
			$f->add_text("prenom","prenom","Prenom")->set_required();			
			$f->add_text("numFixe","numFixe","N° de votre téléphone fixe")->set_required();	
			$f->add_text("numPortable","numPortable","N° de votre téléphone mobile")->set_required();		
			$f->add_text("mail", "mail", "Mail")->set_required();			
			$f->add_textarea("contenu","contenu","Contenu")->set_required();				
			$f->add_textarea("presentation","presentation","Petite présentation personnel")->set_required();	

		//règles de validation automatiques	
		$f->titre->set_validation("max-length:128"); 
		$f->nom->set_validation("max-length:64");
		$f->prenom->set_validation("max-length:64");  	
		$f->numFixe->set_validation("max-length:11" | "min-length:11"); 
		$f->numPortable->set_validation("max-length:11" | "min-length:11");
		$f->mail->set_validation("max-length:128");
print_r($TypeAide);

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

		$this->set_title("Formulaire de proposition de service");	
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->form;
		$form->reset_errors();


		//effectue les tests de vérification définis par l'utilisateur
		//si un des tests échoue : false
		$valide = $form->check();
	

		if($this->requete->titre == ''){
			$valide=false;
			$form->titre->set_error(true);
			$form->titre->set_error_message("champ vide !");
		}
		elseif($this->requete->nom == ''){
			$valide=false;
			$form->nom->set_error(true);
			$form->nom->set_error_message("champ vide !");
		}
		elseif($this->requete->prenom == ''){
			$valide=false;
			$form->prenom->set_error(true);
			$form->prenom->set_error_message("champ vide !");
		}
		elseif($this->requete->numFixe == ''){
			$valide=false;
			$form->numFixe->set_error(true);
			$form->numFixe->set_error_message("champ vide !");
		}
		elseif($this->requete->numPortable == ''){
			$valide=false;
			$form->numPortable->set_error(true);
			$form->numPortable->set_error_message("champ vide !");
		}
		elseif($this->requete->mail == ''){
			$valide=false;
			$form->mail->set_error(true);
			$form->mail->set_error_message("champ vide !");
		}
		elseif($this->requete->contenu == ''){
			$valide=false;
			$form->contenu->set_error(true);
			$form->contenu->set_error_message("champ vide !");
		}
		elseif($this->requete->presentation == ''){
			$valide=false;
			$form->presentation->set_error(true);
			$form->presentation->set_error_message("champ vide !");
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
			$m=new AjoutAide($this->requete->titre,
						$this->requete->contenu,
						$this->requete->nom,
						$this->requete->prenom,
						$this->requete->numFixe,
						$this->requete->numPortable,
						$this->requete->mail,
						$this->requete->presentation,
						$this->requete->choixAide
						);

			//enregistrement (insertion) dans la base
			AjoutAideManager::creer($m);

			//passe un message pour la page suivante
			$this->site->ajouter_message('L\'annonce d\'apport d\'aide est enregistrée');			

			//redirige vers le module par défaut
			$this->site->redirect('index');
		}
			



	}

}
?>