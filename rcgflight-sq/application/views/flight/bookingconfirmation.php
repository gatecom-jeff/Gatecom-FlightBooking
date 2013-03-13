<?php
if($this->responseArray['response'] == 'sucess'){

		$orderId = isset($this->responseArray['data']['OrderId']) ? $this->responseArray['data']['OrderId'] : '';
		$pnr = isset($this->responseArray['data']['Pnr']) ? $this->responseArray['data']['Pnr'] : '';

		$segments = $this->responseArray['data']['Segments']['Segment'];
		$buyerInformation = isset($this->responseArray['data']['BuyerInformation']) ? $this->responseArray['data']['BuyerInformation'] : ''; 
		$paymentDesArray = isset($this->responseArray['data']['PaymentDescription']) ? $this->responseArray['data']['PaymentDescription'] : ''; 
		$segments = $this->responseArray['data']['Segments']['Segment'];

		$buyerInformation = isset($this->responseArray['data']['BuyerInformation']) ? $this->responseArray['data']['BuyerInformation'] : ''; 
		$paymentDesArray = isset($this->responseArray['data']['PaymentDescription']) ? $this->responseArray['data']['PaymentDescription'] : '';
		

}
extract($this->postData);
$totalAdults = $_POST['adults'];
$totalChilds = $_POST['childs'];
$totalInfants = $_POST['infants'];

$outDateTime = isset($_POST['outDateTime']) ? $_POST['outDateTime'] : '';
$outDateTime = ($outDateTime != '') ? date("d M Y H:i",strtotime($outDateTime)) : '';

$inDateTime = isset($_POST['inDateTime']) ? $_POST['inDateTime'] : '';
$inDateTime = ($inDateTime != '') ? date("d M Y H:i",strtotime($inDateTime)) : '';
?>		


<div class="white_bg_main"><div class="main_div_thanx"><div class="thanx_bg_top"></div><div><img src="<?php echo base_url('images/blue_bg_cor_r.png')?>" alt="" /></div>
    <div class="main_bg_blue"><img src="<?php echo base_url('images/small_logo.png')?>" alt="" width="197" height="50" /><h1>Thank you for buying your E-ticket with us!</h1>
	
	
	
	</div> 
	<?php
		
	?>
	
	 <div class="main_thanx_white">
    <div class="thanx_bg_gray"><img src="<?php echo base_url('images/gray_r_thanx.jpg')?>" alt="" align="right" /><img src="<?php echo base_url('images/gray_l_thanx.jpg')?>" alt="" width="18" height="73" class="float_l" />
      <p>BOOKING REFERENCE
      <br />
      <span><?php echo isset($pnr) ? $pnr : '';?></span></p> </div>
      <p class="clear"></p>
    <h2>Tack för ditt förtroende <br />
Viktig information om din bokning</h2>

<p>Solid reseförsäkring</p>
<p>Om du har tecknat Solid Reseförsäkring och du behöver hjälp eller svar på några frågor, kontakta Solid Försäkringars larmcentral som har öppet dygnet runt, året om och finns till för att hjälpa dig. <span>De nås på 013-131313 eller <br />
kunder@solidab.se.</span></p>
<p>&nbsp;</p>

<p>Så här får du din biljett</p>
<p>När din betalning kommit oss tillhanda, kommer en elektronisk biljett att utfärdas</p>
<p>Reseplanen är alltid uppdaterad och samtliga aviserade tidtabellsförändringar uppdateras direkt. Vi rekommenderar att du tittar på Reseplanen för ev. tidtabellsförändringar 72 timmar innan avresa.</p>

<p>Har du glömt att beställa t.ex sittplatser eller specialkost kan du alltid kontakata oss i efterhand så hjälper vi dig med det
Försäkringar kan köpas senast 24timmar efter själva köpet därefter så är det inte möjligt att teckna nya försäkringar</p>
<p>&nbsp;</p>

<h2>!! Om du inte har mottagit dina färdhandlingar inom 3 dagar efter betalning, vänligen meddela Resecentrumgruppen !!</h2>

<h2>Best Regards <br />
ReseCentrum Gruppen</h2> </div>

<div class="thanx_white_top"></div><div><img src="<?php echo base_url('images/white_bg_cor_r.png')?>" alt="" /></div>
<div style="padding-top:15px;"><img src="<?php echo base_url('images/hire.png')?>" alt="" width="465" height="272" /><img src="<?php echo base_url('images/hire.png')?>" alt="" width="467" height="265" /></div>

