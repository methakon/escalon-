<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author dhar
 */
class Login  extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Common_model','mod');
     }
     function index()
     {
         $user= ($this->session->has_userdata('user'))?$this->session->userdata('user'):null;
         if(isset($user->id)){
             redirect(base_url('index.php/admin/index'));
         }
         $this->load->helper('form');
         $data=array('title'=>'Admin Login');
           if ($this->input->server('REQUEST_METHOD') == 'POST' ) {
              $this->load->library('Form_validation');
              $this->load->library('MY_Form_validation');
              $this->form_validation->set_rules('anti_spamm', 'Security Text', 'required|capcha_validation');
              $this->form_validation->set_rules('user_name', 'User name', 'required|max_length[50]');
              $this->form_validation->set_rules('password', 'Password', 'required|max_length[25]|login_credentials');
              if ($this->form_validation->run() == TRUE  )
                {
                   redirect(base_url('index.php/admin/index'));
                }
           }
            else {
                //print_r(validation_errors());
            }
         
         
         $data['capcha']=$this->mod->make_capcha(); 
         $this->load->view('admin/login',$data); 
     }
     function logout()
     {
         $this->session->unset_userdata('user');
          redirect(base_url('index.php/login/index'));
     }
}
