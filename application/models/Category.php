<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Category extends CI_Model{
	
	public function get_All_Category(){
		$query = $this->db->query('SELECT * FROM Category');
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
	}
	public function insert_Category($idProduit,$designationCategory){
		$sql = "INSERT INTO Category (idproduit,designationCategory) VALUES (%s,%s)";
		$sql = sprintf($sql,$this->db->escape($idProduit),$this->db->escape($designationCategory));
		$this->db->query($sql);
	}
	
}
?>