<div class="white_t_div">
<div class="t_thanx_white_top"></div><div><img src="<?php echo base_url('images/t_white_bg_cor_r.png')?>" alt="" /></div> 
<div class="white_bgthanx">
<div class="ticket_div">
<div class="ticket_1">TICKET:</div>
<div class="scroll_thanx">Stockholm (STO) - Paris (PAR)<br />
Paris (PAR) - Stockholm (STO) </div>

</div>
                <div class="row1">

                
                  <!--      <h5>PICK DEPARTURE </h5>-->
                  <div class="img1"><img src="<?php echo base_url('images/flaf.jpg')?>" alt="" width="64" height="19" /></div>
                  <div class="fromtimeblue_b"> DEPARTURE DATE:</div>
                  <div class="arrivalblue_one"><?php echo $outDateTime;?> </div>
          </div>
                <div class="row1">
                  
                  <div class="img1">&nbsp;</div>
                  <div class="fromtimeblue_b"> RETURN DATE:</div>
                  <div class="arrivalblue_one"><?php echo $inDateTime;?> </div>
            </div>
                <div class="row1">
                  <!--      <h5>PICK DEPARTURE </h5>-->
                  <div class="img1">&nbsp;</div>
                  <div class="fromtimeblue_b"> TRAVELLERS:	</div>
                  <div class="arrivalblue_b"><?php echo $totalAdults;?> Adults </div>
                  <div class="toblue_b"><?php echo $totalChilds;?> Childs  </div>
                  <div class="flightblue_b" ><?php echo $totalInfants;?> Infants</div>
                 
                </div>
    
       <p class="clear"></p>       </div>

</div> 

<div class="white_t_div1">
      <div class="light_thanx_bg"><img src="<?php echo base_url('images/red_air.png')?>" alt="" /> DEPARTURE</div>
      <div class="white_bgthanx">
        <div class="row">
          <div class="img">&nbsp;</div>
          <div class="dateheading">Date<br />
            Time</div>
          <div class="fromtimeblue">From</div>
          <div class="arrivalblue">Arrival</div>
          <div class="toblue">To</div>
          <div class="flightblue" >Flight</div>
          <div class="durationblue" >Duration	Stops</div>
          <div class="opertedblue" >Operated by</div>
        </div>
        <?php
$i= 0;

$segmentArray = $segments[$i];

