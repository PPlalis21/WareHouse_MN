<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');
use chriskacerguis\RestServer\RestController;

class Stocklogs extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('stocklogmodel');          
    }

    public function allstocklog_get()
    {
     $stocklog = $this->stocklogmodel->showStock();
     $this->response($stocklog,200);
    }

    public function onestocklog_get()
    {
        $stocklogID = $this->get('productID'); 
        $stocklog = $this->stocklogmodel->oneproduct($stocklogID);

        $this->response($stocklog,200);
    }

     public function insertstocklog_get()
    {
        $data = array(
            'productName' => $this->input->post('productName'), 
            'productDetail' => $this->input->post('productDetail'),
            'productPrice' => $this->input->post('productPrice'),
            'productAmount' => $this->input->post('productAmount'),
            'productImage' => $this->input->post('productImage')

        );
        $this->product->insertStocklog($data);
        $data['product'] = $this->product->showStock();
    }

     public function updatestocklog_get()
    {
            $productID        = $this->get('productID');
            $dateLog          = $this->get('dateLog');
            $productAmount    = $this->get('productAmount');
            $userID           = $this->get('userID');
            $brachID          = $this->get('brachID');

            $data = array(
                'slID'         => $slID,
                'productID'     => $productID,
                'productAmount'     => $productAmount,
                'userID'     => $userID,
                'brachID'     => $brachID
        );

        $where = "slID   = '$slID'";

       try {
        $re = $this->stocklogmodel->updateStocklog($data,$where);
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

    public function delstocklog_get()
    {
        $slID = $this->get('slID'); 

        $slID = $this->stocklogmodel->deleteStocklog($slID);
        $result = array(
            'status' => 'success',
            'detail' => 'delete shop is success' 
        );

        $this->response($result,200);
    }


    public function allstockmove_get()
    {
     $stockmove = $this->stocklogmodel->showStockmove();
     $this->response($stockmove,200);
    }

    public function onestockmove_get()
    {
        $moveID = $this->get('moveID'); 
        $stockmove = $this->stocklogmodel->oneStockmove($moveID);

        $this->response($stockmove,200);
    }
}
?>
