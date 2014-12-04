<?php
 
class FinancementManager{

	
	public static function chercherParId($id_financement){
			$sql="SELECT * from demande_daide WHERE id_financement=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($out));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			$m= $res->fetch();			
			$out=new DemandeAide();
			$out->id_financement=$m[0];
			$out->nb_vote=$m[1];
			$out->contenu= $m[2];
			return $out;
		}
}