<?php

class AdminManager{
	

		public static function chercherParLogin($login){
			$sql="SELECT * from admin WHERE login=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($login));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			$m= $res->fetch();			
			$admin=new Admin();
			$admin->id_admin=$m[0];
			$admin->mdp=$m[1];
			$admin->login= $m[2];
			$admin->email=$m[3];										
			return $admin;
		}
}

?>