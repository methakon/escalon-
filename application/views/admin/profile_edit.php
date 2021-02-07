<?php echo form_open_multipart('',array('id'=>'registration_form',
                                    'name'=>'u_registration'
                                    )),form_hidden('id', $row->id);
?>
<?php
$success= $this->session->flashdata('success');
$errr=$this->session->flashdata('error');
if($success !=''){ ?>
<div class="alert alert-primary" role="alert"><?=$success?></div>
<?php }elseif($errr!=''){ ?>
<div class="alert alert-danger" role="alert"><?=$errr?></div>
<?php } ?>
        <table class="" border="1" style="text-align:left;width: 75%;" >
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center; padding-top: 20px;">
                        <img src="<?= base_url($photo)?>" alt="<?=$name?>" height="180px" title="<?=$name?>" >
                         
                    </th>
                </tr>
            </thead>
            <tbody>
                 <tr>
                     <th style="width: 50%;" >Name</th>
                     <td >
            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'name',
                                                    'id'    => 'r_name',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Name *',
                                                    'value' => $row->name,
                                                    'class' => 'form-control'
                                            )), form_error('name', '<span class="error">', '</span>');
                                            ?>
                     </td>
                </tr>
                <tr>
                     <th class="col-md-6" >Guardian’s name</th>
                     <td > 
                          <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'guardians_name',
                                                    'id'    => 'r_guardians_name',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Guardian’s name *',
                                                    'value' => $row->guardians_name,
                                                    'class' => 'form-control'
                                            )), form_error('guardians_name', '<span class="error">', '</span>');
                                            ?>
                     </td>
                </tr>
                 <tr>
                     <th class="col-md-6" >Gender</th>
                     <td >
                        <?php
                                             echo form_dropdown('gender', array(
                                                 ''=>'Select Gender *',
                                                 'm'=>'Female',
                                                 'f'=>'Male',
                                                 'o'=>'Other',
                                             ), $row->gender ,array(
                                                        'id'       => 'r_gender',
                                                        'required'    => 'required',
                                                        'class' => 'form-control'
                                                )), form_error('gender', '<span class="error">', '</span>');
                                           
                                            ?>
                     </td>
                </tr>
                <tr>
                     <th class="col-md-6" >D.O.B</th>
                     <td >
                        <?php
                         $dat= explode('-', $row->dob);
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'dob',
                                                    'id'    => 'r_dob',
                                                    'required'    => 'required',
                                                    'readonly'    => 'readonly',
                                                    'placeholder'    => 'D.O.B. *',
                                                    'value' =>  $dat[2].'/'.$dat[1].'/'.$dat[0],
                                                    'class' => 'form-control'
                                            ));
                                            ?>
                     </td>
                </tr>
                <tr>
                     <th class="col-md-6" >Age</th>
                     <td >
                         <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'age',
                                                    'id'    => 'r_age',
                                                    'required'    => 'required',
                                                    'readonly'    => 'readonly',
                                                    'placeholder'    => 'Age *',
                                                    'value' => $row->age,
                                                    'class' => 'form-control'
                                            )) ;
                                            ?>
                     </td>
                </tr>
                <tr>
                     <th class="col-md-6" >District</th>
                     <td > 
                            <?php
                                             echo form_dropdown('district_id', $districts,
                                                     $row->district_id ,
                                                     array(
                                                        'id'       => 'r_district_id',
                                                        'required'    => 'required',
                                                        'class' => 'form-control'
                                                )), form_error('district_id', '<span class="error">', '</span>');
                                           
                                            ?>
                     </td>
                </tr>
                
                <tr>
                     <th class="col-md-6" >Mobile No</th><td >
                          <?php
                                            echo form_input(array(
                                                    'type'  => 'tel',
                                                    'name'  => 'mobile_no',
                                                    'id'    => 'r_mobile_no',
                                                    'maxlength'=>13,
                                                    'minlength'=>10,
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Mobile No *',
                                                    'value' => $row->mobile_no,
                                                    'class' => 'form-control'
                                            )), form_error('mobile_no', '<span class="error">', '</span>');
                                            ?>
                     </td>
                </tr>
                <tr>
                     <th class="col-md-6" >Email Id</th><td >
                          <?php
                                            echo form_input(array(
                                                    'type'  => 'email',
                                                    'name'  => 'email',
                                                    'id'    => 'r_email',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Email Id *',
                                                    'value' => $row->email,
                                                    'class' => 'form-control'
                                            )), form_error('email', '<span class="error">', '</span>');
                                            ?> 
                     </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align: left">
                        <input type="submit" class="btn btn-primary pull-right"  value="Save"/>
                    </th>
                </tr>
            </tfoot>
        </table>    
 <?php echo form_close();?>
<script  src="<?=base_url('asset/js/notify.min.js') ?>"></script>
<script async="" src="<?=base_url('asset/js/registration.js') ?>"></script>