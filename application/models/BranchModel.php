<?php

class BranchModel extends CI_model
{

	public function showBranch()
	{
		$data = $this->db->select('*')->from('branch')->get();
		$result = $data->result();
		return $result;
	}

	public function oneBranch($branchID)
	{
		$where = "branchID='$branchID'";
		$data = $this->db->select('*')->where($where)->from('branch')->get();
		$result = $data->result();
		return $result;
	}

	public function statusBranch()
	{
		$data = $this->db->select('*')
		->from('branch_status')
		->join('branch','branch_status.branchStatusID = branch.branchStatusID')
		->get();
		$result = $data->result();
		return $result;
	}

	public function getInfoProduct()
	{
		$data = $this->db->select('*')
		->from('stock_log')
		->join('product','stock_log.productID = product.productID')
		->get();
		$result = $data->result();
		return $result;
	}

	public function insertBranch($arr)
	{
		$this->db->insert('branch',$arr);
		return $this->db->insert_id();
	}

	public function updateBranch($data,$where)
	{
		$this->db->set($data)->where($where);
		$this->db->update('branch');
	}

	public function deleteBranch($branchID)
	{
		$where = "branchID='$branchID'";
		$this->db->delete('branch',$where);
	}

}
?>