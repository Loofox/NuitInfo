<?php
class Inscription extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Inscription");		
		
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=Inscription&action=valide","form1");

		//construction sous forme de tableau
		//chaque champ est déclaré sous la forme d'un tableau de paramètres
		$f->build_from_array(array(
			array(
					'type'=>'text',
					'name'=>'login',
					'id'=>'login',
					'label'=>'Pseudo',
					'required'=>true,
					'validation'=>'required'
				),
				
			array(
					'type'=>'password',
					'name'=>'pass',
					'id'=>'pass',
					'label'=>'Passe',
					'required'=>true,
					'validation'=>'required|min-length:4'
					

				),
				
			array(
					'type'=>'password',
					'name'=>'passverif',
					'id'=>'passverif',
					'label'=>'Retapez...',
					'required'=>true,
					'validation'=>'equals-field:pass'
				),
			array(
					'type'=>'text',
					'name'=>'nom',
					'id'=>'nom',
					'label'=>'Nom'
				),
			array(
					'type'=>'text',
					'name'=>'pnom',
					'id'=>'pnom',
					'label'=>'Prénom'
				),
			array(
					'type'=>'text',
					'name'=>'tel',
					'id'=>'tel',
					'label'=>'Téléphone'

				),	
			array(
					'type'=>'text',
					'name'=>'email',
					'id'=>'email',
					'label'=>'email'

				),
			array(
					'type'=>'submit',
					'name'=>'sub',
					'id'=>'sub',
					'value'=>'Valider'
				)
				
		));

		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		
		//stocke la structure du formulaire dans la session sous le nom "form"
		//pour une éventuelle réutilisation
		$this->session->formulaire = $f;		

	}

	public function action_valide(){

		$this->set_title("Inscription");
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->formulaire;
		$form->reset_errors();
		//attention, suite à certaines remarques vues en TD, 
		//le nom de la fonction a changé (valid-->check)
		//retourne true si OK, false sinon
		//cf sur git : class Form.class.php
		$valide = $form->check();
		
		if($this->requete->login == ''){
			$valide=false;
			$form->login->set_error(true);
			$form->login->set_error_message("champ vide !");
		}
		elseif($this->requete->pass == ''){
			$valide=false;
			$form->pass->set_error(true);
			$form->pass->set_error_message("champ vide !");
		}
		elseif($this->requete->nom == ''){
			$valide=false;
			$form->nom->set_error(true);
			$form->nom->set_error_message("champ vide !");
		}
		elseif($this->requete->pnom == ''){
			$valide=false;
			$form->pnom->set_error(true);
			$form->pnom->set_error_message("champ vide !");
		}
		elseif($this->requete->email == ''){
			$valide=false;
			$form->email->set_error(true);
			$form->email->set_error_message("champ vide !");
		}
		elseif($this->requete->tel == ''){
			$valide=false;
			$form->tel->set_error(true);
			$form->tel->set_error_message("champ vide !");
		}
		
		if(!$valide){
			//re-remplir le forumulaire		
			$form->populate();
			//choisir d'afficher le template index (plutot que "valide")
			//c'est une solution qui permet d'avoir un seul template pour les deux actions
			$this->site->ajouter_message('Tous les champs ne sont pas remplis.',ALERTE);
			//$this->set_tpl_name("index");
			//assigner le formulaire à la variable de template
			$this->tpl->assign('form',$form);			
			
		}else{

			InscriptionManager::creer($this->requete->pass,$this->requete->login,$this->requete->email,$this->requete->nom,$this->requete->pnom,$this->requete->tel);
			
			//rediriger vers une autre page
			$this->site->ajouter_message("Inscription confirmée");	
			$this->site->redirect("inscription","confirme");
			//ne pas laisser le framework continuer le traitement 
			exit;
			
			//on pourrait choisir d'afficher simplement un autre template
			//mais on ne doit pas rester sur la page dans laquelle un traitement de BD
			//a eu lieu (INSERT, DELETE, UPDATE...)
			
		}

	}
	
	public function action_confirme(){
		//pas de traitement particulier, on passe la main au template		
	}

}
?>