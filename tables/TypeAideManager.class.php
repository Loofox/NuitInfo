<?php
 
class TypeAideManager{
    public static function creer($e){

        $sql = "INSERT INTO etudiant VALUES ('', ?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array($e->type));
		
        $e->id=DB::get_instance()->lastInsertId();
        return $e;
             
    }
}