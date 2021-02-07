<!DOCTYPE html>
<html>
    <head>
        <title><font color ="green">Registration information</font></title>
        <style>
            #candidate_map {
                height: 300px;
            }

        </style>
    </head>
    <body style="text-align: center;">
        <div  style="width: 100% ">
        <table class="table" border="1" style="text-align:left;width: 75%;" >
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center; padding-top: 20px;">
                         
                    </th>
                </tr>
            </thead>
            <tbody>
                 <tr>
                     <th style="width: 50%;" >Name</th><td ><?=$row->first_name?> <?=$row->last_name?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >Street</th><td ><?=$row->street?></td> 
                </tr>
                 <tr>
                     <th class="col-md-6" >City</th><td ><?=$row->city?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >ZIP</th><td ><?=$row->zip?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >State</th><td ><?=$row->state?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >Phone</th><td ><?=$row->phone?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >Email</th><td ><?=$row->email?></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php 
                    $out=array();
                    $cat=array();
                    $total=0;
                    foreach ($set as $sk){
                       $out[$sk->category_id][$sk->skill_id] =$sk;
                       $cat[$sk->category_id]=$sk->category;
                       $total+=$sk->score;
                    } 
                     
                    foreach($out as $category_id=>$sks){?>
                    <div class="col-md-12">
                        <label class="col-md-12 alert alert-dark" ><?=$cat[$category_id]?>:</label><br>
                        <?php foreach($sks as $skil){ ?>
                        <div class="form-group">
                            <label class="col-md-3 form-label" ><?=$skil->name?> : <span class="rval badge badge-secondary"><?=$skil->score?></span></label> 

                        </div>

                        <?php } ?>
                    </div>

                    <?php } ?>
                    
                    <label class="col-md-12 alert alert-dark" >Total Score : <?=$total?></label>
                    </td>
                </tr>
                <tr>
                    <th class="col-md-12" colspan="2"  > 
                        <div id="candidate_map"></div>

                     </th>
                </tr>
                 
                 
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align: left">
                         Time : <?=$registration_date?>
                    </th>
                </tr>
            </tfoot>
        </table>     
        </div>
         <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDESGF42ZHJMPoxTcSteY4vCUbeXsX-5mc&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    <script>
   function     initMap()
    {
          const myLatLng = { lat: <?=$row->lat?>, lng: <?=$row->lan?> };
            const map = new google.maps.Map(document.getElementById("candidate_map"), {
              zoom: 18,
              center: myLatLng,
            });
            new google.maps.Marker({
              position: myLatLng,
              map,
              title: "<?=$row->street?>",
            });

    }
        </script>

  