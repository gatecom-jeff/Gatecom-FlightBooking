<?php
if($this->responseArray['response'] == 'sucess')
{
//echo "<pre>";
//print_r($this->responseArray['data']);
//print_r($_POST);
?>

<form name="bookAFlight" method="post" action="<?php echo base_url('flyg/bookingintermediate');?>">
  <?php
$hiddenElements = createHiddenElementFromArray($this->postData);
echo $hiddenElements;
$additionalPackageArray = $this->responseArray['data']['AdditionalPackages']['AdditionalPackage'];
$segments = $this->responseArray['data']['Segments']['Segment'];

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

$totalAmount = $adtTotalFare +  $chdTotalFare +  $infTotalFare;

extract($this->postData);
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
            <p>Tax included <span><img src="<?php echo base_url('images/man.jpg')?>" alt="" width="14" height="22" /> X <?php echo $totalAdults;?></span></p>
          </div>
          <div class="ticket2_feight2">TICKET:</div>
          <div class="ticket_feight2_content"><?php echo $outDepAirportCityName.' - '.$outDestAirportCityName;?><br />
            <?php echo $inAirportCityName.' - '.$inDestAirportCityName;?> </div>
        </div>
        <div class="row1">
          <!--      <h5>PICK DEPARTURE </h5>-->
          <div class="img1"><img src="<?php echo base_url('images/carrier/'.$carrierCode.'.gif')?>" alt="" /></div>
          <div class="fromtimeblue_b"> DEPARTURE DATE:</div>
          <div class="arrivalblue_b">30 </div>
          <div class="toblue_b">january </div>
          <div class="flightblue_b" >2013</div>
          <div class="durationblue_b" >23:45</div>
        </div>
        <div class="row1">
          <!--      <h5>PICK DEPARTURE </h5>-->
          <div class="img1">&nbsp;</div>
          <div class="fromtimeblue_b"> RETURN DATE:</div>
          <div class="arrivalblue_b">17 </div>
          <div class="toblue_b">february </div>
          <div class="flightblue_b" >2013</div>
          <div class="durationblue_b" >23:45</div>
        </div>
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

$segmentArray = $segments[$i];

if($segmentArray > 0)
{
	$depSegments = count($segments) / 2;
	for($i=0; $i< $depSegments; $i++)
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
    <div class="white_t_div1"  style="background:none;">
      <div class="blue_main_bg_feight">
        <div class="blue_light_bg_felight">
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
               </samp> </div>
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
                <input type="text" name="prim-sirName" id="prim-sirName"/>
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>Adress*</h3>
              <div class="input">
                <input type="text" name="prim-address" id="prim-address"  />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>Postal code*</h3>
              <div class="input">
                <input type="text" name="prim-pincode" id="prim-pincode"  />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>City*</h3>
              <div class="input">
                <input type="text" name="prim-city" id="prim-city"/>
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>Company name/adress</h3>
              <div class="input">
                <input type="text" name="prim-comanyText" id="prim-comanyText" />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>Phone*</h3>
              <div class="input">
                <input type="text" name="prim-phone" id="prim-phone"  />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>Mobile</h3>
              <div class="input">
                <input type="text" name="prim-mobile" id="prim-mobile" />
              </div>
            </div>
            <p class="clear"></p>
            <div class="input_div_feight2">
              <h3>Email*</h3>
              <div class="input">
                <input type="text" name="prim-email" id="prim-email" />
              </div>
            </div>
            <div class="input_div_feight2">
              <h3>Verify email*</h3>
              <div class="input">
                <input type="text" name="prim-vefifyemail" id="prim-vefifyemail" />
              </div>
            </div>
            <div class="redio_div_feight2">
              <div class="check_div">
                <input type="radio" name="color" value="Blue" />
                <label for="colorBlue" class="opt_feight" >Copy contact person to first traveller.</label>
              </div>
              <div class="check_div_feight">
                <input type="radio" name="color" value="Blue" />
                <label for="colorBlue" class="opt_feight" >The payment is made by other than the <span style="padding-left:9px;">traveller.</span></label>
              </div>
            </div>
    
            <h4> <div class="cont"> <a href="javascript:void(0)" onclick="javascript:bookAFlight.submit();"><img src="<?php echo base_url('images/cont.png')?>" alt="" /> </a></div></h4>
            <div class="clear"></div>
            </samp> </div>
        </div>
      </div>
    </div>
    <!--Traveller Details-->

    <div class="blue_main_bg_feight" style="margin-top:10px;"> <samp>
      <div class="blue_light_bg_felight">
        <div class="feight_form">
          <h1>Travellers Details</h1>
          <?php


for($i=0; $i< $adults; $i++){
?>
          <div class="line_bg"><?php echo $i + 1; ?> Adult</div>
          <div class="input_subchild_feight2">
            <h3>The First Name on the passport *</h3>
            <div class="input">
              <input type="text" name="nicknameadult_<?php echo $i?>" id="nicknameadult_<?php echo $i?>" />
            </div>
          </div>
          <div class="input_subchild_feight2">
            <h3>Last Name in the passport *</h3>
            <div class="input">
              <input type="text" name="lastnameadult_<?php echo $i?>" id="lastnameadult_<?php echo $i?>" />
            </div>
          </div>
          <div class="input_subchild_feight2">
            <h3>Title</h3>
            <div class="select">
              <div class="jqTransformSelectWrapper1">
                <select name="titleadult_<?php echo $i?>" id="titleadult_<?php echo $i?>" style="width:100px">
                  <option value="0">Choose</option>
                  <option value="1">Men</option>
                  <option value="2">Miss</option>
                  <option value="3">Mrs.</option>
                  <option value="4">Master</option>
                </select>
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <?php
	
	if(count($additionalPackageArray) > 0)
	{	
		
		$str = '';
		
		for($counterPack = 0; $counterPack < count($additionalPackageArray); $counterPack++)
		{
			$pakageType = isset($additionalPackageArray[$counterPack]['type']) ? $additionalPackageArray[$counterPack]['type']  : '';
				
			if($pakageType ==  'ADT' || $additionalPackageArray[$counterPack]['Name'] == 'SFPD')
			{
				if($additionalPackageArray[$counterPack]['Name'] == 'SFPD')
				 {
				 	
					/*$packageDesc = $additionalPackageArray[$counterPack]['description'];
					$sfdElement = explode('-', $packageDesc);
					$genderChk = array_search("Gender", $sfdElement);
					$dobChk = array_search("Date Of Birth", $sfdElement);
					$colspan = 4;	
					if($genderChk >= 0){
						$colspan = $colspan - 1;
						$str .="<td><div>Gender<br><select name='genderadult[".$i."]' id='genderadult".$i."' style='width:100px;'><option value=''>Choose</option><option value='1'>Male</option><option value='2'>Female</option></select></div></td>";
					}
					if($dobChk != ''){
						$colspan = $colspan - 1;
						$str .="<td><div>Date of Birth<br><input type='text' name='birthdayadultadult[".$i."]' id='birthdayadult".$i."' value=''></div></td>";
					}
					if($colspan > 0)
					{
						$str .="<tr>".$str."<td colspan='".$colspan."'></td></tr>";
					}else{
						$str .="<tr>".$str."</tr>";
					}
					*/
					
					
			
					
				 }
				 else
				 {
				 	$str .='<div id="maincontainer">';
					
					
					if($counterPack == 0){
						$preferredSeat =' 
						<div class="jqTransformSelectWrapper1">	<select name="prefferedseatingadult_'.$i.'" id="prefferedseatingadult_'.$i.'" style="width:100px">
									<option value="">Choose</option>
									<option value="W">Window</option>
									<option value="A">asle</option>
									<option value="ST">Seat Together</option>
								</select></div>';
					}else{
						$preferredSeat  = '';
					}
					
					$str .= '<div style="float:right; margin-right:140px; width:30%">'.$preferredSeat.'</div>';
					
						$str .= '<div class="check_subchild">
						<input type="checkbox" name="chkAdult_'.$i.'_'.$counterPack.'"  id="chkAdult_'.$i.'_'.$counterPack.'" value="'.rawurlencode($additionalPackageArray[$counterPack]['description']).'###'.$additionalPackageArray[$counterPack]['amount'].'""></td>';
					$str .= ' <label for="colorBlue" class="opt_bookflight" >'.$additionalPackageArray[$counterPack]['description'].'</label>';
					
					
					//$str .='<td style="font-weight:bold;">'.$additionalPackageArray[$counterPack]['description'].'</td>';
					
					$str .='</div></div><div class="clear"></div>';
				 }
				}
			}
		}
		echo $str;
	}
?>
        </div>
        <!--Child Passanger Details-->
        <?php
if($childs > 0)
{
?>
        <div class="blue_line"></div>
        <div class="feight_form">
          <h1>Child Travellers Details</h1>
          <?php


for($i=0; $i< $childs; $i++){
?>
          <div class="line_bg">Child</div>
          <div class="input_subchild_feight2">
            <h3>The First Name on the passport *</h3>
            <div class="input">
             <input type="text" name="nicknamechild_<?php echo $i?>" id="nicknamechild_<?php echo $i?>"  />
            </div>
          </div>
          <div class="input_subchild_feight2">
            <h3>Last Name in the passport *</h3>
            <div class="input">
             <input type="text" name="lastnamechild_<?php echo $i?>" id="lastnamechild_<?php echo $i?>" />
            </div>
          </div>
          <div class="input_subchild_feight2">
            <h3>Title</h3>
            <div class="select">
              <div class="jqTransformSelectWrapper1">
                <select name="titlechild_<?php echo $i?>" id="titlechild_<?php echo $i?>" style="width:100px">
                  <option value="0">Choose</option>
                  <option value="1">Men</option>
                  <option value="2">Miss</option>
                  <option value="3">Mrs.</option>
                  <option value="4">Master</option>
                </select>
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <?php
	
	if(count($additionalPackageArray) > 0)
	{	
		
		$str = '';
		
		for($counterPack = 0; $counterPack < count($additionalPackageArray); $counterPack++)
		{
			$pakageType = isset($additionalPackageArray[$counterPack]['type']) ? $additionalPackageArray[$counterPack]['type']  : '';
				
			
			if($pakageType ==  'CNN')
			{
				if($additionalPackageArray[$counterPack]['Name'] == 'SFPD')
				 {
				 	
					/*$packageDesc = $additionalPackageArray[$counterPack]['description'];
					$sfdElement = explode('-', $packageDesc);
					$genderChk = array_search("Gender", $sfdElement);
					$dobChk = array_search("Date Of Birth", $sfdElement);
					$colspan = 4;	
					if($genderChk >= 0){
						$colspan = $colspan - 1;
						$str .="<td><div>Gender<br><select name='genderadult[".$i."]' id='genderadult".$i."' style='width:100px;'><option value=''>Choose</option><option value='1'>Male</option><option value='2'>Female</option></select></div></td>";
					}
					if($dobChk != ''){
						$colspan = $colspan - 1;
						$str .="<td><div>Date of Birth<br><input type='text' name='birthdayadultadult[".$i."]' id='birthdayadult".$i."' value=''></div></td>";
					}
					if($colspan > 0)
					{
						$str .="<tr>".$str."<td colspan='".$colspan."'></td></tr>";
					}else{
						$str .="<tr>".$str."</tr>";
					}
					*/
					
					
			
					
				 }
				 else
				 {
				 	$str .='<div id="maincontainer">';
					
					
					if($counterPack == 0){
						$preferredSeat =' 
								<div class="jqTransformSelectWrapper1"><select name="prefferedseatingchild_'.$i.'" id="prefferedseatingchild_'.$i.'" style="width:100px">
									<option value="">Choose</option>
									<option value="W">Window</option>
									<option value="A">asle</option>
									<option value="ST">Seat Together</option>
								</select></div>';
					}else{
						$preferredSeat  = '';
					}
					
					$str .= '<div style="float:right; margin-right:140px; width:30%">'.$preferredSeat.'</div>';
					
						$str .= '<div class="check_subchild">
						<input type="checkbox" name="chkChild_'.$i.'_'.$counterPack.'"  id="chkChild_'.$i.'_'.$counterPack.'" value="'.rawurlencode($additionalPackageArray[$counterPack]['description']).'###'.$additionalPackageArray[$counterPack]['amount'].'""></td>';
					$str .= ' <label for="colorBlue" class="opt_bookflight" >'.$additionalPackageArray[$counterPack]['description'].'</label>';
					
					
					//$str .='<td style="font-weight:bold;">'.$additionalPackageArray[$counterPack]['description'].'</td>';
					
					$str .='</div></div><div class="clear"></div>';
				 }
				}
			}
		}
		echo $str;
	}
?>
        </div>
        <?php } ?>
        <!--End of Child Passanger Details-->
        <!--Infants Passanger Details-->
        <?php
if($infants > 0)
{
?>
        <div class="blue_line"></div>
        <div class="feight_form">
          <h1>Infants Travellers Details</h1>
          <?php


for($i=0; $i< $infants; $i++){
?>
          <div class="input_subchild_feight2">
            <h3>The First Name on the passport *</h3>
            <div class="input">
              <input type="text" name="nicknameinfant_<?php echo $i?>" id="nicknameinfant_<<?php echo $i?>"  />
            </div>
          </div>
          <div class="input_subchild_feight2">
            <h3>Last Name in the passport *</h3>
            <div class="input">
              <input type="text" name="lastnameinfant_<?php echo $i?>" id="lastnameinfant_<?php echo $i?>" />
            </div>
          </div>
          <div class="input_subchild_feight2">
            <h3>Title</h3>
            <div class="select">
              <div class="jqTransformSelectWrapper1">
                <select name="titleinfant_<?php echo $i?>" id="titleinfant_<?php echo $i?>" style="width:100px">
                  <option value="0">Choose</option>
                  <option value="1">Men</option>
                  <option value="2">Miss</option>
                  <option value="3">Mrs.</option>
                  <option value="4">Master</option>
                </select>
              </div>
                  </div>
          </div>
          <div class="clear"></div>
          <?php
	
	if(count($additionalPackageArray) > 0)
	{	
		
		$str = '';
		
		for($counterPack = 0; $counterPack < count($additionalPackageArray); $counterPack++)
		{
			$pakageType = isset($additionalPackageArray[$counterPack]['type']) ? $additionalPackageArray[$counterPack]['type']  : '';
				
			if($pakageType ==  'INF')
			{
				if($additionalPackageArray[$counterPack]['Name'] == 'SFPD')
				 {
				 	
					/*$packageDesc = $additionalPackageArray[$counterPack]['description'];
					$sfdElement = explode('-', $packageDesc);
					$genderChk = array_search("Gender", $sfdElement);
					$dobChk = array_search("Date Of Birth", $sfdElement);
					$colspan = 4;	
					if($genderChk >= 0){
						$colspan = $colspan - 1;
						$str .="<td><div>Gender<br><select name='genderadult[".$i."]' id='genderadult".$i."' style='width:100px;'><option value=''>Choose</option><option value='1'>Male</option><option value='2'>Female</option></select></div></td>";
					}
					if($dobChk != ''){
						$colspan = $colspan - 1;
						$str .="<td><div>Date of Birth<br><input type='text' name='birthdayadultadult[".$i."]' id='birthdayadult".$i."' value=''></div></td>";
					}
					if($colspan > 0)
					{
						$str .="<tr>".$str."<td colspan='".$colspan."'></td></tr>";
					}else{
						$str .="<tr>".$str."</tr>";
					}
					*/
					
					
			
					
				 }
				 else
				 {
				 	$str .='<div id="maincontainer">';
					
					
					if($counterPack == 0){
						$preferredSeat =' 
						<div class="jqTransformSelectWrapper1">		<select name="prefferedseatinginfant_'.$i.'" id="prefferedseatinginfant_'.$i.'" style="width:100px">
									<option value="">Choose</option>
									<option value="W">Window</option>
									<option value="A">asle</option>
									<option value="ST">Seat Together</option>
								</select></div>';
					}else{
						$preferredSeat  = '';
					}
					
					$str .= '<div style="float:right; margin-right:140px; width:30%">'.$preferredSeat.'</div>';
					
						$str .= '<div class="check_subchild">
						<input type="checkbox" name="chkinfant_'.$i.'_'.$counterPack.'"  id="chkinfant_'.$i.'_'.$counterPack.'" value="'.rawurlencode($additionalPackageArray[$counterPack]['description']).'###'.$additionalPackageArray[$counterPack]['amount'].'""></td>';
					$str .= ' <label for="colorBlue" class="opt_bookflight" >'.$additionalPackageArray[$counterPack]['description'].'</label>';
					
					
					//$str .='<td style="font-weight:bold;">'.$additionalPackageArray[$counterPack]['description'].'</td>';
					
					$str .='</div></div><div class="clear"></div> ';
				 }
				}
			}
		}
		echo $str;
	}
?>
        </div>
        <?php } ?>
        <!--End of Infants Passanger Details-->
      </div>
      </samp></div>
    <!--End of Travellers Details-->
  </div>
  <!--End of Traveller Details-->
   <div class="cont"> <a href="javascript:void(0)" onclick="javascript:bookAFlight.submit();"><img src="<?php echo base_url('images/cont.png')?>" alt="" /> </a></div>
</form>
<?php
}else{
	$errorMsg = isset($this->responseArray['data']) ? $this->responseArray['data'] : '';
	echo "<p>$errorMsg</p>";
}
?>