if($segmentArray > 0)
{
	$depSegments = count($segments) / 2;
	for($i=0; $i< $depSegments; $i++)
	{
		$segmentArray = $segments[$i];
		$flightName = isset($segmentArray['FlightName']) ? $segmentArray['FlightName'] : '&nbsp;';
		
		$fromPlace = isset($segmentArray['FromPlace']) ? $segmentArray['FromPlace'] : '&nbsp;';
		$fromPlaceArr = preg_split("/\s+/",$fromPlace);
		$fromPlace = $fromPlaceArr[count($fromPlaceArr) - 1];
		$fromPlace = getAirportCityName($fromPlace, 'flightList');
		
		
		$toPlace = isset($segmentArray['ToPlace']) ? $segmentArray['ToPlace'] : '&nbsp;';
		$toPlaceArr = preg_split("/\s+/",$toPlace);
		$toPlace = $toPlaceArr[count($toPlaceArr) - 1];
		$toPlace = getAirportCityName($toPlace, 'flightList');
		

		$depDate = isset($segmentArray['DepDate']) ? $segmentArray['DepDate'] : '&nbsp;';
		$arrDate = isset($segmentArray['ArrDate']) ? $segmentArray['ArrDate'] : '&nbsp;';
		$duration = isset($segmentArray['Duration']) ? $segmentArray['Duration'] : '&nbsp;';
		$durationArray = explode('hr ', $duration);
		if($durationArray[0] < 10)
			$duration = "0".$duration;
			
		$operatedBy = isset($segmentArray['OperatedBy']) ? $segmentArray['OperatedBy'] : '&nbsp;';
		$flightNameArr = preg_split("/\s+/",$flightName);
		$flightName = $flightNameArr[count($flightNameArr) - 1];
		
		
		
		
?>
        <div class="row">
          <div class="img"></div>
          <div class="datetext">
            <?php  echo $depDate;?>
          </div>
          <div class="fromtimetext"><?php echo $fromPlace;?> </div>
          <div class="arrivaltext">
            <?php  echo $arrDate;?>
            <p class="red_txt">(+1)</p>
          </div>
          <div class="totext"><?php echo $toPlace;?></div>
          <div class="flighttext" >
            <?php  echo $flightName;?>
          </div>
          <div class="durationtext" >
            <?php  echo $duration;?>
          </div>
          <div class="totext"><?php echo $operatedBy;?></div>
          <!-- <div class="clear"></div>
                 <div class="img"></div>
              <div class="datetext"><img src="<?php echo base_url('images/stop.jpg')?>" alt="" width="31" height="38" /> </div>
              <div class="fromtimetext">&nbsp;</div>
              <div class="arrivaltext">&nbsp;</div>
              <div class="totext">&nbsp;</div>
              <div class="flighttext" >&nbsp;</div>
              <div class="durationtext" >&nbsp;</div>
              <div class="redblue">0h 45m stop </div>-->
        </div>
        <?php						
	}
}else{
	
	    $segmentArray = $segments;
		$flightName = isset($segmentArray['FlightName']) ? $segmentArray['FlightName'] : '&nbsp;';
		
		$fromPlace = isset($segmentArray['FromPlace']) ? $segmentArray['FromPlace'] : '&nbsp;';
		$fromPlaceArr = preg_split("/\s+/",$fromPlace);
		$fromPlace = $fromPlaceArr[count($fromPlaceArr) - 1];
		
		$toPlace = isset($segmentArray['ToPlace']) ? $segmentArray['ToPlace'] : '&nbsp;';
		$toPlaceArr = preg_split("/\s+/",$toPlace);
		$toPlace = $toPlaceArr[count($toPlaceArr) - 1];
		
		$depDate = isset($segmentArray['DepDate']) ? $segmentArray['DepDate'] : '&nbsp;';
		$arrDate = isset($segmentArray['ArrDate']) ? $segmentArray['ArrDate'] : '&nbsp;';
		$duration = isset($segmentArray['Duration']) ? $segmentArray['Duration'] : '&nbsp;';
		$operatedBy = isset($segmentArray['OperatedBy']) ? $segmentArray['OperatedBy'] : '&nbsp;';
		$flightNameArr = preg_split("/\s+/",$flightName);
		$flightName = $flightNameArr[count($flightNameArr) - 1];
?>
        <div class="pull-left" style="width: 70px">
          <?php  echo $depDate;?>
        </div>
        <div class="pull-left" style="width: 133px"><?php echo $fromPlace;?></div>
        <div class="pull-left" style="width: 70px">
          <?php  echo $arrDate;?>
        </div>
        <div class="pull-left" style="width: 133px"><?php echo $toPlace;?></div>
        <div class="pull-left" style="width: 50px">
          <?php  echo $flightName;?>
        </div>
        <div class="pull-left" style="width: 50px">
          <?php  echo $duration;?>
        </div>
        <div style="clear:both; height:3px;">&nbsp;</div>
        <div class="row">
          <div class="img"></div>
          <div class="datetext">
            <?php  echo $depDate;?>
          </div>
          <div class="fromtimetext"><?php echo $fromPlace;?> </div>
          <div class="arrivaltext">
            <?php  echo $arrDate;?>
            <p class="red_txt">(+1)</p>
          </div>
          <div class="totext"><?php echo $toPlace;?></div>
          <div class="flighttext" >
            <?php  echo $flightName;?>
          </div>
          <div class="durationtext" >
            <?php  echo $duration;?>
          </div>
          <div class="totext">London  Heathrow</div>
          <!-- <div class="clear"></div>
                 <div class="img"></div>
              <div class="datetext"><img src="<?php echo base_url('images/stop.jpg')?>" alt="" width="31" height="38" /> </div>
              <div class="fromtimetext">&nbsp;</div>
              <div class="arrivaltext">&nbsp;</div>
              <div class="totext">&nbsp;</div>
              <div class="flighttext" >&nbsp;</div>
              <div class="durationtext" >&nbsp;</div>
              <div class="redblue">0h 45m stop </div>-->
        </div>
        <?php						
	}
