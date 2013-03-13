<script type="text/javascript">
$('#numChilds').getSetSSValue('0');
$(document).ready(function() {
   showChildAge('child');
});

function showChildAge(type){
	var value = $("#numChilds").val();
	var numberOfAdults = $("#numAdults").val();
	var totalTravellers = parseInt(value) + parseInt(numberOfAdults);
	if(totalTravellers <= 9)
	{
		if(type == 'child')
		{
			for(i=0;i<9;i++){
			$("#childAge"+i).hide()
			$("#chidAgeContainer"+i).hide();
			}
			for(i=0; i < value; i++){
					$("#childAge"+i).show();
					$("#chidAgeContainer"+i).show();
					$("#childAge"+i).css({visibility: "visible"});
			}
		}
		
	}
	else
	{
		$("#numAdults").val('1');
		$("#numChilds").val('0');
		for(i=0;i<9;i++){
			$("#childAge"+i).hide()
			$("#chidAgeContainer"+i).hide();
			}
		alert( "You can select maximum 9 Travellers");
		return false;
	}
}
</script>
<?php
$depCity = isset($this->postData['depCity']) ? $this->postData['depCity'] : 'Sweden - Stockholm (STO)';
$destCity = isset($this->postData['destCity']) ? $this->postData['destCity'] : 'United Kingdom - London (LON)';
$depCity1 = isset($this->postData['depCity1']) ? $this->postData['depCity1'] : '';
$destCity1 = isset($this->postData['destCity1']) ? $this->postData['destCity1'] : '';

$depCity2 = isset($this->postData['depCity2']) ? $this->postData['depCity2'] : '';
$destCity2 = isset($this->postData['destCity2']) ? $this->postData['destCity2'] : '';

$depCity3 = isset($this->postData['depCity3']) ? $this->postData['depCity3'] : '';
$destCity3 = isset($this->postData['destCity3']) ? $this->postData['destCity3'] : $depCity;


$date = isset($this->postData['date']) ? $this->postData['date'] : '';
$date1 = isset($this->postData['date1']) ? $this->postData['date1'] : '';
$numAdults = isset($this->postData['numAdults']) ? $this->postData['numAdults'] : '';
$numChilds = isset($this->postData['numChilds']) ? $this->postData['numChilds'] : '';
$tripType = isset($this->postData['tripType']) ? $this->postData['tripType'] : 'R';
$flexibleSearch = isset($this->postData['flexibleSearch']) ? $this->postData['flexibleSearch'] : '';
$directFlight = isset($this->postData['directFlight']) ? $this->postData['directFlight'] : '';

$radioButtonId = isset($this->postData['radioButtonId']) ? $this->postData['radioButtonId'] : 'returnTrip';

$flightName = isset($this->postData['flightName']) ? $this->postData['flightName'] : '';
$multistop = '';



?>


 <form action="<?php echo base_url('flyg/searching');?>"  method="post" autocomplete="off" id="flightSearch" name="flightSearch">
<div class="form_div">
<div class="error_container">
  <div id="error_img_show"></div>
  <p class="error_msg_container">&nbsp;</p>
</div>
        <!-- Multi Stop Start Here-->
