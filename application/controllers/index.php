<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author dhar
 */
class index extends CI_Controller{
     function __construct() {
        parent::__construct();
        $this->load->model('Common_model','mod');
     }
     function index()
     {
         $this->load->helper('form');
         $data=array('title'=>'Registration Form');
         $data['page']='registration';
         
         if ($this->input->server('REQUEST_METHOD') == 'POST'  ) {
              $this->load->library('form_validation');
              $this->load->library('MY_Form_validation');
                $this->form_validation->set_rules('first_name', 'Name', 'required|min_length[3]|max_length[50]');
                $this->form_validation->set_rules('last_name', 'Guardian’s name', 'required|min_length[3]|max_length[50]');
                $this->form_validation->set_rules('street', 'Street', 'required|min_length[3]|max_length[255]');
                $this->form_validation->set_rules('city', 'City', 'required|min_length[3]|max_length[50]');
                $this->form_validation->set_rules('zip', 'Zip', 'required|integer|min_length[5]|max_length[6]');
                $this->form_validation->set_rules('state', 'State', 'required|min_length[3]|max_length[50]');
                $this->form_validation->set_rules('phone', 'Phone No', 'required|min_length[10]|max_length[13]|integer');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('category_id[0]', 'Category', 'required|integer');
                $this->form_validation->set_rules('anti_spamm', 'Security Text', 'required|capcha_validation');
                $skills= $this->input->post('skill_id');
                foreach ($skills as $skill_id => $value) {
                    $this->form_validation->set_rules('skill_id['.$skill_id.']', 'skill', 'required|integer|exact_length[1]');
                }
                
                if ($this->form_validation->run() == TRUE  )
                {
                    $record=$this->input->post();
                     
                    
                    unset($record[$this->security->get_csrf_token_name()]);
                    unset($record['anti_spamm']);
                    unset($record['category_id']);
                    unset($record['skill_id']);
                          
                    
                    try {
                        $ll=$this->mod->get_lat_lan($record);
                        $record['lat']=$ll['lat'];
                        $record['lan']=$ll['lan'];  
                        $this->db->trans_start();
                        $this->db->insert('personal_info',$record);
                        $personnel_id  = $this->db->insert_id();
                        foreach ($skills   as $skill_id => $value)
                        {
                            $skills[$skill_id]=array(
                                'personnel_id'=>$personnel_id,
                                'skill_id'=>$skill_id,
                                'score'=>$value
                            );
                        }
                         $this->db->insert_batch('score', $skills); 
                         unset($skills);
                         $this->db->trans_complete();
                        $data['page']='confirming';
                        $data['title']='Registration confirmation';
                        $data['record']=$record;
                        $this->mod->sendmail(
                                'noreply@'.$_SERVER['SERVER_NAME'],$record['email'],"application received",
                                "Your Application Is received Successfully"
                                );
                    } catch (Exception $ex) {
                        
                    }
                    
                }
                
         }
         
         
         if($data['page']=='registration')
         {
            $data['catagories']=$this->mod->get_key_val_array('catagories','id','name',array('status'=>1),'');
            $data['capcha']=$this->mod->make_capcha(); 
         }
         
          
         $this->load->view('body',$data); 
     }
    
     function get_captcha()
     {
        $cap= $this->mod->make_capcha();
        
        echo $cap['image'];
     }
 
     function get_skills()
     {
         $data=array();
         $category_id=$this->input->get('category_id');
         $data['set']=$this->db->select('s.id,s.category_id,s.name,c.name as category')
                 ->from('skills as s')
                 ->join('catagories as c','c.id=s.category_id')
                 ->where_in('s.category_id',$category_id)
                 ->order_by('s.category_id')
                 ->get()->result();
         $this->load->helper('form');
        echo $this->load->view('skills_from',$data,TRUE);  
     }
}
