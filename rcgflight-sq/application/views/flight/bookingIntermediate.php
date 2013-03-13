<?php
if($this->responseArray['response'] == 'sucess'){

$orderId = isset($this->responseArray['data']['OrderId']) ? $this->responseArray['data']['OrderId'] : '';
$pnr = isset($this->responseArray['data']['Pnr']) ? $this->responseArray['data']['Pnr'] : '';


?>
<form name="bookAFlight" method="post" action="<?php echo base_url('flyg/bookingconfirmation');?>">
<?php

$hiddenElements = createHiddenElementFromArray($this->postData);
echo $hiddenElements;

$segments = $this->responseArray['data']['Segments']['Segment'];
$buyerInformation = isset($this->responseArray['data']['BuyerInformation']) ? $this->responseArray['data']['BuyerInformation'] : ''; 
$travellerInformation = isset($this->responseArray['data']['Travellers'])? $this->responseArray['data']['Travellers'] : ''; 
$paymentTypes =isset($this->responseArray['data']['PaymentTypes']) ? $this->responseArray['data']['PaymentTypes'] : ''; 
$adtBaseFare = $_POST['adtBaseFare'];
$adtTaxFare = $_POST['adtTaxFare'];
$adtTotalFare = $_POST['adtTotalFare'];


$chdBaseFare = isset($_POST['chdBaseFare']) ? $_POST['chdBaseFare'] : '0';
$chdTaxFare = isset($_POST['chdTaxFare']) ? $_POST['chdTaxFare'] : '0';
$chdTotalFare = isset($_POST['chdTotalFare']) ? $_POST['chdTotalFare'] : '0';

$infBaseFare = isset($_POST['infBaseFare']) ? $_POST['infBaseFare'] : '0';
$infTaxFare = isset($_POST['infTaxFare']) ? $_POST['infTaxFare'] : '0';
$infTotalFare = isset($_POST['infTotalFare']) ? $_POST['infTotalFare'] : '0';


$totalAmount = $adtBaseFare + $adtTaxFare + $adtTotalFare + $chdBaseFare +  $chdTaxFare + $chdTotalFare + $infBaseFare +  $infTaxFare + $infTotalFare;

extract($this->postData);
?>


<input type="hidden" name="totalAmount" value="<?php echo $totalAmount?>">
<input type="hidden" name="orderId" value="<?php echo $orderId?>">	
<input type="hidden" name="pnr" value="<?php echo $pnr?>">

</form>				
<?php } ?>		


