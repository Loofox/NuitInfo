<?php
/**

*/
class CRUDConseil
{
	public $id_tuto;
	public $titre_conseil;
	public $contenu;
	public $date_parution;
	public $type_conseil;


	public function __construct($titre_conseil, $contenu, $date_parution, $type_conseil)
	{
		$this->id_tuto = $id_tuto;
		$this->titre_conseil = $titre_conseil;
		$this->contenu = $contenu;
		$this->date_parution = $date_parution;
		$this->type_conseil = $type_conseil;
	}
}
?>