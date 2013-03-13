<script type="text/javascript">
$('#numChilds').getSetSSValue('0');
function showHideCalender(obj){
	var checkedId = obj.id;
	
	if(checkedId == 'oneWay'){
	 if($("#"+checkedId).is(':checked')){
	 alert("test");
			$("#returnDateContainer").hide();
			$("#depCity1Container").hide();
			$("#destCity1Container").hide();
			$("#tripType").val('O');
		}else{
				$("#returnDateContainer").show();
				$("#depCity1Container").show();
			$("#destCity1Container").show();
			$("#tripType").val('R');
		}
	}
}
function showChildAge(){
	var value = $("#numChilds").val();
	for(i=0;i<9;i++){
		$("#childAge"+i).hide()
		$("#chidAgeContainer"+i).hide();
		
	}
	for(i=0; i < value; i++){
			$("#childAge"+i).show();
			$("#chidAgeContainer"+i).show();
			$("#childAge"+i).css({visibility: "visible"});
			$("#childAge"+i).sSelect({ddMaxHeight: '100'});
	}
}


function showProgressBar()
{
	
}

</script>


<?php

$depCity = isset($this->postData['depCity']) ? $this->postData['depCity'] : 'Stockholm';
$destCity = isset($this->postData['destCity']) ? $this->postData['destCity'] : 'London';

$depCity1 = isset($this->postData['depCity1']) ? $this->postData['depCity1'] : '';
$destCity1 = isset($this->postData['destCity1']) ? $this->postData['destCity1'] : $depCity;

$date = isset($this->postData['date']) ? $this->postData['date'] : '';
$date2 = isset($this->postData['date2']) ? $this->postData['date2'] : '';
$numAdults = isset($this->postData['numAdults']) ? $this->postData['numAdults'] : '';
$numChilds = isset($this->postData['numChilds']) ? $this->postData['numChilds'] : '';
$tripType = isset($this->postData['tripType']) ? $this->postData['tripType'] : 'R';
$flexibleSearch = isset($this->postData['flexibleSearch']) ? $this->postData['flexibleSearch'] : '';
$directFlight = isset($this->postData['directFlight']) ? $this->postData['directFlight'] : '';
$chkRetAnotLoc = isset($this->postData['chkRetAnotLoc']) ? $this->postData['chkRetAnotLoc'] : '';
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
<div class="left_inner_div" id="multi_stop" style="margin-top:15px; display:none">
        <div class="blue_box" id="blue_box_1">
          <div class="blue_heading">Trip 1</div>
          <div class="blue_t"><img src="images/blue_t_box.png" alt="" height="14" /> </div>
          <div class="blue_bg">
            <div class="fight_div2">
              <h5>Form</h5>
              <div class="input">
                <input name="input" type="text" />
              </div>
              
            </div>
            <div class="fight_div2">
              <h5>To</h5>
              <div class="input">
                <input name="input2" type="text" />
              </div>
              <h4>&nbsp;</h4>
            </div>
            <div class="clear"></div>
          </div>
          <div><img src="images/blue_b_box.png" alt="" width="636" height="14" /></div>
        </div>
        <div class="blue_box" id="blue_box_2">
          <div class="blue_heading">Trip 2</div>
          <div class="blue_t"><img src="images/blue_t_box.png" alt="" /> </div>
          <div class="blue_bg">
            <div class="fight_div2">
              <h5>Form</h5>
              <div class="input">
                <input name="input" type="text" />
              </div>
              <div class="add_main_trip" id="add_main_trip_2">
                <div class="add_trip" id="add_trip_2" onclick="addNew(2)">Add Trip</div>
                
              </div>
            </div>
            <div class="fight_div2">
              <h5>To</h5>
              <div class="input">
                <input name="input2" type="text" />
              </div>
              <h4>&nbsp;</h4>
              <div class="input-calender">
			    <input name="input3" class="birthday_datepicker" type="text" />
			  </div>
            </div>
            <div class="clear"></div>
          </div>
          <div><img src="images/blue_b_box.png" alt="" width="636" height="14" /></div>
        </div>
      </div>
