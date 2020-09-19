<?php

class CarModel extends CI_model
{
	
	public function getAllCar()
	{
		$data = $this->db->select('*')->from('car')->get();
		$result = $data->result();
		return $result;
	}

	public function insertCar($arr)
	{
		$this->db->insert('car',$arr);
	}

	public function updateCar($arr,$Car_ID)
	{
		$this->db->set($arr)->where('carID',$Car_ID)->update('car');
	}

	public function deleteCar($Car_ID)
	{
		$this->db->where('carID',$Car_ID)->delete('car');
	}

	public function getOneCar($carID)
	{
		$where = "carID='$carID'";
		$data = $this->db->select('*')->where($where)->from('car')->get();
		$result = $data->result();
		return $result;
	}

	public function getOneCars($carID)
	{
		$where = "carID='$carID'";
		$data = $this->db->select('*')
						->where($where)
						->from('car')
						->get();
		$result = $data->result();
		return $result;
	}

	public function getInfoCar()
	{
		$data = $this->db->select('*')
		->from('car')
		->join('member','car.userID = user.userID')
		->get();
		$result = $data->result();
		return $result;
	}
}
?>