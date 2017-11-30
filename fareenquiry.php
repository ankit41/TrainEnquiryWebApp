<?php 
    include "files/header.php";
$flag=0;

?>
<?php
$date= date("d-m-Y");

if(isset($_POST['submit'])){
    $train=$_POST['trainno'];
    $date= $_POST['date'];
   $source=$_POST['source'];
    $dest=$_POST['dest'];
    $age=$_POST['age'];
    $quota=$_POST['quota'];
 
    if(isset($age)){
        
    }
    else{
        $age=18;
    }
    $url="http://api.railwayapi.com/v2/fare/train/$train/source/$source/dest/$dest/age/$age/quota/$quota/date/$date/apikey/b8a97bdhch/";
$str = file_get_contents($url);
$json = json_decode($str, true);
   echo sizeof($json['fare']);
$flag=1;
}

?>

<div class="container">
  <div class="jumbotron">
  
            
    <form class="form-inline" action="fareenquiry.php" method="post">
     <h4>Fare Enquiry</h4>
    <div class="form-group">
    <label for="source">Source</label>
    <input name="source" type="text" class="form-control" id="source" value="<?php echo isset($_POST['source'])? $_POST['source'] : ''?>" required>
  </div> 
  <br>
  <br>
   <div class="form-group">
    <label for="dest">Enter Destination</label>
    <input name="dest" type="text" class="form-control" id="dest" value="<?php echo isset($_POST['dest'])? $_POST['dest'] : ''?>"  required>
  </div> 
  
  <div class="form-group">
    <label for="train">Enter train no.</label>
    <input name="trainno" type="text" class="form-control" id="trainno" minlength="5" maxlength="5" value="<?php echo isset($_POST['trainno'])? $_POST['trainno'] : ''?>" required>
  </div> 
  <br>
  <br>
  <div class="form-group">
    <label for="dest">Enter Age for senior citizen</label>
    <input name="age" type="number" class="form-control" id="age" value="<?php echo isset($_POST['age'])? $_POST['age'] : ''?>">
  </div> 
  <div class="form-group">
    <label for="dest">Enter date in dd-mm-yyyy with '-'</label>
    <input name="date" type="text" class="form-control" id="date" value="<?php echo isset($_POST['date'])? $_POST['date'] : ''?>" required>
  </div>
  <br>
   <br>
    <div class="form-group">
  <label for="sel1">Quota</label>
  <select class="form-control" id="sel1" name="quota">
        <option>GN</option>
        <option>LD</option>
        <option>HO</option>
        <option>DF</option>
        <option>PH</option>
        <option>FT</option>
        <option>DP</option>
        <option>TQ</option>
        <option>PT</option>
        <option>SS</option>
        <option>HP</option>
        <option>RE</option>
        <option>GNRS</option>
        <option>OS</option>
        <option>PQ</option>
        <option>RC(RAC)</option>
        <option>RS</option>
        <option>YU</option>
        <option>LB</option>
  </select>
</div> 
 <br><br>
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
           <table  class="table table-striped table-hover">
               <thead>
                   <tr>
                       <th>S.No</th>
                       <th>Train Name</th>
                       <th>Train Number</th>
                       <th>From</th>
                       <th>To</th>
                       <th>Quota</th>
                       <th>First AC</th>
                       <th>Second AC</th>
                        <th>Third AC</th>
                        <th>Sleeper</th>                      
                   </tr>
               </thead>
               
            
                <tr>
                    <td><?php echo "1"; ?></td>
                    <td><?php echo $json['train']['name']; ?></td>
                    <td><?php echo $json['train']['number']; ?></td>
                    <td><?php echo $json['from_station']['name']; ?></td>
                    <td><?php echo $json['to_station']['name']; ?></td>
                    <td><?php echo $json['quota']['name']; ?></td>
                    <td><?php echo $json['fare'][0]['fare']; ?></td>
                   <td><?php echo $json['fare'][1]['fare']; ?></td>
                   <td><?php echo $json['fare'][2]['fare']; ?></td>
                   <td><?php echo $json['fare'][3]['fare']; ?></td>
               
                </tr>
               
           </table>
      <?php
        }
      $flag=0;
        ?>
     
    
  
  
</div>
<style type="text/css">
              #content{
                  color: #f2b91f;
              }
    </style>
<div id="content">
    <p>A Reservation Against Cancellation (RAC) is a type of ticket that can be sold for travel on the Indian Railways. Although it ensures certainty of travel, it does not guarantee a berth. A berth will be allocated to the person who reserves an RAC ticket if passengers who already have a confirmed ticket do not turn up before the train departure or get their confirmed ticket cancelled. A berth is split into 2 seats for 2 RAC ticket holders. If there’s any last minute cancellations, or if any quota allocations remain unsold, or if any confirmed ticket holders are given a free upgrade (more later), an RAC ticket holder is given the empty berth, the other RAC ticket holder can then convert the 2 seats into a berth.

Generally, RAC/WL tickets will have two numbers - RAC8/RAC2, WL20/WL15, WL12/RAC2, etc. The first number shows the status of the ticket at the time of booking. The second number after the slash (/) shows the current status of your ticket. So, RAC8/RAC2 means that when you purchased the ticket, it may be that yours was the 8th such ticket under RAC category, which has moved 6 places after 6 cancellations before your position which is moved to the 2nd (you can assume that you were the 8th person in the queue and you are the 2nd person now). You can check the current status of your booking by entering 10-digit PNR number in Indian Railway website. So having a RAC ticket means that you can travel sharing a berth with another person.H39</p>
</div>
</div>



<?php

    include "files/footer.php";
?>