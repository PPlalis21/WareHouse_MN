<?php

class ProductModel extends CI_model
{

	public function showProduct()
	{
		$data = $this->db->select('*')->from('product')->get();
		$result = $data->result();
		return $result;
	}

	public function oneProduct($productID)
	{
		$where = "productID='$productID'";
		$data = $this->db->select('*')->where($where)->from('product')->get();
		$result = $data->result();
		return $result;
	}

	public function statusProduct()
	{
		$data = $this->db->select('*')->from('product_status')->get();
		$result = $data->result();
		return $result;
	}

	public function insertProduct($arr)
	{
		$this->db->insert('product',$arr);
		return $this->db->insert_id();
	}

	public function updateProduct($data,$where)
	{
		$this->db->set($data)->where($where);
		$this->db->update('product');
	}

	public function deleteProduct($productID)
	{
		$where = "productID='$productID'";
		$this->db->delete('product',$where);
	}

	public function getInfoProduct()
	{
		$data = $this->db->select('*')
		->from('product')
		->join('branch','product.branchID = branch.branchID')
		->get();
		$result = $data->result();
		return $result;
	}

}
?>