<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('car');	
		$this->load->helper(array('form','url'));	

	}

	public function index()
	{
		$data['car'] = $this->car->getAllCar();
		$this->load->view('Cardata',$data);
	}

	public function insert()
	{
		$data = array(
			'userID' => $this->input->post('userID'), 
			'carName' => $this->input->post('carName')

		);
		$this->car->insertCar($data);
		$data['car'] = $this->car->getAllCar();
		$this->load->view('Showcar',$data);
	}

	public function update()
	{
		$data = array(
			'carName' => $this->input->post('carName')
		);
		$carID = $this->input->post('carID');
		$this->car->updateCar($data,$carID);
		$data['car'] = $this->car->getAllCar();
		$this->load->view('Showcar',$data);
	}

	public function getone($carID)
	{
		$data['car'] = $this->car->getOneCar($carID);
		$this->load->view('updatecar',$data);
	}

	public function delete($carID)
	{
		$this->car->deleteCar($carID);
		$data['car'] = $this->car->getAllCar();
		$this->load->view('Showcar',$data);
	}

	public function infoCar()
	{
		$data['car'] = $this->car->getInfoCar();
		$this->load->view('Showinfocar',$data);
	}

}
