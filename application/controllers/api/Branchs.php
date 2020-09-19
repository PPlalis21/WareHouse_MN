<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');
use chriskacerguis\RestServer\RestController;

class Branchs extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('branchmodel');          
    }

    public function allbranch_get()
    {
     $branch = $this->branchmodel->showBranch();
     $this->response($branch,200);
    }

    public function onebranch_get()
    {
        $branchID = $this->get('branchID'); 
        $branch = $this->branchmodel->oneBranch($branchID);

        $this->response($branch,200);
    }

    public function insertbranch_get()
    {
        $data = array(
        'branchName' => $this->get('branchName'), 
        'latitude' => $this->get('latitude'), 
        'longitude' => $this->get('longitude'), 
        'branchStatusID' => $this->get('branchStatusID')
        );

        $id = $this->branchmodel->insertBranch($data);
        if($id != ''){
            $result = array(
                'branchID ' => $id,
                'status'    => 'success',
                'detail'    => 'insert product complated'
            );
        }else{
            $result = array(
                'branchID ' => $id,
                'status'    => 'error',
                'detail'    => 'can not insert product'
            );
        }
         $this->response($result,200);
    }

    public function updateBranch_get()
    {
            $branchID           = $this->get('branchID');
            $branchName        = $this->get('branchName');
            $latitude      = $this->get('latitude');
            $longitude       = $this->get('longitude');
            $branchStatusID      = $this->get('branchStatusID');


            $data = array(
                'branchName'       => $branchName,
                'latitude'     => $latitude,
                'longitude'      => $longitude,
                'branchStatusID'     =>$branchStatusID
        );

        $where = "branchID  = '$branchID'";

       try {
        $re = $this->branchmodel->updateBranch($data,$where);
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

    public function delbranch_get()
    {
        $branchID = $this->get('branchID'); 

        $member = $this->branchmodel->deleteBranch($branchID);
        $result = array(
            'status' => 'success',
            'detail' => 'delete member is success' 
        );

        $this->response($result,200);
    }

    public function statusbranch_get()
    {
     $branchst = $this->branchmodel->statusBranch();
     $this->response($branchst,200);
    }

}
?>
