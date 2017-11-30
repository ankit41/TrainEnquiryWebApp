<?php 
    include "files/header.php";
$flag=0;
?>
  <!--4333102418-->
  <link href="style/index.css" rel="stylesheet" type="text/css">
<?php
if(isset($_POST['submit'])){
    $pnr=$_POST['pnr'];
    /*echo $pnr;*/
    $url="http://api.railwayapi.com/v2/pnr-status/pnr/$pnr/apikey/b8a97bdhch/";
$str = file_get_contents($url);
$json = json_decode($str, true);

$flag=1;
}

?>

<div class="container">
     
  <div class="jumbotron jumbotronhead">
  
   <div class="row">
    <div class="col-xs-3">
      
    </div>
    
    <div class="col-xs-6">
            
    <form class="form-inline" action="index.php" method="post">
     <h4>Check PNR status</h4>
  <div class="form-group">
    <label for="pnr">Enter Pnr:</label>
    <input name="pnr" type="text" class="form-control" id="email" minlength="10" maxlength="10" required>
  </div>
 
  <button type="submit" class="btn btn-default" name="submit">Check</button>
</form>
  <br>
  
 
            
     
    </div>
    
  
  </div>
    
     <div class="row">
    
    <?php 
        if($flag==1){
    
            ?>
 <div class="col-xs-6">
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
               <tr>
                <td colspan="8"><b>You queried for pnr no.<?php echo $pnr; ?></b></td>
            </tr>
                <tr><th>Train Number</th><th>Train Name</th><th>Boarding Date</th>
                <th>From </th><th>To</th><th>Reserved Upto</th><th>Boarding Point</th><th>Class</th></tr>
                <tr>
                <td><?php
                echo $json['train']['number'];
                ?></td>
                <td><?php
                echo $json['train']['name'];
                ?></td>
                <td><?php
                echo $json['doj'];
                ?></td>
                       <td><?php
                echo $json['from_station']['name'];
                ?></td>
                       
                       <td><?php
                echo $json['to_station']['name'];
                ?></td>

                       <td><?php
                echo $json['reservation_upto']['name'];
                ?></td>

                       <td><?php
                echo $json['boarding_point']['name'];
                ?></td>

                       <td><?php
                echo $json['journey_class']['name'];
                ?></td></tr>

                <tr><td colspan="2">Total Person</td><td colspan="4">Booking Status (Coach No, Berth No., Quota)</td><td colspan="2">Current Status</td></tr>
                
                <tr><td colspan="2"><?php
                echo $json['total_passengers'];
                ?></td>

                <td colspan="4"><?php
                echo $json['passengers'][0]['booking_status'];
                ?></td>

                <td colspan="2"><?php
                echo $json['passengers'][0]['current_status'];
                ?></td></tr>
            </table>   
                 
              <?php
                    $flag=0;
                }
                ?>
            

        
</div>
   
  </div>
   <p>To check your current reservation status enter 10 digit PNR Number in the text box given above and click 'Get PNR Status' button. Do not enter hyphen (-) in the text box as it is not required.</p>

<br>
<p>PNR is short name for 'Passenger Name Record'. It is a record in the database of Indian Railways computer reservation system (IR-CRS) against which journey details for a passenger, or a group of passengers are saved.<br>

To be specific, when a reserved railway ticket is booked for a train in Indian Railways, all the details of passengers are stored in relational database of centralized reservation system. These details are associated with a unique ten digit number. This reference number is called PNR and it is printed on the ticket.<br>

Passenger's personal information like name, age, gender etc. is saved in the database against this reference number. It includes columns to store booking status and current status of the ticket.<br>

As we know every train has limited number of seats, sometime one may not get a confirmed reserved ticket. Booking status of such waitlist (W/L) ticket changes when there is any availability of reserved seats due to cancellation. This new current reservation status is generally known as <b>PNR status</b>.</p>
    </div>
 
</div>

