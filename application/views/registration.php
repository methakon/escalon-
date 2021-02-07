
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="<?= base_url('asset/images/logo_m.png') ?>" alt="WBTETSD"/>
                        <h3>SWATNA SEKHAR DHAR</h3>
                        <p>2nd Round Interview Assignment</p>
                        <a href="<?=base_url('index.php/login')?>" class="btn btn-info m-1"  target="_new" >Admin Login</a><br/>
                        <span>Admin user Id : escalon </span><br/><span>Password : escalon </span>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registration</h3>
                                <?php echo form_open_multipart('',array('id'=>'registration_form',
                                    'name'=>'u_registration'
                                    ));?>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'first_name',
                                                    'id'    => 'first_name',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'First name *',
                                                    'value' => $this->input->post('first_name'),
                                                    'class' => 'form-control'
                                            )), form_error('first_name', '<span class="error">', '</span>');
                                            ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'street',
                                                    'id'    => 'street',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Street*',
                                                    'value' => $this->input->post('street'),
                                                    'class' => 'form-control'
                                            )), form_error('street', '<span class="error">', '</span>');
                                            ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'number',
                                                    'name'  => 'zip',
                                                    'id'    => 'zip',
                                                    'minlength'    => 5,
                                                    'maxlength'    => 6,
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Zip*',
                                                    'value' => $this->input->post('zip'),
                                                    'class' => 'form-control'
                                            )), form_error('zip', '<span class="error">', '</span>');
                                            ?>
                                            
                                        </div> 
                                          <div class="form-group">
                                             <?php
                                            echo form_input(array(
                                                    'type'  => 'tel',
                                                    'name'  => 'phone',
                                                    'id'    => 'phone',
                                                    'maxlength'=>13,
                                                    'minlength'=>10,
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Phone No *',
                                                    'value' => $this->input->post('phone'),
                                                    'class' => 'form-control'
                                            )), form_error('phone', '<span class="error">', '</span>');
                                            ?>
                                        </div>
                                       <div class="form-group">
                                            <label for="category_id">Please select Catagories  *</label>
                                           
                                             <?php
                                             echo form_multiselect('category_id[]', $catagories,
                                                     $this->input->post('category_id','') ,
                                                     array(
                                                        'id'       => 'category_id',
                                                        'required'    => 'required',
                                                        'class' => 'form-control'
                                                )), form_error('category_id', '<span class="error">', '</span>');
                                           
                                            ?>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'last_name',
                                                    'id'    => 'last_name',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Last name *',
                                                    'value' => $this->input->post('last_name'),
                                                    'class' => 'form-control'
                                            )), form_error('last_name', '<span class="error">', '</span>');
                                            ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'city',
                                                    'id'    => 'city',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'City *',
                                                    'value' => $this->input->post('city'),
                                                    'class' => 'form-control'
                                            )), form_error('city', '<span class="error">', '</span>');
                                            ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'state',
                                                    'id'    => 'state',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'State *',
                                                    'value' => $this->input->post('state'),
                                                    'class' => 'form-control'
                                            )), form_error('state', '<span class="error">', '</span>');
                                            ?>
                                            
                                        </div>
                                       
                                      
                                        <div class="form-group">
                                             <?php
                                            echo form_input(array(
                                                    'type'  => 'email',
                                                    'name'  => 'email',
                                                    'id'    => 'r_email',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Email Id *',
                                                    'value' => $this->input->post('email'),
                                                    'class' => 'form-control'
                                            )), form_error('email', '<span class="error">', '</span>');
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-md-12" id="skill_list_">
                                        
                                    </div>
                                    <div class="col-md-12">
                                         <div class="form-group">
                                            <label class="sr-only" for="inlineFormInputGroup">Security Text</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                  <div id="captcha_div" class="input-group-text"><?php  echo  $capcha['image'];  ?> </div>
                                              </div>
                                             <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'anti_spamm',
                                                    'id'    => 'r_anti_spamm',
                                                    'maxlength'=>5,
                                                    'minlength'=>5,
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Security Text *',
                                                    'title' => 'Enter Security Text',
                                                    'class' => 'form-control'
                                            ));
                                            ?>
                                            <div class="input-group-prepend">
                                                <div id="reload_captcha" class="input-group-text"> <span class="glyphicon glyphicon-refresh">Reload</span></div>
                                            </div>
                                            </div>
                                             <?=form_error('anti_spamm', '<span class="error">', '</span>')?>
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                    <br> ** All fields are Reuired .
                                    <br> * Skill (Atleast one catagory Skill should be evaluted).
                                </div>
                                <?php echo form_close();?>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
 