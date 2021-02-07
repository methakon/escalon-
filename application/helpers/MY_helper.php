<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 
// to simplify updates, we post the helpers in the fuel module
if(!function_exists('file_upload')){
    function file_upload($key,$upload_path)
    {
        $errors=array();
        $CI=&get_instance();
        try {
            $CI->load->library('upload');
            $CI->load->library('form_validation');
            $config=array();
            $config['upload_path']  = str_replace(array("\\","//"), "/", getcwd()."/".$upload_path) ;
            if (!file_exists($config['upload_path'])) {  mkdir($config['upload_path'], 0777, true);  }
            $xxx= explode('.', $_FILES[$key]['name']) ;
            $config['file_name']  = uniqid(date("Y_m_d_H_i_s")).'.'.$xxx[max(array_keys($xxx))];
            $config['allowed_types'] = 'jpg|jpeg';
            $config['full_path']  = $config['file_name'];
            $config['overwrite']  = FALSE;
            $config['remove_spaces']  = TRUE;
            $config['mod_mime_fix']  = TRUE;
            $config['file_ext_tolower']  = TRUE;
           // print_r($config);
            $CI->upload->initialize($config);
            if($CI->upload->do_upload($key))
            {
                return $upload_path.'/'.$config['file_name'];
            }
            else {
                 
               $errors[]=$CI->upload->display_errors();
               return $errors;
            }
        } catch (Exception $ex) {
            $errors[]=$ex;
            return $errors;
        }
    }
}
if(!function_exists('getRandomString')){
    function getRandomString($length = 8) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string;
    }
}