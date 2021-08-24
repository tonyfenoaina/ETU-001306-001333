<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Achat extends CI_Model{
	
	public function get_All_Achat(){
		$query = $this->db->query('SELECT * FROM Achat');
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
	}
	public function insert_Achat($idCaisse,$idProduit,$quantite){
		$sql = "INSERT INTO Achat VALUES (%s,%s,%s)";
		$sql = sprintf($sql,$this->db->escape($idCaisse),$this->db->escape($idProduit),$this->db->escape($quantite));
		$this->db->query($sql);
	}
	public function getAchat($idCaisse){
		$sql = "select Produit.designation as nomProduit,Produit.prixUnitaire as prixUnitaire,Achat.quantite as quantite,(Produit.prixUnitaire*Achat.quantite) as montant from Achat Join Produit on Achat.idProduit = Produit.idProduit where Achat.idCaisse = %s";
		$sql = sprintf($sql,$this->db->escape($idCaisse));
		echo "<br><br><br>".$sql;
		$query = $this->db->query($sql);
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
	}
}
?>