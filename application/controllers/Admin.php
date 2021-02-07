<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author dhar
 */
class Admin  extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Common_model','mod');
        $this->mod->check_login();
        $this->user= ($this->session->has_userdata('user'))?$this->session->userdata('user'):null;
     }
     function index()
     {
         $data=array('title'=>'Admin Panel');
         $data['user']= $this->user;
          
         $data['page']='admin/table_view'; 
         $this->load->view('admin/layout',$data); 
     }
 
     function view($id)
     {
          $data=array('title'=>'View');
          $data['user']= $this->user;
            
          $data['page']='profile_view';
          $data['row']= $this->db->select('*')
                 ->from('personal_info')
                 ->where(array('id'=>$id))
                 ->get()->row();
          $data['set']= $this->db->select('s.skill_id,l.category_id,s.score,l.name,c.name as category')
                 ->from('score as s')
                 ->join('skills as l','l.id=s.skill_id','left')
                 ->join('catagories as c','c.id=l.category_id','left') 
                 ->where(array('s.personnel_id'=>$id))
                 ->get()->result();
          
          $this->load->view('admin/layout',$data); 
     }
     function get_list()
     {
        $list=array();
        $this->db->select('id,first_name,last_name,city,state,phone,email')
                 ->from('personal_info')
                
                 ->order_by('id'); 
         foreach($this->db->get()->result() as $row)
         {
              
             $list['data'][]=array(
                  $row->id,
                  $row->first_name,
                  $row->last_name,
                  $row->city,
                  $row->state,
                  $row->phone,
                  $row->email,
                  '<a href="'.base_url('index.php/admin/view/'.$row->id).'" class="btn"><i class="fa fa-eye"></i></a>',
             );
         }
         
         echo json_encode($list);
                 
     }
     
}
