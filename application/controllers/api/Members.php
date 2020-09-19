<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');
use chriskacerguis\RestServer\RestController;

class Members extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('membermodel');          
    }

    public function checkLogin_get()
    {
        $username = $this->get('username'); 
        $password = $this->get('password');
        $user = $this->membermodel->checkLogin($username,$password);
            if ($u!='') {
                $result = array(
                    'status' => 'success',
                    'username' => $u
                );
            }
            else {
                $result = array(
                    'status' => 'error',
                    'description'=> 'username or password incorrect'
                );

            }   
                $this->response($result,200);
        }

    public function allmember_get()
    {
     $member = $this->membermodel->checkUser();
     $this->response($member,200);
    }

    public function onemember_get()
    {
        $userID = $this->get('userID'); 
        $member = $this->membermodel->oneUser($userID);

        $this->response($member,200);
        $this->load->view('index',$data);
    }

    public function insertmember_get()
    {

        $data = array(
            'username' => $this->get('username'),
            'password' => $this->get('password'),
            'fname' => $this->get('fname'),
            'lname' => $this->get('lname'),
            'ruleID' => $this->get('ruleID'),
        );
        $id = $this->membermodel->insertUser($data);
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

    public function updatemember_get()
    {
            $username        = $this->get('username');
            $password        = $this->get('password');
            $fname           = $this->get('fname');
            $lname           = $this->get('lname');
            $ruleID           = $this->get('ruleID');



            $data = array(
                'userID'       => $userID,
                'username'     => $username,
                'password'     => $password,
                'fname'        => $fname,
                'lname'        =>$lname,
                'ruleID'        =>$ruleID
        );

        $where = "userID  = '$userID'";

       try {
        $re = $this->membermodel->updateMember($data,$where);
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

    public function delmember_get()
    {
        $userID = $this->get('userID'); 

        $member = $this->membermodel->deleteMember($userID);
        $result = array(
            'status' => 'success',
            'detail' => 'delete member is success' 
        );

        $this->response($result,200);
    }
    
    public function allmanager_get()
    {
     $manager = $this->membermodel->showManager();
     $this->response($manager,200);
    }

    public function onemanager_get()
    {
        $managerStatusID = $this->get('managerStatusID'); 
        $member = $this->membermodel->oneMana($managerStatusID);

        $this->response($member,200);
        $this->load->view('index',$data);
    }  

    public function insertmanager_get()
    {

        $data = array(
            'managerStatusName' => $this->get('managerStatusName')
        );
        $id = $this->membermodel->insertMana($data);
        if($id != ''){
            $result = array(
                'managerStatusID' => $id,
                'status'    => 'success',
                'detail'    => 'insert product complated'
            );
        }else{
            $result = array(
                'managerStatusID' => $id,
                'status'    => 'error',
                'detail'    => 'can not insert product'
            );
        }

         $this->response($result,200);
    }

}
?>
