<?php

// gestion de la partie admin
class IPManager{
	
	public static function chercherIP($IP){
			$sql="SELECT * from ip WHERE adresse_ip=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($IP));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			else
				return true;
	}


	public static function ajouterIP($IP){
		$sql="INSERT INTO ip VALUES (?)";
		$res=DB::get_instance()->prepare($sql);
		$res->execute(array($IP));
		//gérer les erreurs éventuelles
		if($res->rowCount()==0){
			return false;
		}
	}

}

?>