<div class="left_inner_div" id="multi_stop" style="margin-top:15px; display:<?php echo ($radioButtonId == 'multistop') ? 'display' : 'none';?>">
        <div class="blue_box" id="blue_box_2">
          <div class="blue_heading">Trip 1</div>
          <div class="blue_t"><img src="<?php echo base_url('images/blue_t_box.png');?>" alt="" height="14" /> </div>
          <div class="blue_bg">
            <div class="flight_div2">
              <h5>Form</h5>
              <div class="input">
                <input name="depCity" id="depCity2" placeholder="<?php echo $depCity;?>" data-provide="typeahead" value="<?php echo $depCity;?>" />
              </div>
              
            </div>
            <div class="flight_div2">
              <h5>To</h5>
              <div class="input">
                <input type="text" name="destCity" id="destCity2" placeholder="<?php echo $destCity;?>" data-provide="typeahead" value="<?php echo $destCity;?>" />
              </div>
           
			  <div class="input-calender">
			    <input type="text" name="date" class="trip_datepicker_2" id="date2"  />
			  </div>
			  
            </div>
            <div class="clear_b"></div>
          </div>
          <div><img src="<?php echo base_url('images/blue_b_box.png');?>" alt="" width="636" height="12" /></div>
        </div>
        <div class="blue_box" id="blue_box_3">
          <div class="blue_heading">Trip 2</div>
          <div class="blue_t"><img src="<?php echo base_url('images/blue_t_box.png');?>" alt="" /> </div>
          <div class="blue_bg">
            <div class="flight_div2">
              <h5>Form</h5>
              <div class="input">
                <input name="depCity1" id="depCity3" placeholder="" data-provide="typeahead" value="" />
              </div>
              <div class="add_main_trip" id="add_main_trip_3">
                <div class="add_trip" id="add_trip_3" onclick="addNew(3)">Add Trip</div>
                
              </div>
            </div>
            <div class="flight_div2">
              <h5>To</h5>
              <div class="input">
                <input type="text" name="destCity1" id="destCity3" placeholder="" data-provide="typeahead" value="" />
              </div>
           
              <div class="input-calender">
			    <input type="text" name="date1" class="trip_datepicker_3"  id="date3" />
			  </div>
            </div>
            <div class="clear_b"></div>
          </div>
          <div><img src="<?php echo base_url('images/blue_b_box.png');?>" alt="" width="636" height="12" /></div>
        </div>
		
	<!--	block 3 -->
		<div class="blue_box" id="blue_box_4" style="display:none">
          <div class="blue_heading">Trip 3</div>
          <div class="blue_t"><img src="<?php echo base_url('images/blue_t_box.png');?>" alt="" /> </div>
          <div class="blue_bg">
            <div class="flight_div2">
              <h5>Form</h5>
              <div class="input">
                <input name="depCity2" id="depCity4" placeholder="" data-provide="typeahead" value="" />
              </div>
              <div class="add_main_trip" id="add_main_trip_4">
                <div class="add_trip" id="add_trip_4" onclick="addNew(4)">Add Trip</div>
                <div class="delet_trip" id="delet_trip_4" onclick="removeOne(4)">Remove Trip</div>
              </div>
            </div>
            <div class="flight_div2">
              <h5>To</h5>
              <div class="input">
                <input type="text" name="destCity2" id="destCity4" placeholder="" data-provide="typeahead" value="" />
              </div>
           
              <div class="input-calender">
			    <input type="text" name="date2" class="trip_datepicker_4"  id="date4" />
			  </div>
            </div>
            <div class="clear_b"></div>
          </div>
          <div><img src="<?php echo base_url('images/blue_b_box.png');?>" alt="" width="636" height="12" /></div>
        </div>
	<!--	end of block 3-->
		
		<!--block 4-->
		<div class="blue_box" id="blue_box_5" style="display:none">
          <div class="blue_heading">Trip 4</div>
          <div class="blue_t"><img src="<?php echo base_url('images/blue_t_box.png');?>" alt="" /> </div>
          <div class="blue_bg">
            <div class="flight_div2">
              <h5>Form</h5>
              <div class="input">
                <input name="depCity3" id="depCity5" placeholder="" data-provide="typeahead" value="" />
              </div>
              <div class="add_main_trip" id="add_main_trip_5">
          
                <div class="delet_trip" id="delet_trip_5" onclick="removeOne(5)">Remove Trip</div>
              </div>
            </div>
            <div class="flight_div2">
              <h5>To</h5>
              <div class="input">
                <input type="text" name="destCity3" id="destCity5" placeholder="" data-provide="typeahead" value="" />
              </div>
           
              <div class="input-calender">
			    <input type="text" name="date3" class="trip_datepicker_5"  id="date5" />
			  </div>
            </div>
            <div class="clear_b"></div>
          </div>
          <div><img src="<?php echo base_url('images/blue_b_box.png');?>" alt="" width="636" height="12" /></div>
        </div>
		<!--end of block 4-->
		
      </div>
