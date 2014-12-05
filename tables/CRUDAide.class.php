<?php
class CRUDAide
{
	public $id_demande_daide;
	public $titre_aide;
	public $contenu_aide;
	public $nom_demandeur;
	public $prenom_demandeur;
	public $num_fixe;
	public $num_mobile;
	public $email;
	public $id_type_aide;


	public function __construct($titre_aide, $contenu_aide, $nom_demandeur, $prenom_demandeur, $num_fixe, $num_mobile, $email, $id_type_aide)
	{
		$this->id_demande_daide = $id_demande_daide;
		$this->titre_aide = $titre_aide;
		$this->contenu_aide = $contenu_aide;
		$this->nom_demandeur = $nom_demandeur;
		$this->prenom_demandeur = $prenom_demandeur;
		$this->num_fixe = $num_fixe;
		$this->num_mobile = $num_mobile;
		$this->email = $email;
		$this->id_type_aide = $id_type_aide;
	}
}
?>