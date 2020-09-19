<?php

class StaffModel extends CI_model
{

	public function showStaff()
	{
		$data = $this->db->select('*')->from('member')->get();
		$result = $data->result();
		return $result;
	}

	public function oneStaff($userID)
	{
		$where = "userID='$userID'";
		$data = $this->db->select('*')->where($where)->from('member')->get();
		$result = $data->result();
		return $result;
	}

	public function insertStaff($arr)
	{
		$this->db->insert('member',$arr);
		return $this->db->insert_id();
	}

	public function updateStaff($data,$where)
	{
		$this->db->set($data)->where($where);
		$this->db->update('member');
	}

	public function deleteStaff($userID)
	{
		$where = "userID='$userID'";
		$this->db->delete('member',$where);
	}


}
?>