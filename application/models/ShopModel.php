<?php

class ShopModel extends CI_model
{

	public function showShop()
	{
		$data = $this->db->select('*')->from('shop')->get();
		$result = $data->result();
		return $result;
	}

	public function oneShop($shopID)
	{
		$where = "shopID='$shopID'";
		$data = $this->db->select('*')->where($where)->from('shop')->get();
		$result = $data->result();
		return $result;
	}

	public function managerShop()
	{
		$data = $this->db->select('*')->from('shop_manager')->get();
		$result = $data->result();
		return $result;
	}

	public function insertShop($arr)
	{
		$this->db->insert('shop',$arr);
		return $this->db->insert_id();
	}

	public function updateShop($data,$where)
	{
		$this->db->set($data)->where($where);
		$this->db->update('shop');
	}

	public function deleteShop($shopID)
	{
		$where = "shopID='$shopID'";
		$this->db->delete('shop',$where);
	}


}
?>