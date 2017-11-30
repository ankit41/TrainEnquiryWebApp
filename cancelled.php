<?php 
    include "files/header.php";
$flag=0;

?>

<?php

if(isset($_POST['submit'])){
   
    $date=$_POST['date'];
    switch($date){
        case 'Today':
            $date=date('d-m-Y');
            
            break;
        case 'Tomorrow':
            $date=date('d-m-Y',time()+86400);
            break;
        case 'Yesterday':
            $date=date('d-m-Y',time()-86400);
            break;
        default:
            break;
    }
   
    $url="http://api.railwayapi.com/v2/cancelled/date/$date/apikey/b8a97bdhch/";
    $str = file_get_contents($url);
    $json = json_decode($str, true);

    $flag=1;
    }

?>

<div class="container">
  <div class="jumbotron">
  
            
    <form class="form-inline" action="cancelled.php" method="post">
     <h4>List Of Cancelled Train</h4>
  
  <div class="form-group">
  <label for="sel1">Date</label>
  <select class="form-control" id="sel1" name="date">
    <option>Today</option>
    <option>Tomorrow</option>
    <option>Yesterday</option>
 
  </select>
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
           <table  class="table">
               <thead>
                   <tr>
                       <th>S.No</th>
                       <th>Train Name</th>
                       <th>Train Number</th>
                      
                   </tr>
               </thead>
               
               <?php
                $len=sizeof($json['trains']);
                     for($i=0;$i<$len;$i=$i+1){
                ?>
                <tr>
                    <td><?php echo $i+1 ?></td>
                    <td><?php echo $json['trains'][$i]['name'] ?></td>
                    <td><?php echo $json['trains'][$i]['number'] ?></td>
               
                </tr>
                <?php
                     }
                ?>
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
  <h3>How to use the form</h3>
   <p>Select date from the given form and click on search. You will get the desired redult. If you want to look for particular train then press <kbd>ctrl + f</kbd>.A dialog box will apear on the top-right corner of the browser ,enter the train number you are looking for and press enter. If the train is cancelled then it will be available in the table with highlighted mark</p>
   <br>
      <p>A weather-related cancellation or delay is closure, cancellation, or delay of an institution, operation, or event as a result of inclement weather. Certain institutions, such as schools, are likely to close when bad weather, such as snow, flooding, tropical cyclones, or extreme heat or cold impairs travel, causes power outages, or otherwise impedes public safety or makes opening the facility impossible or more difficult. </p>
    </div>
  
</div>





<?php

    include "files/footer.php";
?>