<?php
 
class DemandeAideManager{
    public static function creer($e){

        $sql = "INSERT INTO demande_daide VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array(
								$e->titre_aide,   
								$e->contenu_aide,
								$e->nom_demandeur,
								$e->prenom_demandeur,
								$e->num_fixe,
								$e->num_mobile,
								$e->email,		
								$e->id_type_aide
								));

        $e->id=DB::get_instance()->lastInsertId();
        return $e;
             
    }
	
	public static function chercherParTitre($titre){
			$sql="SELECT * from demande_daide WHERE titre_aide=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($titre));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			$m= $res->fetch();			
			$titre=new DemandeAide();
			$titre->id_demande_daide=$m[0];
			$titre->titre_aide=$m[1];
			$titre->contenu_aide= $m[2];
			$titre->nom_demandeur=$m[3];	
			$titre->prenom_demandeur=$m[4];
			$titre->num_fixe=$m[5];
			$titre->num_mobile=$m[6];
			$titre->email=$m[7];
			$titre->presentation=$m[8];
			$titre->id_type_aide=$m[9];
			return $titre;
		}
	public static function chercherPdf(){
		$sql = "SELECT * FROM demande_daide";
		$res = DB::get_instance()->prepare($sql);
		$res -> execute();

		//gérer les erreurs éventuelles
		if($res->rowCount()==0){
			return false;
		}


		$m = array();
		$i=0;
		
		while( $ligne =  $res->fetch(PDO::FETCH_ASSOC)){
				$da = new DemandeAide();

				$da->id_demande_daide	=$ligne["id_demande_daide"];
				$da->titre_aide			=$ligne["titre_aide"];
				$da->contenu_aide		=$ligne["contenu_aide"];
				$da->nom_demandeur		=$ligne["nom_demandeur"];
				$da->prenom_demandeur	=$ligne["prenom_demandeur"];
				$da->num_fixe 			=$ligne["num_fixe"];
				$da->num_mobile			=$ligne["num_mobile"];
				$da->email 				=$ligne["email"];
				$da->id_type_aide		=$ligne["id_type_aide"];

				$m[$i]=$da;
				$i=$i+1;
			}
			
		return $m;
	}	
}