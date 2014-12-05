<?php
 
class InscriptionManager{
    public static function creer($pass,$login,$email,$nom,$prenom,$tel){

        $sql = "INSERT INTO utilisateur VALUES ('', ?, ?, ?, ?,?,?)";
        $res = DB::get_instance()->prepare($sql);
        $res -> execute(array(
								$pass,   
								$login,
								$email,
								$nom,
								$prenom,
								$tel
								));

        $e->id=DB::get_instance()->lastInsertId();
             
    }
}
?>