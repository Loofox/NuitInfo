<?php
 
class DemandeAideManager{
    public static function creer($e){

        $sql = "INSERT INTO etudiant VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array(
								$e->titre_aide,   
								$e->contenu_aide,
								$e->nom_demandeur,
								$e->prenom_demandeur,
								$e->num_fixe,
								$e->num_mobile,
								$e->email,		
								$e->presentation,
								$e->id_type_aide
								));
		
        $e->id=DB::get_instance()->lastInsertId();
        return $e;
             
    }
	
	public static function chercherParTitre($titre){
			$sql="SELECT * from demande_daide WHERE titre=?";
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
}