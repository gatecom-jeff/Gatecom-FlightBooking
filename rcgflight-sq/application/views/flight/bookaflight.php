
 <form name="bookaflight" method="post"  action="<?php echo base_url('flyg/bookingintermediate');?>"/>
<?php

$hiddenElements = createHiddenElementFromArray($this->postData);
echo $hiddenElements;

$additionalPackageArray = $this->postData['additionalPackage'];

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
  <div class="white_bg_main">
      <div class="main_div_thanx">
        <div class="white_t_div" style="padding-top:0px;">
          <div class="t_thanx_white_top"></div>
          <div style="height:7px;"><img src="<?php echo base_url('images/t_white_bg_cor_r.png');?>" alt="" /></div>
          <div class="white_bgthanx">
            <div class="fl"><img src="<?php echo base_url('images/warning.jpg');?>" alt="" align="left" /></div>
            <div class="feight_warningdiv">
              <h4>WARNING!</h4>
              <p> Your information has to be Adipiscing elit, sed diamnonu lommy nibh euismod tincidunt ut laoreet dolore magna liquam erat volutpat. eorum claritatem. Adipiscing elit, sed diamnonu lommy nibh euismod tincidunt ut laoreet dolore magna liquam erat</p>
              <div class="row2">
                <!--      <h5>PICK DEPARTURE </h5>-->
                <div class="fromtimeblue_b"> <strong>Example: </strong></div>
                <div class="fromtimeblue_b1"><strong>Namn i passet </strong><br />
                  Anders Isak Jonas Svensson </div>
                <div class="fromtimeblue_b1"><strong>Ange namn</strong><br />
                  Anders Svensson</div>
              </div>
            </div>
            <p class="clear"></p>
          </div>
        </div>
        <div class="blue_main_bg_feight">
          <div class="blue_light_bg_felight">
            
            <samp>
              <div class="feight_form">
                <h4 class=" clear">Adult/s</h4>
				<?php 
				for($i=0; $i<$totalAdults; $i++)
				{
				?>
					<div class="input_div_feight2">
                  <h3>Title</h3>
                  <div class="input_blanck3">
                    <div class="jqTransformSelectWrapper1">
                     <select name="titleadult_<?php echo $i?>" id="titleadult_<?php echo $i?>" style="width:120px;" >
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
                  <h3>First name*</h3>
                  <div class="input">
                   <input type="text" name="nicknameadult_<?php echo $i?>" id="nicknameadult_<?php echo $i?>" required/>
                  </div>
                </div>
                <div class="input_div_feight2">
                  <h3>Surname*</h3>
                  <div class="input">
                    <input type="text" name="lastnameadult_<?php echo $i?>" id="lastnameadult_<?php echo $i?>" required/>
                  </div>
                </div>
                <div class="input_div_feight2">
                  <h3>Birthdate*</h3>
                  <div class="input">
                    <input name="birthdayadult_<?php echo $i;?>" id="birthdayadult_<?php echo $i;?>" type="text" required/>
                  </div>
                </div>
				 <p class="clear"></p>
				 
				 <div class="blue_dark_feight3">
            <div class="feight_reletive_inner">
              <div class="absulet_div">
                <div class="float_l"><img src="<?php echo base_url('images/blue_l_feight3.png');?>" alt="" /></div>
                <div class="bg_blue8"> </div>
                <div class="float_t"><img src="<?php echo base_url('images/blue_r_feight3.png');?>" alt="" /></div>
              </div>
            </div>
            <div class="icon_div">
              
              <samp>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/travelservices.jpg');?>" alt="" width="43" height="74" class="icon_img"/></div>
                  Travel <br />

Services 45€<br />
                  <input type="checkbox" name="checkbox" id="checkbox" />
                  <input type="checkbox" name="checkbox" id="checkbox" />
                </div>
				
				<!--
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/s_l.png');?>" alt="" width="78" height="74" class="icon_img"/></div>
                  Bankruptcy <br />
                  Insurance 45&euro;<br />
                  <input type="checkbox" name="checkbox2" id="checkbox2" />
                  <input type="checkbox" name="checkbox2" id="checkbox2" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/extra_bag.jpg');?>" alt="" width="43" height="74" class="icon_img"/></div>
                  Extra<br />
                  Baggage 35&euro;<br />
                  <input type="checkbox" name="checkbox3" id="checkbox3" />
                  <input type="checkbox" name="checkbox3" id="checkbox3" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/sms_plan.jpg');?>" alt="" class="icon_img"/></div>
                  SMS Travel <br />
                  Plans 12€<br />
                  <input type="checkbox" name="checkbox4" id="checkbox4" />
                  <input type="checkbox" name="checkbox4" id="checkbox4" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/umalla.jpg');?>" alt="" width="60" height="78" class="icon_img"/></div>
                  Travel <br />
                  Insurance 80&euro;<br />
                  <input type="checkbox" name="checkbox5" id="checkbox5" />
                  <input type="checkbox" name="checkbox5" id="checkbox5" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/gloabe.jpg');?>" alt="" width="55" height="77" class="icon_img"/></div>
                  Travel Agent <br />
                  Services<br />
                  <input type="checkbox" name="checkbox6" id="checkbox6" />
                  <input type="checkbox" name="checkbox6" id="checkbox6" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/ballom.jpg');?>" alt="" width="53" height="77" class="icon_img"/></div>
                  Unaccompanied<br />
                  child 20€<br />
                  <input type="checkbox" name="checkbox7" id="checkbox7" />
                  <input type="checkbox" name="checkbox7" id="checkbox7" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/pet.jpg');?>" alt="" width="64" height="82" class="icon_img"/></div>
                  Pet<br />
                  Travel<br />
                  <input type="checkbox" name="checkbox8" id="checkbox8" />
                  <input type="checkbox" name="checkbox8" id="checkbox8" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/ghab.jpg');?>" alt="" width="60" height="85" class="icon_img"/></div>
                  Cancellations<br />
                  Insurances 45€<br />
                  <input type="checkbox" name="checkbox9" id="checkbox9" />
                  <input type="checkbox" name="checkbox9" id="checkbox9" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/ring.jpg');?>" alt="" width="52" height="82" class="icon_img"/></div>
                  Personal<br />
                  Services <br />
                  <input type="checkbox" name="checkbox10" id="checkbox10" />
                  <input type="checkbox" name="checkbox10" id="checkbox10" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/hand_cap.jpg');?>" alt="" width="61" height="79" class="icon_img"/></div>
                  Handicap<br />
                  Assistance<br />
                  <input type="checkbox" name="checkbox11" id="checkbox11" />
                  <input type="checkbox" name="checkbox11" id="checkbox11" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/chair.jpg');?>" alt="" width="57" height="88" class="icon_img"/></div>
                  Choose<br />
                  Seats<br />
                  <input type="checkbox" name="checkbox12" id="checkbox12" />
                  <input type="checkbox" name="checkbox12" id="checkbox12" />
                </div>-->
                </samp>
              
            </div>
            <p class="clear"></p>
          </div>
		  
				<?php
				}
                
				?>
                <p class="clear"></p>
				<?php
				if($childs > 0)
				{
				?>
                <h5 class=" clear">Children (2-12)</h5>
                <?php 
				for($i=0; $i< $childs; $i++){
				?>
				
				<div class="input_div_feight2">
                  <h3>Title</h3>
                  <div class="input_blanck3">
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
                <p class="clear"></p>
                <div class="input_div_feight2">
                  <h3>First name*</h3>
                  <div class="input">
                   <input type="text" name="nicknamechild_<?php echo $i?>" id="nicknamechild_<?php echo $i?>"  required/>
                  </div>
                </div>
                <div class="input_div_feight2">
                  <h3>Surname*</h3>
                  <div class="input">
                    <input type="text" name="lastnamechild_<?php echo $i?>" id="lastnamechild_<?php echo $i?>" required/>
                  </div>
                </div>
                <div class="input_div_feight2">
                  <h3>Birthdate*</h3>
                  <div class="input">
                    <input name="birthdaychild_<?php echo $i;?>" id="birthdaychild_<?php echo $i;?>" type="text" required/>
                  </div>
                </div>
				
				<?php 
				}
				} ?>
                <p class="clear"></p>
                <?php
				if($infants > 0)
				{
				?>
                <h5 class=" clear">Children (0-2)</h5>
                <?php 
				for($i=0; $i< $infants; $i++){
				?>
				
				<div class="input_div_feight2">
                  <h3>Title</h3>
                  <div class="input_blanck3">
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
                <p class="clear"></p>
                <div class="input_div_feight2">
                  <h3>First name*</h3>
                  <div class="input">
                   <input type="text" name="nicknameinfant_<?php echo $i?>" id="nicknameinfant_<?php echo $i?>" required/>
                  </div>
                </div>
                <div class="input_div_feight2">
                  <h3>Surname*</h3>
                  <div class="input">
                    <input type="text" name="lastnameinfant_<?php echo $i?>" id="lastnameinfant_<?php echo $i?>"  required/>
                  </div>
                </div>
                <div class="input_div_feight2">
                  <h3>Birthdate*</h3>
                  <div class="input">
                    <input name="birthdayinfant_<?php echo $i;?>" id="birthdayinfant_<?php echo $i;?>" type="text" required/>
                  </div>
                </div>
				 <p class="clear"></p>
				<?php 
				}
				} ?>
                <p class="clear"></p>
              </div>
              </samp>
            
          </div>
          <!--<div class="blue_dark_feight3">
            <div class="feight_reletive_inner">
              <div class="absulet_div">
                <div class="float_l"><img src="<?php echo base_url('images/blue_l_feight3.png');?>" alt="" /></div>
                <div class="bg_blue8"> </div>
                <div class="float_t"><img src="<?php echo base_url('images/blue_r_feight3.png');?>" alt="" /></div>
              </div>
            </div>
            <div class="icon_div">
              
              <samp>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/travelservices.jpg');?>" alt="" width="43" height="74" class="icon_img"/></div>
                  Travel <br />