<!--Flights Logo-->
<div class="container">
 <div class="jumbotron jumbotronflight">
 

    </div>
    
    <b>Where to find PNR number on ticket?</b>
    <p>PNR number is generally printed at the top left corner of the printed tickets (tickets that are taken from railway station booking window). In case of the E – Ticket (tickets that are booked online or through IRCTC website), it is mentioned at top in separate cell.</p><br>
    <b>How to check PNR status?</b>
    <p>There are many mediums through which PNR status enquiry can be made. Most popular ways are listed below:<br>

<ol>
    <li>PNR status enquiry through online websites</li>
    <li>Current reservation status check using SMS</li>
    <li>Mobile applications</li>
    <li>Railway enquiry counters at railway station</li>
    <li>Final reservation charts</li>
</ol>

<br>
<b>PNR Status Enquiry through Online Websites</b>
<br>
<p>This is the most preferred way to enquire your current PNR status as it is easy and reliable. List of some websites that you can use for enquiry:</p>

<ol>
    <li><a href="www.trainposition.com">www.trainposition.com</a></li>
    <p>This unofficial website is doing a great job in helping Indian rail travelers to find their tickets confirmed booking status. Apart from PNR enquiry, one can also check train running status, station code and train coach position.</p>
    <br>
    <li><a href="www.indianrail.gov.in">www.indianrail.gov.in</a></li>
    <p>This is Indian Railways official portal. It is designed and maintained by CRIS (Centre for Railway Information Systems).</p>
    <li><a href="www.irctc.co.in">www.irctc.co.in</a></li>
    <p><b>IRCTC (Indian Railway Catering and Tourism Corporation)</b> is the only official partner of Indian Railways that manages online ticket booking. If you have booked your railway ticket through IRCTC website. Just login into IRCTC website and click on 'Booked Ticket History'. Select your E-Ticket and click 'Get PNR Status'.</p>
</ol>


    
    
<b>Current Reservation Status Check Using SMS</b>
<p>Railway has launched SMS service for PNR enquiry to enhance customer satisfaction. Passengers having no access to internet, find it useful and convenient mean. Most popular of them are as follows:</p><br>
<ol>
    <li><b>139 SMS service</b></li>
    <br>
    <p>139 SMS service was initially launched by IRCTC. In order to get PNR status on mobile through SMS, one need to send following message on 139.<br><br>
PNR <your PNR number><br>
For Example: PNR 1023456789 <br>
Available on: Aircel, Airtel, BSNL, iDEA, LOOP, MTNL, MTS, Reliance, TATA, Telenor, Vodafone</p>
    <li><b>5676747 SMS service</b></li><br>
    <p>This SMS service is maintained by railZone. <br>
sms PNR <your PNR number> and send it to 5676747<br>
For Example: PNR 1023456789</p>
</ol>
<br>
<br>

<b>Types of Waitlist Tickets & Their Confirmation Priority</b>
<br>
<p>Based on some predefined rules, railway allots different types of waitlist quota on tickets when ticket is not confirmed.</p>
<br>
<b>GNWL (General Waiting List):</b><p>Liklihood of confirmation for GNWL ticket is on highest priority. You may get a GNWL quota, if you are starting your journey from a station close to train source station and ending your journey at a station close to train destination station.</p><br>
<b>CKWL (Tatkal Waiting List):</b><p>If you are booking your ticket under tatkal quota, you get CKWL status when tickets are unreserved. It is important to note that GNWL tickets will confirm first and then CKWL. Hence there is a very less chance that a CKWL ticket will be confirmed.</p><br>
<p>Apart from these two popular waiting list quotas, Indian Railways has defined some other W/L quotas in long journey trains like <b>RLWL</b> (Remote Location Waiting List), <b>RQWL</b> (Request Waiting List), <b>PQWL</b> (Pooled Quota Waiting List), <b>RLGN</b> (Remote Location General Waiting List) and RSWL (Roadside Station Waiting List). Confirmation chances for these types of waitlist tickets are very less.</p>
<?php

    include "files/footer.php";
?>