<?php

class MemberModel extends CI_model
{

	public function checkUser()
	{
		$data = $this->db->select('*')->from('member')->get();
		$result = $data->result();
		return $result;
	}

	public function checkLogin($username,$password)
	{
		$where = "username='$username' and password='$password'";
		$data = $this->db->select('userID,username')
		->from('member')
		->where($where)
		->get();
		$result = $data->result();
		return $result;
	}

	public function oneUser($userID)
	{
		$where = "userID='$userID'";
		$data = $this->db->select('*')->where($where)->from('member')->get();
		$result = $data->result();
		return $result;
	}

	public function insertUser($arr)
	{
		$this->db->insert('member',$arr);
		return $this->db->insert_id();
	}

	public function updateMember($data,$where)
	{
		$this->db->set($data)->where($where);
		$this->db->update('product');
	}

	public function deleteMember($userID)
	{
		$where = "userID='$userID'";
		$this->db->delete('member',$where);
	}

	public function showManager()
	{
		$data = $this->db->select('*')->from('manager_status')->get();
		$result = $data->result();
		return $result;
	}

	public function oneMana($managerStatusID)
	{
		$where = "managerStatusID='$managerStatusID'";
		$data = $this->db->select('*')->where($where)->from('manager_status')->get();
		$result = $data->result();
		return $result;
	}

	public function insertMana($arr)
	{
		$this->db->insert('manager_status',$arr);
		return $this->db->insert_id();
	}
}
?>