Services 45€<br />
                  <input type="checkbox" name="checkbox" id="checkbox" />
                  <input type="checkbox" name="checkbox" id="checkbox" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/s_l.png');?>" alt="" width="78" height="74" class="icon_img"/></div>
                  Bankruptcy <br />
                  Insurance 45&euro;<br />
                  <input type="checkbox" name="checkbox2" id="checkbox2" />
                  <input type="checkbox" name="checkbox2" id="checkbox2" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/extra_bag.jpg');?>" alt="" width="43" height="74" class="icon_img"/></div>
                  Extra<br />
                  Baggage 35&euro;<br />
                  <input type="checkbox" name="checkbox3" id="checkbox3" />
                  <input type="checkbox" name="checkbox3" id="checkbox3" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/sms_plan.jpg');?>" alt="" class="icon_img"/></div>
                  SMS Travel <br />
                  Plans 12€<br />
                  <input type="checkbox" name="checkbox4" id="checkbox4" />
                  <input type="checkbox" name="checkbox4" id="checkbox4" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/umalla.jpg');?>" alt="" width="60" height="78" class="icon_img"/></div>
                  Travel <br />
                  Insurance 80&euro;<br />
                  <input type="checkbox" name="checkbox5" id="checkbox5" />
                  <input type="checkbox" name="checkbox5" id="checkbox5" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/gloabe.jpg');?>" alt="" width="55" height="77" class="icon_img"/></div>
                  Travel Agent <br />
                  Services<br />
                  <input type="checkbox" name="checkbox6" id="checkbox6" />
                  <input type="checkbox" name="checkbox6" id="checkbox6" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/ballom.jpg');?>" alt="" width="53" height="77" class="icon_img"/></div>
                  Unaccompanied<br />
                  child 20€<br />
                  <input type="checkbox" name="checkbox7" id="checkbox7" />
                  <input type="checkbox" name="checkbox7" id="checkbox7" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/pet.jpg');?>" alt="" width="64" height="82" class="icon_img"/></div>
                  Pet<br />
                  Travel<br />
                  <input type="checkbox" name="checkbox8" id="checkbox8" />
                  <input type="checkbox" name="checkbox8" id="checkbox8" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/ghab.jpg');?>" alt="" width="60" height="85" class="icon_img"/></div>
                  Cancellations<br />
                  Insurances 45€<br />
                  <input type="checkbox" name="checkbox9" id="checkbox9" />
                  <input type="checkbox" name="checkbox9" id="checkbox9" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/ring.jpg');?>" alt="" width="52" height="82" class="icon_img"/></div>
                  Personal<br />
                  Services <br />
                  <input type="checkbox" name="checkbox10" id="checkbox10" />
                  <input type="checkbox" name="checkbox10" id="checkbox10" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/hand_cap.jpg');?>" alt="" width="61" height="79" class="icon_img"/></div>
                  Handicap<br />
                  Assistance<br />
                  <input type="checkbox" name="checkbox11" id="checkbox11" />
                  <input type="checkbox" name="checkbox11" id="checkbox11" />
                </div>
                <div class="content">
                  <div class="img_div"><img src="<?php echo base_url('images/chair.jpg');?>" alt="" width="57" height="88" class="icon_img"/></div>
                  Choose<br />
                  Seats<br />
                  <input type="checkbox" name="checkbox12" id="checkbox12" />
                  <input type="checkbox" name="checkbox12" id="checkbox12" />
                </div>
                </samp>
              
            </div>
            <p class="clear"></p>
          </div>-->
        </div>
     
          <div class="white_bg_feight3"><div class="left_feight">
      
              <h4>Choose your payment</h4>
              <div class="div_1">
                <h2><strong>Klarna</strong></h2>
                <strong>Klarna Gateway</strong>
                <p>Choose to pay with Adipiscing elit, sed diamnonu lommynibh euismod tincidunt utdin Internetbank utan laor.</p>
                <p> For cuestions call <br />
                  08-120 120 00<br />
                  Read abut there rules <a href="#">here.</a></p>
                <div class="check_div_feight3">
    <input type="radio" name="paymentType" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/karna.jpg');?>" alt="" width="87" height="32" /></label>
                </div>
                <div class="check_div_feight3">
           <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/karna.jpg');?>" alt="" width="87" height="32" /></label>
                  <img src="<?php echo base_url('images/sek.jpg');?>" alt="" width="56" height="32" /></div>
              </div>
              <div class="div_1">
                <h2><strong>Internetbank 10€</strong></h2>
                <strong>Internetbank</strong>
                <p>Du kan enkelt betala din resa direkt via din Internetbank utan extra kostnad. Vid betalningen skickas du automatiskt till din Internetbank där du loggar in. Pengarna dras sedan direkt från ditt bankkonto i samband med att du godkänner transaktionen. </p>
                <p>Observera att alla betalningsalternativ gör din bokning bindande.<br />
                  Detta innebär att din biljett utfärdas omgående och sedan gäller flygbolagets regler för om/avbokning.</p>
                <div class="check_div_feight3">
               <span class="jqTransformRadioWrapper1"><input type="radio" name="paymentType" id="6" value="2" class="styled" /></span>
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/hande.jpg');?>" alt="" width="99" height="23" /></label>
                </div>
                <div class="check_div_feight3">
                  <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/nodea.jpg');?>" alt="" width="84" height="23" /></label>
                </div>
                <div class="check_div_feight3">
                  <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/swed.jpg');?>" alt="" width="85" height="23" /></label>
                </div>
                <div class="check_div_feight3">
                <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/seb_f.jpg');?>" alt="" width="67" height="18"  style="margin-top:3px;" /></label>
                </div>
                <div class="check_div_feight3">
                <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/seb_p.jpg');?>" alt="" width="67" height="18" style="margin-top:3px;" /></label>
                </div>
              </div>
              <div class="div_1">
                <h2><strong>Credit/Debit card 0€</strong></h2>
                <strong>Kortbetalning</strong>
                <p>Du kan enkelt betala din resa direkt online med ditt betal/kreditkort. Samtliga kortbetalningar sker säkert via DIBS, som har samma säkerhetskrav som bankerna och är certifierade av både svenska och utländska banker och kortföretag. </p>
                <p>Observera att alla betalningsalternativ gör din bokning bindande.<br />
                  Detta innebär att din biljett utfärdas omgående och sedan gäller flygbolagets regler för om/avbokning</p>
                <div class="check_div_feight3">
                 <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/visa.jpg');?>" alt="" width="42" height="28" /></label>
                </div>
                <div class="check_div_feight3">
                <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/master.jpg');?>" alt="" width="42" height="26" /></label>
                </div>
                <div class="check_div_feight3">
                 <input type="radio" name="paymentType" id="6" value="2" class="styled" />
                  <label for="colorBlue" class="opt_feight3" ><img src="<?php echo base_url('images/credit.jpg');?>" alt="" width="42" height="26" /></label>
                </div>
              </div>

   </div>         <div class="feight3_gray_bg">
            <samp>
              <div class="box">
                <h5>Price details for your booking:</h5>
                <div class="img"><img src="<?php echo base_url('images/top_box_flight.png');?>" alt="" width="231" height="15" /></div>
                <div class="bg">
                  <ul>
                    <li>* Ticket price 2450€</li>
                    <li>* Trip cancellation insurance 20€</li>
                    <li>* SMS travel plan 2€</li>
                    <li>* Taxes and fees included</li>
                  </ul>
                </div>
                <div class="img"><img src="<?php echo base_url('images/b_box_flight.png');?>" alt="" width="231" height="15" /></div>
              </div>
              <div class="rs_div">Total: <span>2462 €</span>
                <p>Tax included</p>
              </div>
              <div class="payment_div">
                <div class="input_div">
                <input type="radio" name="color"  value="Blue" />
                </div>
                <div class="block_div">I have read and I accept the General Conditions and the Data Protection Policy and I accept that my bank card will be charged for the total amount of 2462 € for this purchase.</div>
                <p class="clear"></p>
              </div>
              </samp>
			  
			  <div class="purchase_div" ><!--$("#progressBar").show();-->
			  <a href='javascript:void(0)' onclick="javascript:"><img src="<?php echo base_url('images/purchage.png');?>" alt=""  id="bookaflightsubmit"/> </a>
			 
			 
			
			 
			  </div>
              
			    </div>
            <p class="clear"></p>
          </div>
    
      </div>
      <p class="clear"></p>
    </div>
  <!--End of Traveller Details-->
   <div class="cont"> 
   </div>
</form>


<script type="text/javascript">
	$("#bookaflightsubmit").click(function() {
		bookaflight.submit();
	});
</script>