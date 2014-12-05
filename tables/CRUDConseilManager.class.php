<?php

class CRUDConseilManager{

	public static function lister(){
		$res = DB::get_instance()->prepare("SELECT * FROM conseil");
		$res ->execute(array());

		$m = $res->fetchAll(PDO::FETCH_ASSOC);
		return $m;
	}
	
	public function Afficher_detail_conseil($id_tuto){
		$this->set_title("Détail");	
		
		$sql = "SELECT * FROM conseil WHERE id_tuto = ?";
		$req = DB::get_instance()->prepare($sql);
		$req -> execute(array($id_tuto));

		$m = $req->fetch();
		$conseil= new CRUDConseil();
		$conseil->id_tuto = $m[0];
		$conseil->titre_conseil = $m[1];
		$conseil->contenu = $m[2];
		$conseil->date_parution = $m[3];
		$conseil->type_conseil = $m[4];

		return $conseil;
		}
}

?>