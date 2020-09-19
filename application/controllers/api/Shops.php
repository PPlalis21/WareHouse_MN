<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');
use chriskacerguis\RestServer\RestController;

class Shops extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('shopmodel');          
    }

    public function allshop_get()
    {
     $shop = $this->shopmodel->showShop();
     $this->response($shop,200);
    }

     public function oneshop_get()
    {
        $shopID = $this->get('shopID'); 
        $shop = $this->shopmodel->oneShop($shopID);
        $this->response($shop,200);
    }

    public function insertshop_get()
    {
        $data = array(
        'shopName' => $this->get('shopName'), 
        'memberID' => $this->get('memberID')
        );

        $id = $this->shopmodel->insertShop($data);
        if($id != ''){
            $result = array(
                'shopID' => $id,
                'status'    => 'success',
                'detail'    => 'insert product complated'
            );
        }else{
            $result = array(
                'shopID' => $id,
                'status'    => 'error',
                'detail'    => 'can not insert product'
            );
        }
         $this->response($result,200);
    }

    public function updateshop_get()
    {
            $shopName        = $this->get('shopName');
            $memberID        = $this->get('memberID');

            $data = array(
                'shopID'       => $shopID,
                'shopName'     => $shopName,
                'memberID'     => $memberID
        );

        $where = "shopID  = '$shopID'";

       try {
        $re = $this->shopmodel->updateShop($data,$where);
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

    public function delshop_get()
    {
        $shopID = $this->get('shopID'); 

        $shop = $this->shopmodel->deleteShop($shopID);
        $result = array(
            'status' => 'success',
            'detail' => 'delete shop is success' 
        );

        $this->response($result,200);
    }


}
?>
