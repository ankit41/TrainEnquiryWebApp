<?php 
    include "files/header.php";
$flag=0;

?>

<?php
$date= date("d-m-Y");

if(isset($_POST['submit'])){
    $train=$_POST['trainno'];
    $date= date("d-m-Y");
   
    $url="http://api.railwayapi.com/v2/route/train/$train/apikey/b8a97bdhch/";
$str = file_get_contents($url);
$json = json_decode($str, true);
    /*print_r($json);*/
  /*  echo $json['route'][0]['station']['name'];
    echo $json['route'][1]['station']['name'];
    echo sizeof($json['route']);*/
$flag=1;
}

?>

<div class="container">
  <div class="jumbotron">
  
   <div class="row">
    <div class="col-xs-3">
      
    </div>
    
    <div class="col-xs-6">
            
    <form class="form-inline" action="trainschedule.php" method="post">
     <h4>Check the train Schedule</h4>
  <div class="form-group">
    <label for="pnr">5-digit Train no.</label>
    <input name="trainno" type="text" class="form-control" id="trainno" minlength="5" maxlength="5" required>
  </div>
 
  <button type="submit" class="btn btn-default" name="submit">Check</button>
    </form>
  <br>
  <?php 
        if($flag==1){
        ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- banner2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1573134048661664"
     data-ad-slot="5806188931"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        <table class="table">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>Stn Code</th>
                    <th>Stn <Name></Name></th>
                    <th>Route No</th>
                    <th>Arrival Time</th>
                    <th>Dep. Time</th>
                    <th>Halt time</th>
                    <th>Distance</th>
                    <th>Day</th>
                </tr>
                
            </thead>
            <tr>
                <td colspan="9"><b>You queried for train no.<?php echo $train; ?></b></td>
            </tr>
            <?php
            $len=sizeof($json['route']);
                for($i=0;$i<$len;$i=$i+1){
            ?>
            <tr>
                <td><?php echo $json['route'][$i]['no']; ?></td>
                <td><?php echo $json['route'][$i]['station']['code']; ?></td>
                <td><?php echo $json['route'][$i]['station']['name']; ?></td>
                <td><?php echo $json['route'][$i]['no']; ?></td>
                <td><?php echo $json['route'][$i]['scharr']; ?></td>
                <td><?php echo $json['route'][$i]['schdep']; ?></td>
                <td><?php echo $json['route'][$i]['halt']; ?></td>
                <td><?php echo $json['route'][$i]['distance']; ?></td>
                <td><?php echo $json['route'][$i]['day']; ?></td>
            </tr>
            <?php
                    }
            $flag=0;
            ?>
        </table>
        
  <?php     
     }
    ?>
 
            
     
    </div>
    
    <div class="col-xs-3">
      
    </div>
  
  </div>
     
<b>Train schedule search</b>
     <p>How to use the form:</p><br>
     <p>You need to know your 5-digit train # number<br>
Enter your train number in the form field<br>
Submit the form<br>
Your train route schedule appear instantly</p>
    <b>Trains routes in India</b>
    <p>Currently there are about 14 thousand trains in India running every day.  Here is the list of the most important express trains you will likely use when travelling longer distance.</p>
        
</div>

  </div>

 

<?php

    include "files/footer.php";
?>