?>
        <p class="clear"></p>
      </div>
    </div>
	
	
	
	<div class="white_t_div1">
      <div class="light_thanx_bg1"><img src="<?php echo base_url('images/black_air.png')?>" alt="" width="23" height="19" /> RETURN</div>
      <div class="white_bgthanx">
        <div class="row">
          <div class="img">&nbsp;</div>
          <div class="dateheading">Date<br />
            Time</div>
          <div class="fromtimeblue">From</div>
          <div class="arrivalblue">Arrival</div>
          <div class="toblue">To</div>
          <div class="flightblue" >Flight</div>
          <div class="durationblue" >Duration	Stops</div>
          <div class="opertedblue" >Operated by</div>
        </div>
        <?php
$i= 0;

$segmentArray = $segments[$i];

if($segmentArray > 0)
{
	$depSegments = count($segments) / 2;
	for($i=$depSegments; $i< count($segments); $i++)
	{
		$segmentArray = $segments[$i];
		$flightName = isset($segmentArray['FlightName']) ? $segmentArray['FlightName'] : '&nbsp;';
		//$fromPlace = isset($segmentArray['FromPlace']) ? $segmentArray['FromPlace'] : '&nbsp;';
		//$toPlace = isset($segmentArray['ToPlace']) ? $segmentArray['ToPlace'] : '&nbsp;';<br />

		$fromPlace = isset($segmentArray['FromPlace']) ? $segmentArray['FromPlace'] : '&nbsp;';
		$fromPlaceArr = preg_split("/\s+/",$fromPlace);
		$fromPlace = $fromPlaceArr[count($fromPlaceArr) - 1];
		$fromPlace = getAirportCityName($fromPlace, 'flightList');
		
		
		$toPlace = isset($segmentArray['ToPlace']) ? $segmentArray['ToPlace'] : '&nbsp;';
		$toPlaceArr = preg_split("/\s+/",$toPlace);
		$toPlace = $toPlaceArr[count($toPlaceArr) - 1];
		$toPlace = getAirportCityName($toPlace, 'flightList');
		

		$depDate = isset($segmentArray['DepDate']) ? $segmentArray['DepDate'] : '&nbsp;';
		$arrDate = isset($segmentArray['ArrDate']) ? $segmentArray['ArrDate'] : '&nbsp;';
		$duration = isset($segmentArray['Duration']) ? $segmentArray['Duration'] : '&nbsp;';
		$durationArray = explode('hr ', $duration);
		if($durationArray[0] < 10)
			$duration = "0".$duration;
			
		$operatedBy = isset($segmentArray['OperatedBy']) ? $segmentArray['OperatedBy'] : '&nbsp;';
		$flightNameArr = preg_split("/\s+/",$flightName);
		$flightName = $flightNameArr[count($flightNameArr) - 1];
		
?>
        <div class="row">
          <div class="img"></div>
          <div class="datetext">
            <?php  echo $depDate;?>
          </div>
          <div class="fromtimetext"><?php echo $fromPlace;?> </div>
          <div class="arrivaltext">
            <?php  echo $arrDate;?>
            <p class="red_txt">(+1)</p>
          </div>
          <div class="totext"><?php echo $toPlace;?></div>
          <div class="flighttext" >
            <?php  echo $flightName;?>
          </div>
          <div class="durationtext" >
            <?php  echo $duration;?>
          </div>
          <div class="totext"><?php echo $operatedBy;?></div>
          <!-- <div class="clear"></div>
                 <div class="img"></div>
              <div class="datetext"><img src="<?php echo base_url('images/stop.jpg')?>" alt="" width="31" height="38" /> </div>
              <div class="fromtimetext">&nbsp;</div>
              <div class="arrivaltext">&nbsp;</div>
              <div class="totext">&nbsp;</div>
              <div class="flighttext" >&nbsp;</div>
              <div class="durationtext" >&nbsp;</div>
              <div class="redblue">0h 45m stop </div>-->
        </div>
        <?php						
	}
}else{
	
	    $segmentArray = $segments;
		$flightName = isset($segmentArray['FlightName']) ? $segmentArray['FlightName'] : '&nbsp;';
		
		$fromPlace = isset($segmentArray['FromPlace']) ? $segmentArray['FromPlace'] : '&nbsp;';
		$fromPlaceArr = preg_split("/\s+/",$fromPlace);
		$fromPlace = $fromPlaceArr[count($fromPlaceArr) - 1];
		
		$toPlace = isset($segmentArray['ToPlace']) ? $segmentArray['ToPlace'] : '&nbsp;';
		$toPlaceArr = preg_split("/\s+/",$toPlace);
		$toPlace = $toPlaceArr[count($toPlaceArr) - 1];
		
		$depDate = isset($segmentArray['DepDate']) ? $segmentArray['DepDate'] : '&nbsp;';
		$arrDate = isset($segmentArray['ArrDate']) ? $segmentArray['ArrDate'] : '&nbsp;';
		$duration = isset($segmentArray['Duration']) ? $segmentArray['Duration'] : '&nbsp;';
		$operatedBy = isset($segmentArray['OperatedBy']) ? $segmentArray['OperatedBy'] : '&nbsp;';
		$flightNameArr = preg_split("/\s+/",$flightName);
		$flightName = $flightNameArr[count($flightNameArr) - 1];
?>
        <div class="pull-left" style="width: 70px">
          <?php  echo $depDate;?>

        </div>
        <div class="pull-left" style="width: 133px"><?php echo $fromPlace;?></div>
        <div class="pull-left" style="width: 70px">
          <?php  echo $arrDate;?>
        </div>
        <div class="pull-left" style="width: 133px"><?php echo $toPlace;?></div>
        <div class="pull-left" style="width: 50px">
          <?php  echo $flightName;?>
        </div>
        <div class="pull-left" style="width: 50px">
          <?php  echo $duration;?>
        </div>
        <div style="clear:both; height:3px;">&nbsp;</div>
        <div class="row">
          <div class="img"></div>
          <div class="datetext">
            <?php  echo $depDate;?>
          </div>
          <div class="fromtimetext"><?php echo $fromPlace;?> </div>
          <div class="arrivaltext">
            <?php  echo $arrDate;?>
            <p class="red_txt">(+1)</p>
          </div>
          <div class="totext"><?php echo $toPlace;?></div>
          <div class="flighttext" >
            <?php  echo $flightName;?>
          </div>
          <div class="durationtext" >
            <?php  echo $duration;?>
          </div>
          <div class="totext">London  Heathrow</div>
          <!-- <div class="clear"></div>
                 <div class="img"></div>
              <div class="datetext"><img src="<?php echo base_url('images/stop.jpg')?>" alt="" width="31" height="38" /> </div>
              <div class="fromtimetext">&nbsp;</div>
              <div class="arrivaltext">&nbsp;</div>
              <div class="totext">&nbsp;</div>
              <div class="flighttext" >&nbsp;</div>
              <div class="durationtext" >&nbsp;</div>
              <div class="redblue">0h 45m stop </div>-->
        </div>
        <?php						
	}
