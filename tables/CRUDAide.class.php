<?php
class CRUDAide
{
	public $id_demande_daide;
	public $titre_aide;
	public $contenu_aide;
	public $id_user
	public $id_type_aide;


	public function __construct($id_demande_daide,$titre_aide, $contenu_aide, $id_user, $id_type_aide)
	{
		$this->id_demande_daide = $id_demande_daide;
		$this->titre_aide = $titre_aide;
		$this->contenu_aide = $contenu_aide;
		$this->id_user=$id_user;
		$this->id_type_aide = $id_type_aide;
	}
}
?>