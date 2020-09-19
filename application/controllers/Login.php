
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_controller {

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

    public function allmanager_get()
    {
     $manager = $this->membermodel->showManager();
     $this->response($manager,200);
    }

     public function onemember_get()
    {
        $userID = $this->get('userID'); 
        $member = $this->membermodel->oneUser($userID);

        $this->response($member,200);
    }

     public function insert_get()
    {
        $data = array(
            'username' => $this->input->post('username'), 
            'password' => $this->input->post('password')

        );
        $this->member->insertUser($data);
        $data['member'] = $this->member->checkUser();
        $this->load->view('Showcar',$data);
    }

}
?>

