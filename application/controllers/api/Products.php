<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');
use chriskacerguis\RestServer\RestController;

class Products extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('productmodel');          
    }

    public function allproduct_get()
    {
     $product = $this->productmodel->showProduct();
     $this->response($product,200);
    }

    public function oneproduct_get()
    {
        $productID = $this->get('productID'); 
        $product = $this->productmodel->oneProduct($productID);

        $this->response($product,200);
    }

    public function insertproduct_get()
    {

        $data = array(
            'productName' => $this->get('productName'), 
            'productDetail' => $this->get('productDetail'),
            'productPrice' => $this->get('productPrice'),
            'productAmount' => $this->get('productAmount'),
            'productImage' => $this->get('productImage'),
            'branchID' => $this->get('branchID'),
            'productStatusID' => $this->get('productStatusID')

        );
        $id = $this->productmodel->insertProduct($data);
        if($id != ''){
            $result = array(
                'productID' => $id,
                'status'    => 'success',
                'detail'    => 'insert product complated'
            );
        }else{
            $result = array(
                'productID' => $id,
                'status'    => 'error',
                'detail'    => 'can not insert product'
            );
        }

         $this->response($result,200);
    }

    public function updateproduct_get()
    {
            $productID          = $this->get('productID');
            $productName        = $this->get('productName');
            $productDetail      = $this->get('productDetail');
            $productPrice       = $this->get('productPrice');
            $productAmount      = $this->get('productAmount');
            $productImage       = $this->get('productImage');
            $branchID           = $this->get('branchID');
            $productStatusID    = $this->get('productStatusID');


            $data = array(
                'productName'       => $productName,
                'productDetail'     => $productDetail,
                'productPrice'      => $productPrice,
                'productAmount'     =>$productAmount,
                'productImage'      => $productImage,
                'branchID'          => $branchID,
                'productStatusID'   => $productStatusID
        );

        $where = "productID = '$productID'";

       try {
        $re = $this->productmodel->updateProduct($data,$where);
        $result = array(
            'status' => 'success'
             );           
       } catch (Exception $e) {
        $result = array(
            'status' => 'error',
            'detail' => 'can not update product'
             );           
       }
         $this->response($result,200);
    }

    public function delproduct_get()
    {
        $productID = $this->get('productID'); 

        $product = $this->productmodel->deleteProduct($productID);
        $result = array(
            'status' => 'success',
            'detail' => 'delete product is success' 
        );

        $this->response($result,200);
    }

    
}
?>
