<script type="text/javascript">
        $(function(){
            $("#accordion").accordion({ header: "h3", active: false, collapsible: true, fillSpace: true });
        });
    </script>

		
<div class="container" id="searchResult">
	<div class="row">
		<?php
			$msg = '';
			if($this->responseArray['response'] == 'sucess')
			{
			$response = $this->responseArray['data'];
			if(count($response) > 0){
			
			?>
			<div id="accordion">
				<?php
				//echo count($this->responseArray['data']); 
				
				
				foreach($response as $key=>$value)
				{
					
					for($i=0; $i<count($value); $i++)
					{
						$attributes = $value[$i]['@attributes'];
						$bookingUrl = $attributes['bookingUrl'];
						$outLeg   =   isset($value[$i]['out']['leg']) ? $value[$i]['out']['leg'] : '';
						$inLeg   =   isset($value[$i]['in']['leg']) ? $value[$i]['in']['leg'] :'';
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
							}
						}
						
				?>
				<div>
					<h3><a href="#"><?php echo $city1." -> ".$city2;?></a></h3>
					<div style="min-height:200px;overflow:scroll;">
					<div style="width:100%; height:100px;clear:both;">
					<div style="width:19%; float:left;border:1px solid #999999;text-align:left;margin:1px;">
					<span>Depature Date</span>
					</div>
					<div style="width:19%; float:left;border:1px solid #999999;text-align:left;margin:1px;"><span>Arrival Date</span></div>
					<div style="width:19%; float:left;border:1px solid #999999;text-align:left;margin:1px;">
						<span>Adult:</span><?php echo $adults;?><br />
						<span>Childs:</span><?php echo $childs;?><br />
						<span>Child(0-1):</span><?php echo $childs;?><br />
						
					</div>
					<div style="width:19%; float:left;border:1px solid #999999;text-align:left;margin:1px;font-weight:bold;font-size:14px;">
					<?php echo $total?><br />Incl. Taxes.
					</div>
					<div style="width:19%; float:left;border:1px solid #999999;text-align:left;margin:1px;">book Now</div>
					</div>
					
					<!--Passanger Information-->
					
					<div style="width:100%;clear:both;">
					
					<div class="searchBox">Passanger Type</div>
					<div class="searchBox">Passanger</div>
					<div class="searchBox">Base Fare</div>
					<div class="searchBox">Tax Fare</div>
					<div class="searchBox">Total(<?php echo $currency;?>)</div>
					</div>
					<?php
					
					if($adults > 0)
					{
					
					?>
					<div style="width:100%;clear:both;">
					<div class="searchBox">Adults</div>
					<div class="searchBox"><?php echo $adults;?> </div>
					<div class="searchBox"><?php echo $adtBaseFare;?></div>
					<div class="searchBox"><?php echo $adtTaxFare;?></div>
					
					<div class="searchBox"><?php echo $adtTotalFare;?></div>
					</div>
					<?php
					}
					if($childs > 0)
					{
					?>
					<div style="width:100%;clear:both;">
					<div class="searchBox">Childs</div>
					<div class="searchBox"><?php echo $childs;?> </div>
					<div class="searchBox"><?php echo $chdBaseFare;?></div>
					<div class="searchBox"><?php echo $chdTaxFare;?></div>
					
					<div class="searchBox"><?php echo $chdTotalFare;?></div>
					</div>
					<?php
					}
					if($infants > 0)
					{
					?>
					<div style="width:100%;clear:both;">
					<div class="searchBox">Infants</div>
					<div class="searchBox"><?php echo $infants;?> </div>
					<div class="searchBox"><?php echo $infBaseFare;?></div>
					<div class="searchBox"><?php echo $infTaxFare;?></div>
					
					<div class="searchBox"><?php echo $infTotalFare;?></div>
					</div>
					<?php
					}
					?>
					<!--End of Passanger Information-->
					<!--Out Leg-->
					<div style="width:100%;clear:both;">
					<div class="searchBox">&nbsp;</div>
					<div class="searchBox">Flight</div>
					<div class="searchBox">From</div>
					<div class="searchBox">Depature Date</div>
					<div class="searchBox">TO</div>
					<div class="searchBox">Arrival Date</div>
					<div class="searchBox">Operated By</div>
					<div class="searchBox">Travel Time</div>
					</div>
					<?php
					for($c = 0; $c < $outLeg; $c++)
					{
					$outLegArray = $outLeg[$i]['@attributes'];
					?>
					<div style="width:100%;clear:both;">
					<div class="searchBox"><input type="checkbox" name="" id="" value="" /></div>
					<div class="searchBox"><?php echo $outLegArray['flightNumber'];?></div>
					<div class="searchBox"><?php echo $outLegArray['departureCityCode'];?></div>
					<div class="searchBox"><?php echo $outLegArray['departureDate'];?></div>
					<div class="searchBox"><?php echo $outLegArray['destinationCityCode'];?></div>
					<div class="searchBox"><?php echo $outLegArray['arrivalDate'];?></div>
					<div class="searchBox">&nbsp;</div>
					<div class="searchBox">&nbsp;</div>
					</div>
					<?php
					}
					?>
					<!--End of Out Leg-->
					</div>
				</div>
				<?php
					}
				}	
				?>  
              
			</div>
			<?php
				}else{
					$msg =  "No flights is available.";
				}
				
			}else{
				$msg = "Error Occured";
			}
			
			if($msg != ''){
			?>
			<div class="alert alert-info"><?php echo $msg;?></div>
			<?php
			}
			?>
		
	
	
      </div>
    <br />
</div>
<script type="text/javascript">
window.setTimeout("loaderHide()",5000);
function loaderHide(){
	$("#progressBar").hide();
	$("#searchResult").show();
}
</script>
