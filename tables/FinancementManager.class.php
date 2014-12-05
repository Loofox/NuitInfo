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
		
	public static function listefinancement()
    {
    	$sql = "SELECT * FROM financement";
		$res = DB::get_instance()->prepare($sql);
		$res -> execute();

		//gérer les erreurs éventuelles
		if($res->rowCount()==0){
			return false;
		}


		$m = array();
		$i=0;
		
		while( $ligne =  $res->fetch(PDO::FETCH_ASSOC)){
				$da = new Financement();
				$da->id_financement=$ligne["id_financement"];
				$da->nb_vote=$ligne["nb_vote"];
				$da->contenu=$ligne["contenu"];
				
				$m[$i]=$da;
				$i=$i+1;
			}
			
		return $m;
    }

    	public static function vote($id_financement, $nb_vote){

			$sql="UPDATE financement SET nb_vote = ? WHERE id_financement = ?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($nb_vote, $id_financement));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;

		}
	}

}