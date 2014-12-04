<?php
 
class DemandeAideManager{
    public static function creer($e){

        $sql = "INSERT INTO etudiant VALUES ('', ?, ?, ?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array(
								$e->titre_aide,   
								$e->contenu_aide,
								$e->nom_demandeur   	
								$e->prenom_demandeur 
								$e->num_fixe   		
								$e->num_mobile   	
								$e->email   			
								$e->presentation   	
								$e->id_type_aide
								));
		
        $e->id=DB::get_instance()->lastInsertId();
        return $e;
             
    }
	public static function supprimer($e){
	
	$sql = "";
	$res = DB::get_instance()->prepare($sql);
	$res ->execute();
	
}