?>
        <p class="clear"></p>
      </div>
    </div>
	
	
	
<div class="white_t_div">





<div class="blue_main_bg">
<div class="blue_light_bg">
<div style="padding:10px 0px 0px 55px;"><h3>Information:</h3>
<?php
$i == 1;
if(count($buyerInformation) > 0){
?>
<p class="clear">
	<div class="number_tanx_box">1.</div> 
	<div class="dec_tanx_box">Mr. <?php echo $buyerInformation['FirstName']?> <?php echo $buyerInformation['LastName']?> </div>
	<div class="date_tanx_box">22/08/1972	</div>
	<div class="buyer_tanx_box"><?php echo ($i == 1) ? 'Buyer/traveller' : 'Traveller';?></div> 
</p>
<?php
$i++;
} 
?>
	


<div class="clear"></div>
</div>
<div class="blue_dark_thanx"><img src="<?php echo base_url('images/blue_stop.jpg')?>" alt="" align="left" />Important!<br />
  Please check that all information is correct, if not contact us as <br />
  soon as possible on: 08-16 88 00</div>





</div>
<div class="box_right_thanx">
<div class="box"><h5>Price details for your booking:</h5><div class="img"><img src="<?php echo base_url('images/top_box_flight.png')?>" alt="" width="231" height="15" /></div>
<div class="bg"><ul>
<li>* Ticket price 2450€</li>

<li>* Trip cancellation insurance 20€</li>

<li>* SMS travel plan 2€</li>

<li>* Taxes and fees included</li></ul></div>
<div class="img"><img src="<?php echo base_url('images/b_box_flight.png')?>" alt="" width="231" height="15" /></div></div>
<div class="rs_div">Total: <span>2462 €</span>
<p>Tax included</p></div>
</div>
<p class="clear"></p></div>
</div>
  
</div>
     <p class="clear"></p> </div>