<!-- End of Multi Stop Here-->
		
		
		<!--<input type="text" name="email" disabled>-->
        <div id="no_multi_stop">	
		<div class="fight_div1">
          <h5>Form</h5>
          <div class="input"> 
        <input type="text" name="depCity" id="depCity" placeholder="<?php echo $depCity;?>" data-provide="typeahead" value="<?php echo $depCity;?>" /></div>
          <div id="destCity1Container">
		  <h4>Form</h4>
          <div class="input" > 
		  <input type="text" name="depCity1" id="depCity1" placeholder="<?php echo $depCity1;?>" data-provide="typeahead" value="<?php echo $depCity1;?>"/>
          </div>
		  </div>
		  
          <h5>Departure</h5>
		  <input class="uneditable-input" type="text" value="<?php echo $date;?>" id="date" name="date" > 
          <div id="datepickerfrom"></div>
        </div>
        <div class="fight_div1">
          <h5>Destination</h5>
          <div class="input" >
            <input type="text" name="destCity" id="destCity" placeholder="<?php echo $destCity;?>" data-provide="typeahead" value="<?php echo $destCity;?>"/>
          </div>
		  <div id="depCity1Container">
          <h4>To</h4>
          <div class="input" >
            <input type="text" name="destCity1" id="destCity1" placeholder="<?php echo $destCity1;?>" data-provide="typeahead" value="<?php echo $destCity1;?>"  readonly="readonly"/>
          </div>
		  </div>
		  <div id="returnDateContainer">
          <h5>Hemresedatum</h5>
		  <input class="uneditable-input" type="text" value="<?php echo $date2;?>" id="date2" name="date2">
		  <div id="datepickerto"> </div>
		  </div>
        </div>
		</div>
		
      </div>
      <div class="search_div_flight1">
	  
        <!--<input type="text" name="email" disabled>-->
<div class="fm NiceIt">
              <div id="sushil">
     <p>Adults</p>
          <select class="Items" name="numAdults" id="numAdults" style="width:52px; ">
            <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
			  <option value="9">9</option>
            </select></div>
            
            <div id="sushil">
     <p>Children</p>
          <select class="Items" name="numChilds" id="numChilds"   style="width:52px;" onchange="showChildAge()">
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
            </select></div>
   </div>
        <div class="clear_form">
		
		 <div class="niceCheckbox" style="margin-left: -20px;">
		
		
		<?php
		$str = '';
		$k =  1;
		for($i=0; $i < 9; $i++)
		{
			
			$str .= '<div class="span1" style="display:none" id="chidAgeContainer'.$i.'">
					<label>Barn</label>
					<select class="span1" name="childAge['.$i.']" id="childAge'.$i.'" style="display:none;visibility:hidden ">
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
  <samp>   <div class="check_div">
		
            
			 <input type="radio" value="oneway" id="oneWay" name="oneWay" onclick="showHideCalender(this);" <?php echo ($tripType == 'O') ? 'checked' : '';?>>
	
              <label for="colorBlue" class="opt" >Enkelresa</label>
            </div>
            <div class="check_div">
               <input type="checkbox" value="1" id="flexibleSearch"  name="flexibleSearch" onclick="showHideCalender(this);" <?php echo ($flexibleSearch == 1) ? 'checked' : '';?>>
              <label for="colorBlue" class="opt" >Sök flexibelt</label>
            </div>
            <div class="check_div">
               <input type="checkbox" value="1" id="directFlight" name="directFlight" onclick="showHideCalender(this);" <?php echo ($directFlight == 1) ? 'checked' : '';?>>
              <label for="colorBlue" class="opt" >Direktflyg</label>
            </div>
            <div class="check_div">
               <input type="radio" value="multistop" id="multistop" name="triptype" <?php echo ($multistop == 1) ? 'checked' : '';?>> 
              <label for="colorBlue" class="opt" >Multi-stop</label>
            </div>
            <div class="check_div">
              <input type="radio" value="chkRetAnotLoc" id="chkRetAnotLoc" name="triptype" <?php echo ($tripType == 'R') ? 'checked' : '';?>>
              <label for="colorBlue" class="opt" >Hemresa från<br />
              <span style="padding-left:35px;"> annan ort</span> <br />
              </label>
            </div>
         
          <div class="height_4"><a href="javascript:void(0)"  onclick="return validateFlightSearch()"><img src="<?php echo base_url('images/search_best.png');?>" alt="" /></a>
		 <!-- <button type="button" class="submit" data-dismiss="modal" ><img src="<?php echo base_url('images/search_best.png');?>" alt="" id="submit" name="submit" /></button>-->
		  </div>
		 	</samp> </div>
	</div>
	<div class="height_30"></div>
	  <input type="hidden" name="tripType" id="tripType" value="<?php echo $tripType;?>" />
</form>	  
	  
	  
<script type="text/javascript">
			
	$(function() {
	
				$("#depCity").typeahead({
    			source: function(typeahead, city){
				$.ajax({
					url: '<?php echo base_url("locations.php")?>',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data) {
						
						typeahead.process(data);
					}
					});
			}
		});
		
		$('#depCity').blur(function() {
  			var depCityValue = $('#depCity').val();
  			 $("#destCity1").attr("placeholder", depCityValue);
			 $("#destCity1").attr("value", depCityValue);
			
		});
		
		$('#destCity').blur(function() {
			var destCityValue = $('#destCity').val();
  			$("#depCity1").attr("placeholder", destCityValue);
			$("#depCity1").attr("value", destCityValue);
		});
		
		
	});

$(function() {
		$("#destCity").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: '<?php echo base_url("locations.php")?>',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data) {
						typeahead.process(data);
						}
					});
			}
		});
	});

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
		
		console.log($("#tripType").val());
		
		$( "#datepickerto" ).datepicker({
			defaultDate: "+2w",
			altField: "#date2",
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
</script>