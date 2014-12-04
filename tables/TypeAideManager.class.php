<?php
 
class TypeAideManager{
    public static function creer($e){

        $sql = "INSERT INTO etudiant VALUES ('', ?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array($e->type));
		
        $e->id=DB::get_instance()->lastInsertId();
        return $e;
             
    }

    public static function listeTypeAide()
    {
    	$sql = "SELECT * FROM type_aide";
		$res = DB::get_instance()->prepare($sql);
		$res -> execute();

		//gérer les erreurs éventuelles
		if($res->rowCount()==0){
			return false;
		}


		$m = array();
		while( $ligne =  $res->fetch(PDO::FETCH_ASSOC)){
				$m[ $ligne["id_type_aide"] ] = $ligne["type"];
			}	
		return $m;
    }
}