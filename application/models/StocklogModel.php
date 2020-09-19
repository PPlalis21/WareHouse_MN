<?php

class StocklogModel extends CI_model
{

	public function showStock()
	{
		$data = $this->db->select('*')->from('stock_log')->get();
		$result = $data->result();
		return $result;
	}

	public function oneproduct($slID)
	{
		$where = "slID='$slID'";
		$data = $this->db->select('*')->where($where)->from('stock_log')->get();
		$result = $data->result();
		return $result;
	}

	public function insertStocklog($arr)
	{
		$this->db->insert('stock_log',$arr);
		return $this->db->insert_id();
	}

	public function updateStocklog($data,$where)
	{
		$this->db->set($data)->where($where);
		$this->db->update('stock_log');
	}

	public function deleteStocklog($slID)
	{
		$where = "slID='$slID'";
		$this->db->delete('stock_log',$where);
	}

	public function getInfoStocklog()
	{
		$data = $this->db->select('*')
		->from('product')
		->join('branch','product.branchID = branch.branchID')
		->get();
		$result = $data->result();
		return $result;
	}

		public function showStockmove()
	{
		$data = $this->db->select('*')->from('stock_movement')->get();
		$result = $data->result();
		return $result;
	}

	public function oneStockmove($moveID)
	{
		$where = "moveID='$moveID'";
		$data = $this->db->select('*')->where($where)->from('stock_movement')->get();
		$result = $data->result();
		return $result;
	}

	
}
?>