<!-- End of Multi Stop Here-->
		
		
		<!--<input type="text" name="email" disabled>-->
        <div id="no_multi_stop" style="display:<?php echo ($radioButtonId != 'multistop') ? 'display' : 'none';?>">	
		<div class="fight_div1">
          <h5>Form</h5>
          <div class="input"> 
        <input type="text" name="depCity" id="depCity" placeholder="<?php echo $depCity;?>" data-provide="typeahead" value="<?php echo $depCity;?>" onblur="setOtherValue();" /></div>
          <div id="destCity1Container" style="display:<?php echo ($radioButtonId != 'oneWay' || $radioButtonId != 'return') ? 'display' : 'none';?>">
		  <h4>Form</h4>
          <div class="input" > 
		  <input type="text" name="depCity1" id="depCity1" onblur="chkFlexible()" />
          </div>
		  </div>
		  
          <h5>Departure</h5>
		  <input class="uneditable-input" type="text" value="<?php echo $date;?>" id="date" name="date" > 
          <div id="datepickerfrom"></div>
        </div>
        <div class="fight_div1">
          <h5>Destination</h5>
          <div class="input" >
            <input type="text" name="destCity" id="destCity" placeholder="<?php echo $destCity;?>" data-provide="typeahead" value="<?php echo $destCity;?>" onblur="setOtherValue();"/>
          </div>
		  <div id="depCity1Container" style="display:<?php echo ($radioButtonId != 'oneWay' || $radioButtonId != 'return') ? 'display' : 'none';?>">
          <h4>To</h4>
          <div class="input" >
            <input type="text" name="destCity1" id="destCity1" placeholder="" data-provide="typeahead" value=""  readonly="readonly"/>
          </div>
		  </div>
		  <div id="returnDateContainer" style="display:<?php echo ($radioButtonId != 'oneWay') ? 'display' : 'none';?>">
          <h5>Hemresedatum</h5>
		  	<input class="uneditable-input" type="text" value="<?php echo $date1;?>" id="date1" name="date1">
		  <div id="datepickerto"> </div>
		  </div>
        </div>
		</div>
		
      </div>
      <div class="search_div_flight1">
	  
      
            
			<div class="monthdb" style="">
          <h3>Adults</h3>
          <select class="Items" name="numAdults" id="numAdults" style="width:52px; " onchange="javascript:showChildAge('adult');">
            <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
			  <option value="9">9</option>
            </select>
        </div>
			
			<div class="monthdb" style="">
     <h3>Children</h3>
          <select class="Items" name="numChilds" id="numChilds"   style="width:52px;" onchange="javascript:showChildAge('child');">
          <option value="0" selected="selected">0</option>
            <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
			  <option value="9">9</option>
            </select>
			
			</div>

        <div class="clear_form">
		
		 <div class="niceCheckbox" style="margin-left: -20px;">
		
		
		<?php
		$str = '';
		$k =  1;
		for($i=0; $i < 9; $i++)
		{
			
			$str .= '<div  class="monthdb" style="margin-top:0px; margin-bottom:10px;" id="chidAgeContainer'.$i.'" style="display:">
					<label>Barn</label>
					<select class="span1 childAge" name="childAge['.$i.']" id="childAge'.$i.'">
					  <option value="0">0</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="8">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					  <option value="11">11</option>
					  <option value="12">12</option>
					</select>
           			</div>';
				
			if($k%3 == 0)
					$str .= '</div><div class="row">';	
			$k++;	
		}
		echo $str."</div>";
		
		?>
     <samp>   
	        <div class="check_div">
			 <input type="radio" value="O" id="oneWay" name="tripType"  onclick="showHideCalender(this);" <?php echo ($radioButtonId == 'oneWay') ? 'checked' : '';?>>
             <div for="colorBlue" class="opt-redio" >Enkelresa</div>
            </div>
           <div class="check_div">
              <input type="radio" value="R" id="returnTrip" name="tripType" onclick="showHideCalender(this);" <?php echo ($radioButtonId == 'returnTrip') ? 'checked' : '';?>>
              <div for="colorBlue" class="opt-redio" >Return Trip</div>
            </div>
			
			<div class="check_div">
              <input type="radio" value="M" id="chkRetAnotLoc" name="tripType" onclick="showHideCalender(this);" <?php echo ($radioButtonId == 'chkRetAnotLoc') ? 'checked' : '';?>>
              <div for="colorBlue" class="opt-redio" >Hemresa från annan ort</div>
            </div>
			
            <div class="check_div">
               <input type="radio" value="M" id="multistop" name="tripType" onclick="showHideCalender(this);" <?php echo ($radioButtonId == 'multistop') ? 'checked' : '';?>> 
              <div for="colorBlue" class="opt-redio" >Multi-stop</div>
            </div>
            
		  
		   <div style="padding-top:15px; padding-left:8px">	
			<div class="check_div" id="flexSearchContainer">
               <input type="checkbox" value="1" id="flexibleSearch"  name="flexibleSearch"  <?php echo ($flexibleSearch == 1) ? 'checked' : '';?>>
              <div for="colorBlue" class="opt" >Sök flexibelt</div>
            </div>
            <div class="check_div">
               <input type="checkbox" value="2" id="directFlight" name="directFlight" <?php echo ($directFlight == 1) ? 'checked' : '';?>>
              <div for="colorBlue" class="opt" >Direktflyg</div>
            </div>
          </div>
		 
          <div class="height_4"><a href="javascript:void(0)"  onclick="return validateFlightSearch()"><img src="<?php echo base_url('images/search_best.png');?>" alt="" /></a>
		 <!-- <button type="button" class="submit" data-dismiss="modal" ><img src="<?php echo base_url('images/search_best.png');?>" alt="" id="submit" name="submit" /></button>-->
		  </div>
		 	</samp> </div>
	</div>
	<div class="height_30"></div>
	 <input type="hidden" name="radioButtonId" id="radioButtonId" value="<?php echo $radioButtonId;?>" />
