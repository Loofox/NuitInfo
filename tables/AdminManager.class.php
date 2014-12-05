<?php

// gestion de la partie admin
class AdminManager{
	
	public static function chercherParLogin($login){
			$sql="SELECT * from admin WHERE login=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($login));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			
			$a= $res->fetch();			
			$admin=new Admin();
			$admin->id = $a[0];			
			$admin->pass=$a[1];
			$admin->login=$a[2];
			$admin->mail=$a[3];										
			return $admin;
		}
		

}

?>