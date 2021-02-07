<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common_model
 *
 * @author dhar
 */
class Common_model extends CI_Model {

    public function __construct() {
         
    }
     function make_capcha()
     {
         $this->load->helper('captcha');
         $capcha_word= mt_rand(10000, 99999);
         $this->session->set_userdata('capcha_word',$capcha_word);
         
         $vals = array(
            'word'          =>  $capcha_word,
            'img_path'      => getcwd(). '/asset/captcha/',
            'img_url'       => base_url('asset/captcha'),
            'img_width'     => '81',
            'img_height'    => 24,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 15,
            'img_id'        => 'anti_aunty',
            'pool'          => '0123456789',

            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 225),
                    'grid' => array(255, 255, 255)
            )
        );

        return create_captcha($vals);
     }
    function get_key_val_array($table,$key,$val,$where=array(),$first_text='')
    {
        $this->db->select($key.",".$val)
                ->from($table)->order_by($key);
        if(count($where)>0)
        {
            $this->db->where($where);
        }
        $out=($first_text=="")?array():array(''=>$first_text);
        foreach ( $this->db->get()->result() as $rw)
        {
           $out[$rw->$key] = $rw->$val;
        }
        return $out;
    }
    function check_login()
    {
        $user= ($this->session->has_userdata('user'))?$this->session->userdata('user'):null;
         if(!isset($user->id)){
             redirect(base_url('index.php/login/index'));
         }
    }
    function get_lat_lan($record,$try=0)
    {
        switch ($try) {
            case 0: 
                $aa= array($record['street'],$record['city'],$record['state'],$record['zip']);
                break;
            case 1:
                $aa= array( $record['city'],$record['state']);
                break;
            case 3:
                $aa= array( $record['city'] );
                break;
            case 4:
                $aa= array( $record['state'] );
                break;
            default:
                break;
        }
         if($try==0)
         {
            
         }
        $address=implode(" ",$aa);
       $url= "http://api.positionstack.com/v1/forward?access_key=f3b4d980fa3081097fb1148cbae67cfa&query=". urlencode($address);
       $res=$this->curl_url($url);
        
       if(isset($res->data[0]))
       {
           return array('lat'=>$res->data[0]->latitude,'lan'=>$res->data[0]->longitude);
       }
       if($try<4)
       {
           return $this->get_lat_lan($record,++$try);
       }
       return array('lat'=>0,'lan'=>0);

    }
    function curl_url($url)
    {
        
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            
            $response = curl_exec($ch);
            //pr($response);
           // echo 'Curl error: ' . curl_error($ch);
            curl_close($ch);
        } catch (Exception $ex) {
            //pr($ex);
        }
        if(is_array($response))
        {
            return $this->curl_url_v1($url);
        }
        else {
            return json_decode($response);
        }
         
        
    }
    function sendmail($from,$to,$subject,$body)
    {
        if(!isset($this->email))
        {
            $this->load->library('email');
        }
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = ini_get ('sendmail_path');
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['dsn'] = TRUE;
        $config['priority'] = 1;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from);
        $this->email->subject($subject);
        $this->email->message($body);
        return $this->email->send();
       //$this->email->send(FALSE);
      // $this->email->print_debugger(array('headers'));
    }
}