</form>	  
	  
<script type="text/javascript">
			
$(function() {
		$( "#datepickerfrom" ).datepicker({
			defaultDate: "+1w",
			selectedDate: '',
			altField: "#date",
			altFormat: "DD, d MM, yy",
			showWeek: true,
			firstDay: 1,
			dayNames: ["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"],
			dayNamesMin: ["Sö","Må","Ti","On","To","Fr","Lö"],
			monthNames: ["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],
			weekHeader: "",
			onSelect: function( selectedDate ) {
				$( "#datepickerto" ).datepicker( "option", "minDate", selectedDate );
				
			}	
		});
		
		
		
		$( "#datepickerto" ).datepicker({
			defaultDate: "+2w",
			altField: "#date1",
			altFormat: "DD, d MM, yy",
			showWeek: true,
			firstDay: 1,
			dayNames: ["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"],
			dayNamesMin: ["Sö","Må","Ti","On","To","Fr","Lö"],
			monthNames: ["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],
			weekHeader: "",
			onSelect: function( selectedDate ) {
				$( "#datepickerfrom" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		
		
	if($("#tripType").val() == 'O')
	  $("#returnDateContainer").hide();
	});
	
	
<?php
$date = "Sndag, 30 December, 2012";
$date2 = "Sndag, 30 December, 2012";
?>				

$('#datepicker').datepicker('setStartDate', null);

<?php

if($tripType != 'M')
{
?>
$("#depCity1").attr("disabled", "disabled");
$("#destCity1").attr("disabled", "disabled");
$("#depCity1Container").hide();
$("#destCity1Container").hide();

<?php
}
?>
</script>