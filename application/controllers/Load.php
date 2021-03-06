<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Base_Controller.php');
class Load extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Load
	 *	- or -
	 * 		http://example.com/index.php/Load/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Load/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();

	}

	/*public function Test_Login(){
		$this->load->helper('assets');

		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');

		if(){
			$data['template'] = 'accueil.php';
			$this->load->view('template',$data);
		}else{
			$data['template'] = 'login.php';
			$this->load->view('template',$data);
		}
	}*/
	public function template($page,$data){
		
		$data['template'] = $page.'.php';
		$this->load->view('template',$data);
	}

	public function template1($page,$data){
		
		$data['template'] = $page.'.php';
		$this->load->view('template_accueil',$data);
	}
	public function get_input(){
		$input = $this->input->post('category');
		$session = $this->session->set_userdata('cate',$input);
		return $input;
	}
	public function Saisie(){

		$this->load->model('produit');
		$this->load->model('category');
		$this->load->model('achat');
		$caisse = $this->session->userdata('caisse');
		$cate_input = $this->session->userdata('cate');
		//$input=$this->get_input();
		$data['caisse'] = $caisse;

		$data['liste_produit'] = $this->produit->get_All_Produit();
		$data['liste_achat'] = $this->achat->getAchat($caisse);
		$data['liste_category']=$this->category->get_All_Category();
		$this->template('saisie',$data);
	}
	public function Valider_Commande(){

		$this->load->model('achat');
		$this->load->model('produit');

		$idProduit = $this->input->post('produit');
		$quantite = $this->input->post('quantite');
		$caisse = $this->session->userdata('caisse');

		$this->achat->insert_Achat($caisse,$idProduit,$quantite);

		$data['caisse'] = $caisse;
		$data['liste_produit'] = $this->produit->get_All_Produit();
		$data['liste_achat'] = $this->achat->getAchat($caisse);
		$this->template('saisie',$data);
	}

	public function Valider_Login(){

		$this->load->model('achat');
		$this->load->model('produit');
		$this->load->model('client');
		$user = $this->session->userdata('nom');
		$mdp = $this->session->userdata('mdp');
		$caisse = $this->session->userdata('caisse');
		$data['caisse'] = $caisse;

		$data['name'] = $user;
		//$result=$this->client->login($user,$mdp);
		$this->template1('accueil',$data);
		
		//$this->client->login ($user,$mdp);
		
		//$this->load->view('accueil',$data);

	}

	public function Changer_Caisse(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
}