<!--<div class="white_bg_main">
      <div class="main_div_thanx">
        <div class="white_t_div1">
          <div class="bookintermidite_bg">
            <div class="flight-name">Flight Name</div>
            <div class="form-place">From Place</div>
            <div class="to-place">To Place</div>
            <div class="dep-date">Dep Date</div>
            <div class="arr-date">Arr Date</div>
            <div class="operatedby">OperatedBy</div>
            <div class="duration">Duration</div>
          </div>
          <div class="bookintermidite">
            <div class="row">
 <div class="flight-nametext">Iberia Airlines IB4779</div>
            <div class="form-placetext">Stockholm - Arlanda - ARN</div>
            <div class="to-placetext">London - Heathrow - LHR</div>
            <div class="dep-datetext">13APR 07:35</div>
            <div class="arr-datetext">13APR 09:15</div>
            <div class="operatedbytext">IB 4779 BRITISH AIRWAYS</div>
            <div class="durationtext">2hr 40min</div>
            </div>
            
                    <div class="row">
 <div class="flight-nametext">Iberia Airlines IB4779</div>
            <div class="form-placetext">Stockholm - Arlanda - ARN</div>
            <div class="to-placetext">London - Heathrow - LHR</div>
            <div class="dep-datetext">13APR 07:35</div>
            <div class="arr-datetext">13APR 09:15</div>
            <div class="operatedbytext">IB 4779 BRITISH AIRWAYS</div>
            <div class="durationtext">2hr 40min</div>
            </div>
            
                        <div class="row">
 <div class="flight-nametext">Iberia Airlines IB4779</div>
            <div class="form-placetext">Stockholm - Arlanda - ARN</div>
            <div class="to-placetext">London - Heathrow - LHR</div>
            <div class="dep-datetext">13APR 07:35</div>
            <div class="arr-datetext">13APR 09:15</div>
            <div class="operatedbytext">IB 4779 BRITISH AIRWAYS</div>
            <div class="durationtext">2hr 40min</div>
            </div>
            
                        <div class="row">
 <div class="flight-nametext">Iberia Airlines IB4779</div>
            <div class="form-placetext">Stockholm - Arlanda - ARN</div>
            <div class="to-placetext">London - Heathrow - LHR</div>
            <div class="dep-datetext">13APR 07:35</div>
            <div class="arr-datetext">13APR 09:15</div>
            <div class="operatedbytext">IB 4779 BRITISH AIRWAYS</div>
            <div class="durationtext">2hr 40min</div>
            </div>
                
            
            <p class="clear"></p>
          </div>
          
      </div>
          <div class="blue-bg-bookintermindite"><div class="order">Order Id : 15892</div><div class="order">PNR: MJ6LG2</div></div    >
          
     <div class="buyerinformation-title">Buyer Information</div>
        <div class="white_t_div1">
          <div class="bookintermidite_bg">
            <div class="first-name">First Name</div>
            <div class="last-name">Last Name</div>
            <div class="address1">Address1</div>
            <div class="address2">Address2</div>
            <div class="city">City</div>
            <div class="postal-add">Postal Add</div>
               <div class="country">Country</div>
            <div class="tele">Telephone</div>
            <div class="tele">Mobile</div>
          </div>
          <div class="bookintermidite">
            <div class="row">
  <div class="first-nametext">First Name</div>
            <div class="last-nametext">Last Name</div>
            <div class="address1text">Address1</div>
            <div class="address2text">Address2</div>
            <div class="citytext">City</div>
            <div class="postal-addtext">Postal Add</div>
               <div class="countrytext">Country</div>
            <div class="teletext">Telephone</div>
            <div class="teletext">Mobile</div>
            </div>
            
       <div class="row">
  <div class="first-nametext">First Name</div>
            <div class="last-nametext">Last Name</div>
            <div class="address1text">Address1</div>
            <div class="address2text">Address2</div>
            <div class="citytext">City</div>
            <div class="postal-addtext">Postal Add</div>
               <div class="countrytext">Country</div>
            <div class="teletext">Telephone</div>
            <div class="teletext">Mobile</div>
            </div>
            
   <div class="row">
  <div class="first-nametext">First Name</div>
            <div class="last-nametext">Last Name</div>
            <div class="address1text">Address1</div>
            <div class="address2text">Address2</div>
            <div class="citytext">City</div>
            <div class="postal-addtext">Postal Add</div>
               <div class="countrytext">Country</div>
            <div class="teletext">Telephone</div>
            <div class="teletext">Mobile</div>
            </div>
            
                 <div class="row">
  <div class="first-nametext">First Name</div>
            <div class="last-nametext">Last Name</div>
            <div class="address1text">Address1</div>
            <div class="address2text">Address2</div>
            <div class="citytext">City</div>
            <div class="postal-addtext">Postal Add</div>
               <div class="countrytext">Country</div>
            <div class="teletext">Telephone</div>
            <div class="teletext">Mobile</div>
            </div>
                
            
            <p class="clear"></p>
          </div>
             <div class="travell-title">Buyer Information</div>
     <div class="white_t_div1">
          <div class="bookintermidite_bg">
            <div class="dep-date" >Type</div>
            <div class="form-place">First Name</div>
            <div class="to-place">Last Name</div>
            <div class="dep-date">Title</div>
            <div class="addtional">AdditionalPackages</div>
            <div class="dep-date">Fare</div>
            <div class="dep-date">Tax</div>
          </div>
          <div class="bookintermidite">
            <div class="row">
 <div  class="dep-datetext">ADT</div>
            <div class="form-placetext">sushil</div>
            <div class="to-placetext">Puri</div>
            <div class="dep-datetext">3</div>
            <div class="addtional-text">Description   AvbestÃ¤llningsskydd<br />
              amount   285</div>
            <div class="dep-datetext">21569</div>
            <div class="durationtext">598563</div>
            </div>
            
               <div class="row">
 <div  class="dep-datetext">ADT</div>
            <div class="form-placetext">sushil</div>
            <div class="to-placetext">Puri</div>
            <div class="dep-datetext">3</div>
            <div class="addtional-text">Description   AvbestÃ¤llningsskydd<br />
              amount   285</div>
            <div class="dep-datetext">21569</div>
            <div class="durationtext">598563</div>
            </div>
            
                 <div class="row">
 <div  class="dep-datetext">ADT</div>
            <div class="form-placetext">sushil</div>
            <div class="to-placetext">Puri</div>
            <div class="dep-datetext">3</div>
            <div class="addtional-text">Description   AvbestÃ¤llningsskydd<br />
              amount   285</div>
            <div class="dep-datetext">21569</div>
            <div class="durationtext">598563</div>
            </div>
            
            <div class="row">
 <div  class="dep-datetext">ADT</div>
            <div class="form-placetext">sushil</div>
            <div class="to-placetext">Puri</div>
            <div class="dep-datetext">3</div>
            <div class="addtional-text">Description   AvbestÃ¤llningsskydd<br />
              amount   285</div>
            <div class="dep-datetext">21569</div>
            <div class="durationtext">598563</div>
            </div>
            
            <p class="clear"></p>
          </div>
          
      </div> 
      
      <div class="travell-title">Buyer Information</div>
      <div class="white_t_div1">
          <div class="bookintermidite_bg">
            <div class="payment"> Select Payment</div>
            <div class="payment">Payment Name</div>
            <div class="payment">Payment Method</div>
            <div  class="payment">Payment Fee</div>
            <div class="dep-date">Fee Desc</div>
            <div class="dep-date">Fee Desc</div>
            <div class="payment1">Dibs Method</div>
            <div class="payment">Dibs Pageset</div>
          </div>
          <div class="bookintermidite">
            <div class="row">
 <div class="payment-text"><input name="" type="radio" value="" /></div>
            <div class="payment-text">Payment Name</div>
            <div class="payment-text">Payment Method</div>
            <div  class="payment-text">Payment Fee</div>
            <div class="dep-datetext">Fee Desc</div>
            <div class="dep-datetext">Fee Desc</div>
            <div class="payment1-text">Dibs Method</div>
            <div class="payment-text">Dibs Pageset</div>
            </div>
              <div class="row">
 <div class="payment-text"><input name="" type="radio" value="" /></div>
            <div class="payment-text">Payment Name</div>
            <div class="payment-text">Payment Method</div>
            <div  class="payment-text">Payment Fee</div>
            <div class="dep-datetext">Fee Desc</div>
            <div class="dep-datetext">Fee Desc</div>
            <div class="payment1-text">Dibs Method</div>
            <div class="payment-text">Dibs Pageset</div>
            </div>
            
            <div class="row">
 <div class="payment-text"><input name="" type="radio" value="" /></div>
            <div class="payment-text">Payment Name</div>
            <div class="payment-text">Payment Method</div>
            <div  class="payment-text">Payment Fee</div>
            <div class="dep-datetext">Fee Desc</div>
            <div class="dep-datetext">Fee Desc</div>
            <div class="payment1-text">Dibs Method</div>
            <div class="payment-text">Dibs Pageset</div>
            </div>
            
            <p class="clear"></p>
          </div>
          
      </div>
      
      
      
      
      
      
      
      </div>
      </div>
      <p class="clear"></p>
    </div>-->
	
	
<script type="text/javascript">
bookAFlight.submit();
</script>

	