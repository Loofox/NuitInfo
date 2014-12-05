<?php

class CRUDAideManager{

	public static function lister(){
		$res = DB::get_instance()->prepare("SELECT * FROM demande_daide inner join type_aide on demande_daide.id_type_aide = type_aide.id_type_aide");
		$res ->execute(array());

		$m = $res->fetchAll(PDO::FETCH_ASSOC);
		return $m;
	}
	
	public function Afficher_detail_aide($id_demande_daide)
	{
		$this->set_title("Détail");	
		
		$sql = "SELECT * FROM demande_daide inner join type_aide on demande_daide.id_type_aide = type_aide.id_type_aide WHERE id_demande_daide = ?";
		$req = DB::get_instance()->prepare($sql);
		$req -> execute(array($id_demande_daide));

		$m = $req->fetch();
		$aide= new CRUDAide();
		
		$aide->id_demande_daide = $m[0];
		$aide->titre_aide = $m[1];
		$aide->contenu_aide = $m[2];
		$aide->nom_demandeur = $m[3];
		$aide->prenom_demandeur = $m[4];
		$aide->num_fixe = $m[5];
		$aide->num_mobile = $m[6];
		$aide->email = $m[7];
		$aide->id_type_aide = $m[8];

		return $aide;
	}
}

?>