<?php 
$out=array();
$cat=array();
foreach ($set as $sk){
   $out[$sk->category_id][$sk->id] =$sk;
   $cat[$sk->category_id]=$sk->category;
} 
foreach($out as $category_id=>$sks){?>
<div class="col-md-12">
    <label class="col-md-12 alert alert-dark" ><?=$cat[$category_id]?>:</label><br>
    <?php foreach($sks as $skil){ ?>
    <div class="form-group">
        <label class="col-md-3 form-label" ><?=$skil->name?> : <span class="rval badge badge-secondary">0</span></label> 
        <div class="d-flex justify-content-center my-4">
            <span class="font-weight-bold purple-text mr-2 mt-1">0</span>
                            <?=form_input(array(
                                                    'type'  => 'range',
                                                    'name'  => 'skill_id['.$skil->id.']',
                                                    'step'    => 1,
                                                    'required'    => 'required',
                                                    'max'    => 5,
                                                    'min'    => 1,
                                                    'value' => 0,
                                                    'class' => 'form-control range_select'
                                            )), form_error('skill_id['.$skil->id.']', '<span class="error">', '</span>'); ?>
             
            
            <span class="font-weight-bold purple-text ml-2 mt-1">5</span>
        </div>
    </div>
    
    <?php } ?>
</div>

<?php } ?>

    