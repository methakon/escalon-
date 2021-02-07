<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Form_validation
 *
 * @author swarnasekhar.dhar
 */
class MY_Form_validation extends CI_Form_validation {

    function __construct(){
        parent::__construct();
        
    }
    function error_array(){
        return $this->_error_array; 
    }
   
 
    function is_original_email($mail,$field)
    {
       // echo $mail."----".$field;
// return FALSE;
        // Match Email Address Pattern
        try
        {
            
           if (preg_match('/^([\w\.\%\+\-]+)@([a-z0-9\.\-]+\.[a-z]{2,6})$/i',trim($mail),$m)) 
            {
            if ( (checkdnsrr($m[2],'MX') == true) || (checkdnsrr($m[2],'A') == true) ) { return true;}
            } 
            
        } catch (Exception $ex) {

        }
        
          $this->_error_array[$field] ='Please enter a valid email address';
        return false;
    }
    
     function capcha_validation($str,$field)
    {
        
       if($str == $this->CI->session->userdata('capcha_word')) { return true; }
       else
      {
        $this->CI->form_validation->set_message('capcha_validation','invalid ');
        return FALSE;
       }
               
        
        
    }
   
    function login_credentials($str,$field)
    {
    
       $user = $this->CI->db->select('id,user_name')
               ->from('users')
               ->where(array(
                   'user_name'=>$this->CI->input->post('user_name'),
                   'password'=> sha1($this->CI->input->post('password')),
               ))->get()->row();
       if(isset($user->id)) { 
           $this->CI->session->set_userdata('user',$user);
           return true;
           }
       else
      {
        $this->CI->form_validation->login_credentials('capcha_validation','invalid credentials');
        return FALSE;
       }
               
        
        
    }
    

}