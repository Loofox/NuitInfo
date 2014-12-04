<?php
 
class AjoutAideManager{
    public static function creer($e){
             
     
        $sql = "INSERT INTO apport_aide VALUES ('', ?, ?, ?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array(
								$e->titre_apport,   
								$e->contenu_apport,
								$e->nom_personne,
								$e->prenom_personne,
								$e->num_fixe,
								$e->num_mobile,
								$e->email,
								$e->presentation,
								$e->id_type_apport));
		
        $e->id=DB::get_instance()->lastInsertId();
        return $e;
             
    }
}