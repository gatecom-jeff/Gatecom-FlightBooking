<?php
if($this->responseArray['response'] == 'sucess')
{
?>

<form name="orderaflight" method="post" action="<?php echo base_url('flyg/bookaflight');?>">
  <?php
$hiddenElements = createHiddenElementFromArray($this->postData);
echo $hiddenElements;
$additionalPackageArray = $this->responseArray['data']['AdditionalPackages']['AdditionalPackage'];
$segments = $this->responseArray['data']['Segments']['Segment'];
$c = 0;
foreach($additionalPackageArray as $value)
{
   foreach($value as $key=>$v)
   {
   		echo "<input type='hidden' name='additionalPackage[$c][$key]' value='".$v."'>";
   }
   $c++;
}


$totalAdults = $_POST['adults'];
$totalChilds = $_POST['childs'];
$totalInfants = $_POST['infants'];


$adtBaseFare = $_POST['adtBaseFare'];
$adtTaxFare = $_POST['adtTaxFare'];
$adtTotalFare = $_POST['adtTotalFare'];


$chdBaseFare = isset($_POST['chdBaseFare']) ? $_POST['chdBaseFare'] : '0';
$chdTaxFare = isset($_POST['chdTaxFare']) ? $_POST['chdTaxFare'] : '0';
$chdTotalFare = isset($_POST['chdTotalFare']) ? $_POST['chdTotalFare'] : '0';

$infBaseFare = isset($_POST['infBaseFare']) ? $_POST['infBaseFare'] : '0';
$infTaxFare = isset($_POST['infTaxFare']) ? $_POST['infTaxFare'] : '0';
$infTotalFare = isset($_POST['infTotalFare']) ? $_POST['infTotalFare'] : '0';

$outLegLength = isset($_POST['outLegLength']) ? $_POST['outLegLength'] : '0';
$outTotalTravelTime = isset($_POST['outTotalTravelTime']) ? $_POST['outTotalTravelTime'] : '0';
$outTransferTime = isset($_POST['outTransferTime']) ? $_POST['outTransferTime'] : '0';

$inLegLength = isset($_POST['inLegLength']) ? $_POST['inLegLength'] : '0';
$inTotalTravelTime = isset($_POST['inTotalTravelTime']) ? $_POST['inTotalTravelTime'] : '0';
$inTransferTime = isset($_POST['inTransferTime']) ? $_POST['inTransferTime'] : '0';


$outDepAirportCityName = isset($_POST['outDepAirportCityName']) ? $_POST['outDepAirportCityName'] : '0';
$outDestAirportCityName = isset($_POST['outDestAirportCityName']) ? $_POST['outDestAirportCityName'] : '0';


$inAirportCityName = isset($_POST['inDepAirportCityName']) ? $_POST['inDepAirportCityName'] : '0';
$inDestAirportCityName = isset($_POST['inDestAirportCityName']) ? $_POST['inDestAirportCityName'] : '0';
$currencyNotation = isset($_POST['currency_Notation']) ? $_POST['currency_Notation'] : '0';
$totalAmount = ($adtTotalFare * $totalAdults) +  ($chdTotalFare* $totalChilds) +  ($infTotalFare*$totalInfants);
$tripType = $_POST['tripType'];


extract($this->postData);
$outDateTime = isset($_POST['outDateTime']) ? $_POST['outDateTime'] : '';
$outDateTime = ($outDateTime != '') ? date("d M Y H:i",strtotime($outDateTime)) : '';

$inDateTime = isset($_POST['inDateTime']) ? $_POST['inDateTime'] : '';
$inDateTime = ($inDateTime != '') ? date("d M Y H:i",strtotime($inDateTime)) : '';



?>
  <input type="hidden" name="packageLength" value="<?php echo count($additionalPackageArray)?>">
  <input type="hidden" name="totalPackage" value="<?php echo count($additionalPackageArray)?>" />
  <input type="hidden" name="totalAmount" value="<?php echo $totalAmount?>">
  <div class="main_div_thanx">
    <div class="thanx_bg_top"></div>
    <div><img src="<?php echo base_url('images/blue_bg_cor_r.png')?>" alt="" /></div>
    <div class="main_bg_blue1">
      <h1><img src="<?php echo base_url('images/icon_h.png')?>" alt="" width="21" height="22" />You want to book the following</h1>
    </div>
    <div class="white_t_div" style="padding:0px;">
      <div class="white_bgthanx">
        <div class="width_8">
          <div class="rs_div_feight">
            <h2><?php echo $totalAmount.' ' .$currencyNotation; ?></h2>
            <p>Tax included <span><img src="<?php echo base_url('images/man-f.jpg')?>" alt="" width="14" height="22" /> X <?php echo $totalAdults;?></span></p>
          </div>
          <div class="ticket2_feight2">TICKET:</div>
          <div class="ticket_feight2_content"><?php echo $outDepAirportCityName.' - '.$outDestAirportCityName;?><br />
            <?php echo $inAirportCityName.' - '.$inDestAirportCityName;?> </div>
        </div>
		
        <div class="row1">
          <!--      <h5>PICK DEPARTURE </h5>-->
          <div class="img1"><img src="<?php echo base_url('images/carrier/'.$carrierCode.'.gif')?>" alt="" /></div>
          <div class="fromtimeblue_b"> DEPARTURE DATE:</div>
          <div class="arrivalblue_one"><?php echo $outDateTime;?> </div>
         
        </div>
		<?php
		if($inDateTime != '')
		{
		?>
        <div class="row1">
          <!--      <h5>PICK DEPARTURE </h5>-->
          <div class="img1">&nbsp;</div>
          <div class="fromtimeblue_b"> RETURN DATE:</div>
          <div class="arrivalblue_one"><?php echo $inDateTime;?> </div>
        </div>
		<?php } ?>
        <div class="row1">
          <!--      <h5>PICK DEPARTURE </h5>-->
          <div class="img1">&nbsp;</div>
          <div class="fromtimeblue_b"> TRAVELLERS: </div>
          <div class="arrivalblue_b"><?php echo $totalAdults;?> Adults </div>
          <div class="toblue_b"><?php echo $totalChilds;?> Childs </div>
          <div class="flightblue_b" ><?php echo $totalInfants;?> Infants</div>
          <div class="durationblue_b" ></div>
        </div>
        <div class="row1">
          <!--      <h5>PICK DEPARTURE </h5>-->
          <div class="img1">&nbsp;</div>
          <div class="fromtimeblue_b"> AIRLINE: </div>
          <div class="arrivalblue_b"> </div>
          <div class="toblue_b"> </div>
          <div class="flightblue_b" ></div>
          <div class="durationblue_b" ></div>
        </div>
        <p class="clear"></p>
      </div>
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
$segmentArray = isset($segments[$i]) ? $segments[$i] : $segments;

if($tripType != 'O')
{		
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
			 
			</div>
			<?php						
		}
	}

}
else if($tripType == 'O')
{
	
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
?>
        <p class="clear"></p>
      </div>
    </div>
	<?php
	if($tripType != 'O')
	{
	?>
	
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
    <?php
	}
	?>
	<div class="white_t_div1"  style="background:none;">
      <div class="blue_main_bg_feight">
        <div class="blue_light_bg_felight">
        <samp>
          <div class="posr_r">
            <div class="form_feight2_r">
              <div class="input_div_feight2">
                <h3>Bounus card</h3>
                <div style="margin-bottom:40px;"><samp>
                  <div class="jqTransformSelectWrapper2">
                    <select name="prim-Title" id="primPas-Title" style="width:170px">
                      <option value="0">Choose</option>
                      <option value="1">Men</option>
                      <option value="2">Miss</option>
                      <option value="3">Mrs.</option>
                      <option value="4">Master</option>
                    </select>
                  </div>
            </div>
              </div>
              <p>&nbsp;</p>
              <div class="input_div_feight2">
                <h3>Bounus number</h3>
                <div class="input">
                  <input type="text" name="prim-firstName" id="prim-firstName" />
                </div>
              </div>
              <p>Adipiscing elit, sed diamnonu lommy nibh euismod tincidunt ut laoreet dolore magna liquam erat volutpat. eorum claritatem. Investigationes 25€. Adipiscing elit, sed diamnonu lommy nibh euismod tincidunt ut laoreet dolore magna liquam erat volutpat. eorum claritatem. Investigationes 25€.</p>
            </div>
          </div>
          <div class="feight_form"> <samp>
            <h1>Save time add personal number and let Klarna do it for you.</h1>
            <div class="input_div_feight2">
              <h3>Personal number</h3>
              <div class="input">
                <input name="personaNumber" id="personaNumber" type="text" />
              </div>
            </div>
            <div class="input_div_feight2"> <img src="<?php echo base_url('images/klarna.png')?>" alt="" class="karlra_img"/> </div>
            <h4 class=" clear">Orderer/Contact person</h4>
            <div class="input_div_feight2">
              <h3>Title</h3>
              <div class="input_blanck">
                <div class="jqTransformSelectWrapper1">
                  <select name="prim-Title" id="primPas-Title" style="width:100px">
                    <option value="0">Choose</option>
                    <option value="1">Men</option>
                    <option value="2">Miss</option>
                    <option value="3">Mrs.</option>
                    <option value="4">Master</option>
                  </select>
                </div>
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>First Name</h3>
              <div class="input">
                <input type="text" name="prim-firstName" id="prim-firstName" />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>Surname*</h3>
              <div class="input">
                <input type="text" name="prim-sirName" id="prim-sirName" required/>
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>Adress*</h3>
              <div class="input">
                <input type="text" name="prim-address" id="prim-address" required />
              </div>
            </div>
            <div class="input_div_feight2 control-group">
              <h3>Postal code*</h3>
              <div class="input">
                <input type="number" name="prim-pincode" id="prim-pincode"  required maxlength="10" />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>City*</h3>
              <div class="input">
                <input type="text" name="prim-city" id="prim-city" required/>
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>Company name/adress</h3>
              <div class="input">
                <input type="text" name="prim-comanyText" id="prim-comanyText" />
              </div>
            </div>
            <div class="input_div_feight2 control-group">
              <h3>Phone*</h3>
              <div class="input">
                <input type="number" name="prim-phone" id="prim-phone" required />
				<p class="help-block"></p>
              </div>
            </div>
            <div class="input_div_feight2 control-group">
              <h3>Mobile</h3>
              <div class="input">
                <input type="number" name="prim-mobile" id="prim-mobile" />
				<p class="help-block"></p>
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>Email*</h3>
              <div class="input">
                <input type="email" name="prim-email" id="prim-email" required/>
              </div>
            </div>
            <div class="input_div_feight2 control-group">
              <h3>Verify email*</h3>
              <div class="input">
                <input type="text" name="prim-vefifyemail" id="prim-vefifyemail" data-validation-match-match="prim-email"
data-validation-match-message="Both email must match" required  />
<p class="help-block"></p>
              </div>
            </div>
            <div class="redio_div_feight2">
              <div class="check_div_order">
                <input type="radio" name="color" value="Blue" />
                <label for="colorBlue" class="opt_feight" >Copy contact person to first traveller.</label>
              </div>
              <div class="check_div_feight">
                <input type="radio" name="color" value="Blue" />
                <label for="colorBlue" class="opt_feight" >The payment is made by other than the <span style="padding-left:9px;">traveller.</span></label>
              </div>
            </div>
    
           <h4> <input type="submit" name="submit" value=""  class="continue_btn" /></h4>
		   <!--<div class="height_4"><a href="javascript:void(0)"  onclick="orderaflight.submit();"><img src="<?php echo base_url('images/search_best.png');?>" alt="" /></a>-->
            <div class="clear"></div>
           </div>
       </samp> </div>
      </div>
    </div>
   
  </div>
  
   
</form>
<?php
}else{
	$errorMsg = isset($this->responseArray['data']) ? $this->responseArray['data'] : '';
	echo "<p>$errorMsg</p>";
}
?>
