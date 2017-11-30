<?php 
    include "files/header.php";
$flag=0;

?>
<?php
if(isset($_POST['submit'])){
    $trainno=$_POST['trainno'];
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
    
    
  
$url="http://api.railwayapi.com/v2/live/train/$trainno/date/$date/apikey/b8a97bdhch/";
$str = file_get_contents($url);
$json = json_decode($str, true);

$flag=1;
}

?>
<div class="container">
  <div class="jumbotron">
  
            
    <form class="form-inline" action="trainlivestatus.php" method="post">
     <h4>Train Live Status</h4>
  <div class="form-group">
    <label for="pnr">5-digit Train no.</label>
    <input name="trainno" type="text" class="form-control" id="trainno" minlength="5" maxlength="5" required>
  </div>
  
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
                    <th>Stn Name</th>
                    <th>Scheduled Arr</th>
                    <th>Scheduled Dep.</th>
                    <th>Arrival Time</th>
                    <th>Departure Time</th>
                    <th>Has arrived</th>
                    <th>Has departed</th>
                    <th>Distance</th>
                    <th>Day</th>
                </tr>
                 </thead>
                  <tr>
                <td colspan="10"><b>You queried for train no.<?php echo $trainno; ?> and date <?php echo $date; ?></b></td>
            </tr>
                   <tr>
                <td colspan="10"><b><?php echo $json['position'];?></b></td>
            </tr>
                <?php
            
                $len=sizeof($json['route']);
            /*echo $len;*/
                for($i=0;$i<$len;$i=$i+1){
                ?>
                <tr>
                    <td><?php echo $json['route'][$i]['no']; ?></td>
                    <td><?php echo $json['route'][$i]['station']['name']; ?></td>
                    <td><?php echo $json['route'][$i]['scharr']; ?></td>
                    <td><?php echo $json['route'][$i]['schdep']; ?></td>
                    <td><?php echo $json['route'][$i]['actarr']; ?></td>
                    <td><?php echo $json['route'][$i]['actdep']; ?></td>
                    <td>
                       <?php /*echo $json['route'][$i]['has_arrived']; */
                        if( $json['route'][$i]['has_arrived']==true){
                            echo "Yes";
                        }
                        else{
                        echo "No";
                        }
                        ?>
                    </td>
                    <td>
                        <?php /*echo $json['route'][$i]['has_arrived']; */
                        if( $json['route'][$i]['has_departed']==true){
                            echo "Yes";
                        }
                        else{
                        echo "No";
                        }
                        ?>
                    </td>
                    <td><?php echo $json['route'][$i]['distance']; ?></td>
                    <td><?php echo $json['route'][$i]['day']; ?></td>
                </tr>
                <?php
                    }
                ?>       
      </table>
      <?php
        }
        ?>
     

          </div>
          <style type="text/css">
              #content{
                  color: #f2b91f;
              }
    </style>
  <div id="content">
      <h3>Rail Radar</h3>
      <p>RailRadar is a live tracker shown on an interactive map which allowed users to watch movements of passenger trains running in India. All passenger trains in India are operated by state-owned Indian Railways. In the first release the location and status of trains shown on the map was typically 15 to 30 minutes delayed from real-time.RailRadar was an outcome of innovation where Indian Railways Center for Railway Information System (CRIS) and RailYatri.in joined hands.and the service was launched on 10 October 2012.RailRadar uses Google Maps as its web mapping software. The software was accessible in the form of a website and a mobile app. RailRadar was discontinued by the Indian Railways on 6 September 2013. RailYatri relaunched RailRadar in November 2013. However the RailRadar service did not provide the actual running status or the actual location of the train, rather these locations were plotted based on the regular scheduled timetable.</p>
      <br>
      <p>RailYatri relaunched the site with RailRadar GPS in November 2015.[6]‘RailRadar GPS’ uses location generated by a passengers’ smartphone, the solution requires zero capital expenditure in terms of GPS hardware costs. ‘RailRadar GPS’ determines the train location by analyzing the pattern of locations transmitted by the smartphone travelers sitting on the train, similar to how Google Maps determines the traffic on the road when you are using any road transport like a car or a bus. RailRadar GPS shows trains running tracking data neatly displayed on a Google Map. The map also indicates the on-current time status of trains. Trains running on time have Green indicators, while those running late are marked red.</p>
  </div>
  
</div>


<?php

    include "files/footer.php";
?>