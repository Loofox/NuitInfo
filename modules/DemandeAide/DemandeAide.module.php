<?php
class DemandeAide extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Demande d'aide");		


		
		//construction d'un formulaire
		$f=new Form("?module=DemandeAide&action=valide","form1");
			$f->add_header("Faire une demande d'aide");
		
			$f->add_text("nom","nom","Votre nom");
			$f->add_text("prenom","prenom","Votre prénom");
			$f->add_text("mail","mail","Votre @Mail")->set_validation('mail');	
			$f->add_text("telf","telf","Votre numéro de téléphone fixe");
			$f->add_text("tel","telp","Votre numéro de téléphone portable");
			$f->add_text("titre","titre","Titre de la demande");
			$f->add_textarea("contenu","contenu","Votre demande");
			/* ajouter une liste déroulante */

		//règles de validation automatiques
		$f->nom->set_validation("required");
		$f->prenom->set_validation("required");
		$f->mail->set_validation("required");
		$f->mail->set_validation("mail");
		$f->tel->set_validation("required");
		$f->titre->set_validation("required");
		$f->contenu->set_validation("required");
			
		$f->contenu->set_validation("min-length:10");
		$f->titre->set_validation("min-length:10");	
		$f->telf->set_validation("min-length:10");
		$f->telf->set_validation("max-length:10");
		$f->telp->set_validation("min-length:10");
		$f->telp->set_validation("max-length:10");
		$f->add_submit("Valider","bntval")->set_value('Valider');		

		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		
		//stocke la structure du formulaire dans la session sous le nom "form"
		//pour une éventuelle réutilisation
		$this->session->form = $f;				
	}

	public function action_valide(){

		$this->set_title("Demande d'aide");
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->form;
		$form->reset_errors();


		//effectue les tests de vérification définis par l'utilisateur
		//si un des tests échoue : false
		$valide = $form->check();
	
		//On vérifie si le login est vide et s'il n'existe pas dans la base
		if($this->requete->nom == ''){
			$valide=false;
			$form->nom->set_error(true);
			$form->prenom->set_error_message("champ vide !");
		}
		
		if($this->requete->prenom == ''){
			$valide=false;
			$form->prenom->set_error(true);
			$form->prenom->set_error_message("champ vide !");
		}

		if($this->requete->mail == ''){
			$valide=false;
			$form->mail->set_error(true);
			$form->mail->set_error_message("champ vide !");
		}

		if($this->requete->telf == ''){
			$valide=false;
			$form->telf->set_error(true);
			$form->telf->set_error_message("champ vide !");
		}

		if($this->requete->telp == ''){
			$valide=false;
			$form->telp->set_error(true);
			$form->telp->set_error_message("champ vide !");
		}

		if($this->requete->titre == ''){
			$valide=false;
			$form->titre->set_error(true);
			$form->titre->set_error_message("champ vide !");
		}

		if($this->requete->contenu == ''){
			$valide=false;
			$form->contenu->set_error(true);
			$form->contenu->set_error_message("champ vide !");
		}
		//Appel à la BD via objet MembreManager
		elseif( DemandeAideManager::chercherPartitre($this->requete->titre) !== false){
			$valide=false;
			$form->titre->set_error(true);
			$form->titre->set_error_message("Il y a déjà une demande qui porte ce titre");			
		 }
		

		//si un des tests a échoué
		if( $valide==false ){	
		
			$this->site->ajouter_message('Merci de remplir tous les champs',ALERTE);			
		
			//on pré-remplit avec les valeurs déjà saisies
			$form->populate();		
			//passe le formulaire dans le template sous le nom "form"
			$this->tpl->assign("form",$form);
		}
		//tous les tests ont été validés
		else{
			$id = 1;
			//création d'une instance de Membre
			$m=new DemandeAide(
				$this->requete->titre,
				$this->requete->contenu,
				$this->requete->nom,
				$this->requete->prenom,
				$this->requete->telf,
				$this->requete->telp,
				$this->requete->mail,
				$id;		
				);

			//enregistrement (insertion) dans la base
			DemandeAideManager::creer($m);

			//passe un message pour la page suivante
			$this->site->ajouter_message('Votre demande est maintenant visible par tout le monde');			

			//redirige vers le module par défaut
			$this->site->redirect('index');
		}
			



	}

}
?>