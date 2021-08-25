<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Client extends CI_Model{
	
	public function get_All_Client(){
		$query = $this->db->query('SELECT * FROM customer');
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
	}
	public function insert_client($namecustomer,$sexe,$region,$age,$montant){
		$sql = "INSERT INTO customer VALUES (%s,%s,%s,%s,%s)";
		$sql = sprintf($sql,$this->db->escape($namecustomer),$this->db->escape($sexe),$this->db->escape($region),$this->db->escape($age),$this->db->escape($montant));
		$this->db->query($sql);
	}
	
	public function delete_client($idcustomer){
		$sql = "DELETE FROM customer WHERE idcustomer= %s ";
		$sql = sprintf($sql,$this->db->escape($idcustomer));
		$this->db->query($sql);

}
public function login($user,$mdp)
	{
		$valiny = 0;
		$query = $this->db->query("SELECT COUNT(*) as count from customer where namecustomer=.$user.");
		//$query = sprintf($query,$this->db->escape($user));
		$query = $this->db->query($query);
		foreach ($query->result_array() as $row ) {
			if($row['count'] == 1)
			{
				$valiny=1;
			}
			else
			{
				$valiny = 0;
			}
		}
		return $valiny;
	}
}
 ?>