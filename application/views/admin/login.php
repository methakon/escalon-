<html>
    <head>
    <title><?=(isset($title))?$title:''?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('asset/css/login.css')?>"> 
        
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Sign In</h5>
                <?php echo form_open_multipart('',array('id'=>'login_form',
                                    'name'=>'a_login',
                                    'class'=>"form-signin"
                                    ));?>
                
                  <div class="form-label-group">
                       <?php  echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'user_name',
                                                    'id'    => 'inputEmail',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'User ID',
                                                    'autofocus' => TRUE,
                                                    'class' => 'form-control'
                                            ));
                                            ?>
                    <label for="inputEmail">User ID</label>
                  </div>

                  <div class="form-label-group">
                       <?php  echo form_input(array(
                                                    'type'  => 'password',
                                                    'name'  => 'password',
                                                    'id'    => 'inputPassword',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Password',
                                                    'class' => 'form-control'
                                            ));
                                            ?>
                    <label for="inputPassword">Password</label>
                  </div>
                   <div class="form-label-group">
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
                                            </div><br>
                                           
                                            </div> 
                       
                     <?=form_error('anti_spamm', '<span class="error">', '</span>');?>
                  </div>
              
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                   
                   
                 
               <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
			  crossorigin="anonymous"></script>
       <script  >
            var base_url = "<?=base_url( ) ?>";
            $( document ).ready(function() {
                $( "#reload_captcha" ).click(function() {
                    $.ajax({url: base_url+"index.php/index/get_captcha", success: function(result){
                  
                        $("#captcha_div").html(result);
                    }});
                });
            });
        </script>                   
    </body>
</html>