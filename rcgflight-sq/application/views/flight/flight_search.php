<script type="text/javascript">
        $(function(){
            $("#accordion").accordion({ header: "h3", active: false, collapsible: true, fillSpace: true });
        });
</script>
<?php
if($this->responseArray['response'] == 'sucess')
	{
	
		
		
	  if(count($this->responseArray['data']) > 0)
		{
			$response = $this->responseArray['data']['price'];
			if(isset($this->postData['date']))
			{
				$year = substr($this->postData['date'], -4);				 
			}
			else
			{
				$year = '';
			}
			
			$depCity = $this->postData['depCity'];
			$destCity = $this->postData['destCity'];
			$newResponse = array();
			$newResCou = 0;
			
			$value = priceGrouping($response, 0, $newResponse, $newResCou, 0, $flexibleSearch);
			$topHeader = '';
			$innerRow = '';
			$inDateRow = '';
			if($flexibleSearch != '')
			{
			$dateHeaderResultArray = createDateHeader($value);
			$inArrayLength = $dateHeaderResultArray['inArrayLength'];
			$widthDivisor = ($inArrayLength > 0) ? $inArrayLength: 1; 
			$dateHeaderArray = $dateHeaderResultArray['result'];
			$inflightChk =  $dateHeaderResultArray['flightin'];
			
			$strDateHeader = '';
			$strDateRow = '';
			
			$str = 'date';
			
			
			
			if($inflightChk != '')
			{
			
			
			for($k=0;$k < count($dateHeaderArray); $k++)
			{
				$topHeader .= '<li>'.$dateHeaderArray[0][$k]["outdate"].'</li>';
				$inDepDate = isset($dateHeaderArray[$k][0]["indate"]) ? $dateHeaderArray[$k][0]["indate"]: '';
			
				if($inDepDate != '')
					$inDateRow .= '<li>'.$inDepDate.'</li>';
			
			
			for($l=0;$l < count($dateHeaderArray); $l++)
			{
			if(isset($dateHeaderArray[$k][$l]))
			{
			
			$str = 'outdate';
			
			
			$innerRow .= '<li id="li-'.$dateHeaderArray[$k][$l][$str].'-'.$inDepDate.'"  onclick=showFlightDiv("'.$dateHeaderArray[0][$k][$str].'")>'.$dateHeaderArray[$k][$l]['total'].' '.$dateHeaderArray[$k][$l]['currency'].'<br /><img src="../images/carrier/'.$dateHeaderArray[$k][$l]['carrierCode'].'.gif" /></li>';
			}
			
			
			}
			
			
			
			}
			}
			else
			{
			$inDateRow .= "<li></li>";
			for($k=0;$k < $inArrayLength; $k++)
			{
			$str = 'outdate';
			$topHeader .= '<li>'.$dateHeaderArray[0][$k]["outdate"].'</li>';
			$innerRow .= '<li id="li-'.$dateHeaderArray[0][$k][$str].'" onclick=showFlightDiv("'.$dateHeaderArray[0][$k][$str].'")>'.$dateHeaderArray[0][$k]['total'].' '.$dateHeaderArray[0][$k]['currency'].'<br /><img src="../images/carrier/'.$dateHeaderArray[0][$k]['carrierCode'].'.gif" /></li>';
			}
			}
			
			
			
			
			?>
			<div class="table_div_sell">
          <div class="toper">
            <ul><?php echo $topHeader;?></ul>
          </div>
		  <div class="clear"></div>
          <div class="dark_pink">
            <ul><?php echo $inDateRow;?></ul>
          </div>
          <div class="dark_pink_content">
            <ul><?php echo $innerRow;?></ul>
          </div>
         
        </div>
			
			
			<?php } 
			
			?>
			<div id="flightResult">
			<?php
			for($i=0; $i<count($value); $i++)
			{
			
						$attributes = $value[$i]['@attributes'];
						$bookingUrl = $attributes['bookingUrl'];
						$outLegArray = isset($value[$i]['out']) ? $value[$i]['out'] : '';
						
						
						$outLeg   =   isset($value[$i]['out'][0]['leg']) ? $value[$i]['out'][0]['leg'] : '';
						$resultOutArray = getTotalDuration($outLegArray[0]['leg'], $year, 'out');
						
						$inLegArray =  isset($value[$i]['in']) ? $value[$i]['in'] : '';
						$inLeg = '';
						$resultInArray = '';
						if($inLegArray != '')
						{
							$inLeg   =   isset($value[$i]['in'][0]['leg']) ? $value[$i]['in'][0]['leg'] :'';
							$resultInArray = getTotalDuration($inLegArray[0]['leg'], $year, 'in');
						
						}
					
						
						$currentOutDateHeader = '';
						$previousOutDateHeader = '';
						
						$currentInDateHeader = '';
						$previousInDateHeader = '';
						
						if($flexibleSearch != '')
						{
							
							$legArr = isset($value[$i]['out'][0]['leg'][0]['@attributes']) ? $value[$i]['out'][0]['leg'][0]['@attributes'] : $value[$i]['out'][0]['leg']['@attributes'];
							if($inLeg != '')
								$inlegArr = isset($value[$i]['in'][0]['leg'][0]['@attributes']) ? $value[$i]['in'][0]['leg'][0]['@attributes'] : $value[$i]['in'][0]['leg']['@attributes'];
							if($i == 0)
							{
								$currentOutDateHeader = $legArr['departureDate'];
								$previousOutDateHeader = $legArr['departureDate'];
								if($inLeg != '')
								{
									$currentInDateHeader = $inlegArr['departureDate'];
									$previousInDateHeader = $inlegArr['departureDate'];
								}
							}
							else
							{
								$currentOutDateHeader = $legArr['departureDate'];
								
								$prevLegArr = isset($value[$i - 1]['out'][0]['leg'][0]['@attributes']) ? $value[$i - 1]['out'][0]['leg'][0]['@attributes'] : $value[$i - 1]['out'][0]['leg']['@attributes'];
								$previousOutDateHeader = $prevLegArr['departureDate'];
								
								
								
								if($inLeg != '')
								{
									$currentInDateHeader = $inlegArr['departureDate'];
									$prevInLegArr = isset($value[$i - 1]['in'][0]['leg'][0]['@attributes']) ? $value[$i - 1]['in'][0]['leg'][0]['@attributes'] : $value[$i - 1]['in'][0]['leg']['@attributes'];
									$previousInDateHeader = $prevInLegArr['departureDate'];
									
								}
								
							}
						
							
							
							if(($currentOutDateHeader == $previousOutDateHeader) && ($currentInDateHeader == $previousInDateHeader))
							{
								$matched = 1;
							}else
							{
								$matched = '0'; 
							}
							if($i == "0"  || $matched == 1)
							{
								$style="style='display:block'";
							}
							else
							{
								$style="style='display:none'";
							}
							if($matched == 0)
							      echo '</div>';	
							if($i == 0 || $matched == 0)
							{
								if($currentInDateHeader != '')
									$condition = $currentOutDateHeader."-".$currentInDateHeader;
								else
									$condition = $currentOutDateHeader;
								echo "<div id='".$condition."' $style>";
							}
						}
						
			?>
			 <form name="form_<?php echo $i; ?>" method="post"  action="<?php echo base_url('flyg/orderflight');?>" />
			 
		<div class="table_div">
        <div class="white_div"><img src="<?php echo base_url('images/carrier/'.$resultOutArray["carrierCode"].'.gif');?>" alt="" /></div>
      
	   
	   <?php
	   
	   	/*Start of booking URL hidden Value set*/
	   $itineraryId = $attributes['itineraryId'];
						$currency = $attributes['currency'];
						$tax = $attributes['tax'];
						$total = $attributes['total'];
						$bookingUrlArray = explode("&", $bookingUrl);
						$city1 = '';
						$city2 = '';
						$adults = '0';
						$childs = '0';
						$infants = '0';
						$itinerary_id = '';
						$pricekey = '';
						$triptype = '';
						$trip1 = '';
						$trip2 = '';
						$trip3 = '';
						$trip4 = '';
						$sessionId = '';
						$sessionKey = '';
						$companyId = '';
						$accessId = '';
						$currency_Notation = '';
						$adtBaseFare = '';
						$adtTaxFare = '';
						$adtTotalFare = '';
						$chdBaseFare = '';
						$chdTaxFare = '';
						$chdTotalFare = '';
						$infBaseFare = '';
						$infTaxFare = '';
						$infTotalFare = '';
							

						for($c=0; $c<count($bookingUrlArray); $c++)
						{
							$bookingParamArray = explode("=", $bookingUrlArray[$c]);							

							if($bookingParamArray[0] == 'key'){
								$key = $bookingParamArray[1];
							}else if($bookingParamArray[0] == 'city1'){
								$city1 = $bookingParamArray[1];
							}else if($bookingParamArray[0] == 'city2'){
								$city2 = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'adults'){
								$adults = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'childs'){
								$childs = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'infants'){
								$infants = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'itinerary_id'){
								$itinerary_id = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'pricekey'){
								$pricekey = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'triptype'){
								$triptype = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'trip1'){
								$trip1 = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'trip2'){
								$trip2 = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'trip3'){
								$trip3 = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'trip4'){
								$trip4 = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'tripCount'){
								$tripCount = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'sessionId'){
								$sessionId = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'sessionKey'){
								$sessionKey = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'companyId'){
								$companyId = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'accessId'){
								$accessId = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'currency_Notation'){
								$currency_Notation = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'adtBaseFare'){
								$adtBaseFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'adtTaxFare'){
								$adtTaxFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'adtTotalFare'){
								$adtTotalFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'chdBaseFare'){
								$chdBaseFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'chdTaxFare'){
								$chdTaxFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'chdTotalFare'){
								$chdTotalFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'infBaseFare'){
								$infBaseFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'infTaxFare'){
								$infTaxFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'infTotalFare'){
								$infTotalFare = $bookingParamArray[1]; 
							}else if($bookingParamArray[0] == 'total'){
								$totalFare = $total[1]; 
							}
						}
							$totalTravellers = '';
							if($adults > 0)
								 $totalTravellers = $adults.' Adults';
							/*if($childs > 0)
								 $totalTravellers .= $childs.' Childs';
							if($infants > 0)
								 $totalTravellers .= $infants.' Infants';*/
								 
			?>
			<input type="hidden" name="depCity" value="<?php echo $this->postData['depCity']?>" />
				
				<input type="hidden" name="date" value="<?php echo $this->postData['date']?>" />
				<input type="hidden" name="destCity" value="<?php echo $this->postData['destCity']?>" />
				<input type="hidden" name="date2" value="<?php echo $this->postData['date2']?>" />
				<input type="hidden" name="numAdults" value="<?php echo $this->postData['numAdults']?>" />
				<input type="hidden" name="numChilds" value="<?php echo $this->postData['numChilds']?>" />
				<input type="hidden" name="childAge" value="<?php echo $this->postData['childAge']?>" />
				<input type="hidden" name="flexibleSearch" value="<?php echo $this->postData['flexibleSearch']?>" />
				<input type="hidden" name="directFlight" value="<?php echo $this->postData['directFlight']?>" />
				
				<!--<input type="hidden" name="flightName" value="<?php echo $this->postData['flightName']?>" />--> 
				<input type="hidden" name="tripType" value="<?php echo $this->postData['tripType']?>" />
				<!--End of Post Data--> 
				 
				<input type="hidden" name="key" value="gPRtTAwjLa8HiIZAy/im+YRIYztzbIiD" />
				<input type="hidden" name="city1" value="<?php echo $city1?>" />
				<input type="hidden" name="city2" value="<?php echo $city2?>" />
				<input type="hidden" name="adults" value="<?php echo $adults?>" />
				<input type="hidden" name="childs" value="<?php echo $childs?>" />
				<input type="hidden" name="infants" value="<?php echo $infants?>" />
				<input type="hidden" name="itinerary_id" value="<?php echo $itinerary_id?>" />
				<input type="hidden" name="pricekey" value="<?php echo $pricekey?>" />
				<input type="hidden" name="triptype" value="<?php echo $triptype?>" />
				<input type="hidden" name="trip1" value="<?php echo $trip1?>" />
				<input type="hidden" name="trip2" value="<?php echo $trip2?>" />
				<input type="hidden" name="trip3" value="<?php echo $trip3?>" />
				<input type="hidden" name="trip4" value="<?php echo $trip4?>" />
				<input type="hidden" name="tripCount" value="<?php echo $tripCount?>" />
				<input type="hidden" name="sessionId" value="<?php echo $sessionId?>" />
				<input type="hidden" name="sessionKey" value="<?php echo $sessionKey?>" />
				<input type="hidden" name="companyId" value="<?php echo $companyId?>" />
				<input type="hidden" name="accessId" value="<?php echo $accessId?>" />
				<input type="hidden" name="currency_Notation" value="<?php echo $currency_Notation?>" />
				
				<input type="hidden" name="adtBaseFare" value="<?php echo $adtBaseFare?>" />
				<input type="hidden" name="adtTaxFare" value="<?php echo $adtTaxFare?>" />
				<input type="hidden" name="adtTotalFare" value="<?php echo $adtTotalFare?>" />
				
				<input type="hidden" name="chdBaseFare" value="<?php echo $chdBaseFare?>" />
				<input type="hidden" name="chdTaxFare" value="<?php echo $chdTaxFare?>" />
				<input type="hidden" name="chdTotalFare" value="<?php echo $chdTotalFare?>" />
				
				<input type="hidden" name="infBaseFare" value="<?php echo $infBaseFare?>" />
				<input type="hidden" name="infTaxFare" value="<?php echo $infTaxFare?>" />
				<input type="hidden" name="infTotalFare" value="<?php echo $infTotalFare?>" />
				
			<!--End of booking URL hidden Value set-->
			
			<?php
					
				$resultArray = getFlightHeader($outLeg, $inLeg, $triptype, $year);
				$inDepCityCode = '';
				$inDestCityCode = '';
				$inTotalTravelTime = 0;
				$inDateTime = '';
				
				$outDepCityCode = $resultArray['out']['dep'];
				$outDestCityCode = $resultArray['out']['dest'];
				$outTotalTravelTime = $resultArray['out']['totalTravelTime'];
				$outDateTime = $resultArray['out']['depdate'];
				if($triptype == 'R')
				{
					$inDepCityCode = $resultArray['in']['dep'];
					$inDestCityCode = $resultArray['in']['dest'];
					$inTotalTravelTime = $resultArray['in']['totalTravelTime'];
					$inDateTime = $resultArray['in']['depdate'];
				
				}
				$outDepAiportCityName = isset($resultOutArray['depAirportCityName']['hidden']) ? $resultOutArray['depAirportCityName']['hidden']: '';
				$outDestAiportCityName = isset($resultOutArray['destAirportCityName']['hidden']) ? $resultOutArray['destAirportCityName']['hidden']: '';
				$outDepAiportCityNameHeader = isset($resultOutArray['depAirportCityName']['header']) ? $resultOutArray['depAirportCityName']['header']: '';
				$outDestAiportCityNameHeader = isset($resultOutArray['destAirportCityName']['header']) ? $resultOutArray['destAirportCityName']['header']: '';
			?>	
			<input type="hidden" name="carrierCode" value="<?php echo $resultOutArray['carrierCode'];?>">
			<input type="hidden" name="outLegLength" value="<?php echo $resultOutArray['legLength'];?>">
			<input type="hidden" name="outTotalTravelTime" value="<?php echo $resultOutArray['totalTravelTime'];?>">
			<input type="hidden" name="outTransferTime" value="<?php echo $resultOutArray['transferTime'];?>">
			<input type="hidden" name="outDepAirportCityName" value="<?php echo $outDepAiportCityName;?>">
			<input type="hidden" name="outDestAirportCityName" value="<?php echo $outDestAiportCityName;?>">
			<input type="hidden" name="outDateTime" value="<?php echo $outDateTime;?>">
			<?php
							
				$inDepAiportCityName = '';
				$inDestAiportCityName = '';
				if($inLeg !='')
				{
					$inDepAiportCityName = isset($resultOutArray['depAirportCityName']['hidden']) ? $resultInArray['depAirportCityName']['hidden']: '';
					$inDestAiportCityName = isset($resultOutArray['destAirportCityName']['hidden']) ? $resultInArray['destAirportCityName']['hidden']: '';
		   ?>
			<input type="hidden" name="inLegLength" value="<?php echo $resultInArray['legLength'];?>">
			<input type="hidden" name="inTotalTravelTime" value="<?php echo $resultInArray['totalTravelTime'];?>">
			<input type="hidden" name="inTransferTime" value="<?php echo $resultInArray['transferTime'];?>">
			<input type="hidden" name="inDepAirportCityName" value="<?php echo $inDepAiportCityName;?>">
			<input type="hidden" name="inDestAirportCityName" value="<?php echo $inDestAiportCityName;?>">
			<input type="hidden" name="inDateTime" value="<?php echo $inDateTime;?>">
			<?php
				}
			?>			
          <div class="table_div_main">
            <div class="blue_light" style="height:auto;">
              <div class="ist_div">
                <h3><?php echo getCarrierNameFromCarrierCode($resultOutArray['carrierCode']);?></h3>
                <p>	<?php echo ucfirst($outDepAiportCityNameHeader).'- '.ucfirst($outDestAiportCityNameHeader)?></p>
                <?php 
				if($inLeg !='')
				{
					echo "<p>".ucfirst($inDepAiportCityName)."-".ucfirst($inDestAiportCityName)."</p>";
				}
				?>
              </div>
              <div class="second_div">
                <h3><img src="<?php echo base_url('images/klarna.jpg');?>" alt="<?php echo $resultOutArray["carrierCode"];?>" /></h3>
                <p>Installment <br />
                  226 %/ month</p>
              </div>
              <div class="third_div">
                <div class="rs_div">
                  <h2 style="">
				   <a class="demo-tip-twitter" title="<strong class='title-heading'>Fare Detail</strong>
			 <?php if($adults >0)
				   { ?>
				   <br> Adult Fare : <?php echo $adults ."*". $adtBaseFare;?>
				   <br> Adult Tax  : <?php echo $adults ."*". $adtTaxFare;
				   } if($childs >0)
				   {?>
				   <br> Child Fare : <?php echo $childs ."*". $chdBaseFare;?>
				   <br> Child Tax  : <?php echo $childs ."*". $chdTaxFare;
				   } if($infants >0)
				   {?>
				   <br> Infants Fare : <?php echo $infants ."*". $infBaseFare;?>
				   <br> Infants Tax :  <?php echo $infants ."*". $infTaxFare;
				   } ?>
				   
				   <br> Total : <?php echo $total.' '.$currency;?>">
				   <?php echo $total.' '.$currency;?>
				   </a>
				   </h2>
                  <p>Tax included <span><img src="<?php echo base_url('images/man.jpg');?>" alt="" width="14" height="22" /> X <?php echo $adults;?></span></p>
                </div>
				
                <div class="travel_div"><?php echo ($triptype == 'R') ? 'Return Flight' : ($triptype  == 'O' ? 'One Way'  : '');?> <br />
                  Shortest travel time</div>
              </div>
            </div>
            <div class="dark_white_div">
              <div class="air_div">
                <div class="row">
                  <div class="img"><img src="<?php echo base_url('images/red_air.png');?>" alt="" /></div>
                  <div class="heading">DEPARTURE:</div>
                  <div class="date"><?php echo $resultOutArray['travelDate'];?> </div>
                  <div class="time"><?php echo isset($resultOutArray['travelTime']) ? $resultOutArray['travelTime']: '';?></div>
                  <div class="hour"><?php echo $resultOutArray['totalTravelTime'];?></div>
                  <div class="blkheading">TRAVELLERS:</div>
                  <div class="time_set" ><?php echo $totalTravellers;?></div>
                </div>
				 <?php 
				if($inLeg !='')
				{
				?>
				<div class="row">
                  <div class="img"><img src="<?php echo base_url('images/black_air.png');?>" alt="" /></div>
                  <div class="pinkheading">RETURN: </div>
                  <div class="date"><?php echo $resultInArray['travelDate'];?></div>
                  <div class="time"><?php echo isset($resultInArray['travelTime']) ? $resultInArray['travelTime']: '';?></div>
                  <div class="hour"><?php echo $resultInArray['totalTravelTime'];?></div>
                 
                </div>
				<?php 
				$divId = $total.'-'.$resultOutArray['travelDate'].'-'.$resultInArray['travelDate'].'_'.$i;
				}
				else
				{
					$divId = $total.'-'.$resultOutArray['travelDate'].'-'.'_'.$i;
				} ?>
              </div>
              <!--<div class="close_div"><img src="<?php echo base_url('images/arrow.png');?>" alt="" />
			  	<a class="accordion-toggle expandeicon" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $divId;?>" ></a>
			  </div>-->
			  <div class="close_div"><div class="float_l"><img src="<?php echo base_url('images/arrow.png');?>" alt="" /></div><div class="collapsed-div"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $divId;?>">&nbsp; </a></div></div>
			  
              <div class="arror_reletiveb">
                <div class="arror_absolutue"><img src="<?php echo base_url('images/barrow.jpg');?>" alt="" /></div>
              </div>
            </div>
				<div id="collapse<?php echo $divId;?>" class="blue_white_div expand" style="clear:both;">
              <div class="air_div1">
                <div class="row">
                <div class="close_divh"><img src="<?php echo base_url('images/close_h.png');?>" alt="" /><img src="<?php echo base_url('images/icon_h.png');?>" alt="" /></div>
                
                  <!--      <h5>PICK DEPARTURE </h5>-->
				 
                  <div class="img">&nbsp;</div>
                  <div class="dateheading">Date</div>
                  <div class="date_blue">Time </div>
                  <div class="fromtimeblue">From</div>
                  <div class="arrivalblue">Arrival</div>
                  <div class="toblue">To</div>
                  <div class="flightblue" >Flight</div>
                  <div class="durationblue" >Duration	Stops</div>
                  <div class="opertedblue" >Flight</div>
                </div>
				<?php
				if($outLeg != '' && count($outLeg) > 0) 
				  { 
					for($outLegCounter = 0; $outLegCounter < count($outLegArray) ; $outLegCounter++)
					{
						$outLeg = isset($outLegArray[$outLegCounter]['leg']) ? $outLegArray[$outLegCounter]['leg'] : '';
						if( $outLeg != '')
						{
						?>
						 <div class="img" >
							<samp> <input type="radio" name="out" value="<?php echo $pricekey;?>" style="margin-top:0px;" <?php echo ($outLegCounter == 0)? 'checked' : ''?> />						</samp></div>
				  <?php
						for($k = 0; $k < count($outLeg); $k++)
							{
						
						if(count($outLeg) == 1){
							$outLegChilArray = $outLeg['@attributes'];	
						}else{
							$outLegChilArray = $outLeg[$k]['@attributes'];	
						}
						$selected = '';								
						$carrierName = '';
						$carrierName = getCarrierNameFromCarrierCode($outLegChilArray['carrierCode']);
						$duration = '';
						if(isset($outLegChilArray['duration']))
						{
							$duration = $outLegChilArray['duration'];
							$durationArr = explode(':', $duration);
							if($durationArr[0] < 10)
								$duration = "0".$duration;
						}
						else
						{
							$duration = 0;
						}
										
							?>     
                <div class="row" >
                  <?php if($k != 0)
				 	echo '<div class="img" >&nbsp;</div>';
				  ?>
                  <div class="datetext"><?php  echo $outLegChilArray['departureDate'];?> </div>
                  <div class="datetext"><?php  echo $outLegChilArray['departureTime'];?></div>
                  <div class="fromtimetext"><?php echo getAirportCityName($outLegChilArray['departureCityCode'], 'flightList');?> <span><?php  echo $outLegChilArray['arrivalDate'];?></span></div>
                  <div class="arrivaltext"><?php echo $outLegChilArray['arrivalTime'];?></div>
                  <div class="totext"><?php echo getAirportCityName($outLegChilArray['destinationCityCode'], 'flightList');?></div>
                  <div class="flighttext" ><?php  echo$outLegChilArray['flightNumber'];?></div>
                  <div class="durationtext" ><?php  echo $duration;?></div>
                  <div class="opertedtext" > <?php echo  $outLegChilArray['carrierCode'];?></div>
                </div>
                <?php
					}
				}
				}
				}
				?>
                
             
			 <?php if($inLeg != '') 
			 { 
			 ?>
			 <div class="blue_dark_div">
			  <h5>PICK DEPARTURE </h5>
			  <?php
					for($inLegCounter = 0; $inLegCounter < count($inLegArray) ; $inLegCounter++)
					{
						$itenaryId = isset($inLegArray[$inLegCounter]['itineraryId']) ? $inLegArray[$inLegCounter]['itineraryId'] : $itinerary_id;
						$inLeg = isset($inLegArray[$inLegCounter]['leg']) ? $inLegArray[$inLegCounter]['leg'] : '';	
						if($inLeg)
						{
						?>
						 <div class="img">
						 <samp>
						 <input type="radio" name="in"  value="<?php echo $pricekey;?>" style="margin-top:0px;"  <?php echo ($inLegCounter == 0)? 'checked' : ''?>/>
						 </samp>
						</div>
				  
				 <?php
						
								for($k = 0; $k < count($inLeg); $k++)		
								{	
									$inLegChilArray = array();
									
									if(sizeof($inLeg) == 1)
									{
										$inLegChilArray = isset($inLeg) ? (isset($inLeg['@attributes']) ? $inLeg['@attributes'] : '') : '';	
									}else{
										$inLegChilArray = isset($inLeg[$k]['@attributes']) ? $inLeg[$k]['@attributes'] : '';
									}
									//$inLegChilArray = isset($inLeg[$k]['@attributes']) ? $inLeg[$k]['@attributes'] : isset($inLeg['@attributes']) ? $inLeg['@attributes'] : '';
									
									if($k == 0)
										$checked = 'checked';
									else
										$checked = '';
										
									$carrierName = '';
											
									if(isset($inLegChilArray['duration']))
									{
										$duration = $inLegChilArray['duration'];
										$durationArr = explode(':', $duration);
										if($durationArr[0] < 10)
											$duration = "0".$duration;
									}
									else
									{
										$duration = 0;
									}
										
														
				  ?>
                <div class="row" >
                 
                  <?php if($k != 0)
				 	echo '<div class="img" >&nbsp;</div>';
				  ?>		
                  <div class="datetext"><?php  echo $inLegChilArray['departureDate'];?></div>
                  <div class="datetext"><?php echo $inLegChilArray['departureTime'];?></div>
                  <div class="fromtimetext"><?php echo getAirportCityName($inLegChilArray['departureCityCode'], 'flightList');?> <span><?php  echo $inLegChilArray['arrivalDate'];?></span></div>
                  <div class="arrivaltext"><?php  echo $inLegChilArray['arrivalTime'];?></div>
                  <div class="totext"><?php echo getAirportCityName($inLegChilArray['destinationCityCode'], 'flightList');?></div>
                  <div class="flighttext" ><?php  echo $inLegChilArray['flightNumber'];?></div>
                  <div class="durationtext" ><?php  echo $duration;?></div>
                  <div class="opertedtext" > <?php  echo $inLegChilArray['carrierCode'];?></div>
                </div>
               
                <div class="clear"></div>
              
			  <?php
			  	}
			  	}
				}
			?>
			
				</div>
			<?php
				
			}
			?>
			 <div class="select_btn"><a href="javascript:void(0)" onclick="javascript:$('#progressBar').show();<?php echo 'form_'.$i?>.submit();"><img src="<?php echo base_url('images/select_btn.jpg');?>" alt="" /></a></div>
                <div class="clear"></div>
			 </div>
			  	
            </div>
          </div>
        
      </div>
	  </form>
	  <?php 
	  		} 
		
		echo '</div>'; //End of search result div
		if($flexibleSearch != '')
			 echo "</div>";	
		
	  	}
		else
		{
		 echo "<p class='error'>No Record Found.</p>";
		}
	}
	else
	{
		$errorMsg = isset($this->responseArray['data']) ? $this->responseArray['data'] : '';
		echo "<p class='error'>$errorMsg</p>";
	}
			
	?>


<script type="text/javascript">

$(".dark_pink_content li").click(function(e) {
  			$("#flightResult > div[id]").each(function(){
				$("#"+this.id).hide();
			});
			var clickedId = e.target.id;
			var showDivId = clickedId.replace('li-', '');
			if(showDivId == '')
			{
				clickedId = $(this).closest('li').attr('id');
				showDivId = clickedId.replace('li-', '');
			}
			
			
			console.log(showDivId);
			$("#"+showDivId).show();
			$(".dark_pink_content li").removeClass('active');
			$("#"+clickedId).addClass('active');
			
			
});




$('.collapse').live('show', function(){
    $(this).parent().find('a').addClass('expandeicon').removeClass('collapseIcon'); //add active state to button on open
});

$('.collapse').live('hide', function(){
    $(this).parent().find('a').addClass('collapseIcon').removeClass('expandeicon'); //remove active state to button on close
});
</script>
