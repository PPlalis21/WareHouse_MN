<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');
use chriskacerguis\RestServer\RestController;

class Staffs extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('staffmodel');          
    }

    public function allstaff_get()
    {
     $staff = $this->staffmodel->showStaff();
     $this->response($staff,200);
    }

    public function onestaff_get()
    {
        $userID = $this->get('userID'); 
        $staff = $this->staffmodel->oneStaff($userID);

        $this->response($staff,200);
    }

    public function insertstaff_get()
    {
        $data = array(
        'username'  => $this->get('username'), 
        'password'  => $this->get('password'), 
        'fname'     => $this->get('fname'), 
        'lname'     => $this->get('lname'),
        'ruleID'    => $this->get('ruleID')
        );

        $id = $this->staffmodel->insertStaff($data);
        if($id != ''){
            $result = array(
                'userID' => $id,
                'status'    => 'success',
                'detail'    => 'insert product complated'
            );
        }else{
            $result = array(
                'userID' => $id,
                'status'    => 'error',
                'detail'    => 'can not insert product'
            );
        }
         $this->response($result,200);
    }

    public function updatestaff_get()
    {
            $username  = $this->get('username'); 
            $password  = $this->get('password'); 
            $fname     = $this->get('fname'); 
            $lname     = $this->get('lname');
            $ruleID    = $this->get('ruleID');


            $data = array(
                'userID'     => $userID,
                'username'   => $username,
                'password'   => $password,
                'fname'      => $fname,
                'lname'      =>$lname,
                'ruleID'     =>$ruleID
        );

        $where = "userID  = '$userID'";

       try {
        $re = $this->staffmodel->updatestaff($data,$where);
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

    public function delstaff_get()
    {
        $userID = $this->get('userID'); 

        $staff = $this->staffmodel->deleteStaff($userID);
        $result = array(
            'status' => 'success',
            'detail' => 'delete staff is success' 
        );

        $this->response($result,200);
    }

    public function statusstaff_get()
    {
     $staffst = $this->staffmodel->statusstaff();
     $this->response($staffst,200);
    }

}
?>
