// JavaScript Document
function trim(str) {
    return str.replace(/^\s+|\s+$/g, '');
}

function validateFlightSearch()
{
   var depCityInp = trim($('#depCity').val());
   var destCityInp = trim($('#destCity').val())
   if(depCityInp == destCityInp)
   {
	  $('.error_container').show("slow");
	  $('.error_msg_container').html('From and Destination should be different');
      return false;
   }
   else if(depCityInp=='' || destCityInp=='')
   {
	  $('.error_container').show("slow");
	  $('.error_msg_container').html('From and Destination should not blank');
      return false;
   }
   else
   {  
      //$('#nda').children("input[type='text']").attr("disabled", "disabled");
      $('#progressBar').show(); 
      flightSearch.submit();
   }
}

$(document).ready(function(){
  $('#error_img_show').click(function() {
  $('.error_container').hide("slow");
   });
  
 });

$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );


 $(document).ready(function(){
			$( ".birthday_datepicker" ).datepicker({
			altFormat: "DD, d MM, yy",
			showWeek: true,
			firstDay: 1,
			dayNames: ["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"],
			dayNamesMin: ["Sö","Må","Ti","On","To","Fr","Lö"],
			monthNames: ["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],
			weekHeader: ""
		});
			
		
		$( ".trip_datepicker_2" ).datepicker({
			defaultDate: "+1w",
			selectedDate: "+1w",
			altField: "#date2",
			altFormat: "DD, d MM, yy",
			showWeek: true,
			firstDay: 1,
			dayNames: ["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"],
			dayNamesMin: ["Sö","Må","Ti","On","To","Fr","Lö"],
			monthNames: ["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],
			weekHeader: ""
			
		});
		
	 for(var j=3; j<=5; j++ )
	 {
		$( ".trip_datepicker_"+j ).datepicker({
											  
			altField: "#date"+j,
			altFormat: "DD, d MM, yy",
			showWeek: true,
			firstDay: 1,
			dayNames: ["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"],
			dayNamesMin: ["Sö","Må","Ti","On","To","Fr","Lö"],
			monthNames: ["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],
			weekHeader: ""
		});
	 }
		
		
	   $("#depCity").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data){			
					typeahead.process(data);
					 
					}
					});
			}
		});
	
		$("#depCity1").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data){			
						
						typeahead.process(data);
					 
					}
					});
			}
		});
		
		$("#depCity2").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data){			
					typeahead.process(data);
					 
					}
					});
			}
		});
		
		$("#depCity3").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data){			
					typeahead.process(data);
					
					}
					});
			}
		});
		
		$("#depCity4").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data){			
						
						typeahead.process(data);
					 
					}
					});
			}
		});
		
		$("#depCity5").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
					type: 'POST',
					data: 'city=' + city,
					dataType: 'JSON',
					async: true,
					success: function(data){			
							
						typeahead.process(data);
					 
					}
					});
			}
		});
		
		$("#destCity").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
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

		$("#destCity1").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
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
		
		
		$("#destCity2").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
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
		
		$("#destCity3").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
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
		
		$("#destCity4").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
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
		
		$("#destCity5").typeahead({
    	source: function(typeahead, city){
				$.ajax({
					url: 'locations.php',
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
		
		
		$("#multistop").change(function(){
			if($('#multistop').attr('checked'))
			{
			   $('#multi_stop').show();	
			   $('#no_multi_stop').hide();
			   $('#flxSearch').hide();
			}
			else
			{
			   $('#multi_stop').hide();		
			   $('#no_multi_stop').show();
			   $('#flxSearch').show();
			}
		});	
		
		
    });
 
 
function setOtherValue()
{
    var depCityValue = $('#depCity').val();
    $("#destCity1").val(depCityValue);
	var destCityValue = $('#destCity').val();
    $("#depCity1").val(destCityValue);
	chkFlexible();
}


function chkFlexible()
{
	var destCityValue = $('#destCity').val();
	var depCityValue1 = $('#depCity1').val();
	if(destCityValue!=depCityValue1)
	{
	 // disable flexible search
	   $('#flexibleSearch').attr('checked', false);
	   $('#flexibleSearch').attr('disabled', true);
	}
    else
	{
	   $('#flexibleSearch').removeAttr("disabled");
	}
		
} 
		

function removeOne(incr)
{
   $('#blue_box_'+incr).hide();
   $('#add_main_trip_'+parseInt(incr-1)).show();
   $('#destCity'+parseInt(incr-1)).val($('#depCity2').val());   
}

function showHideCalender(obj){
	var checkedId = obj.id;
	$("#radioButtonId").val(checkedId);
	
	$('#flexSearchContainer').show();
	
		
	 if(checkedId == 'oneWay'){
		 $("#returnDateContainer").hide();
		 $("#depCity1Container").hide();
		 $("#destCity1Container").hide();
		
		 $('#no_multi_stop input[type="text"]').attr("disabled", false);
		 $('#multi_stop input[type="text"]').attr("disabled", "disabled");
		 
	  }
	 else if(checkedId == 'multistop')
	 {
		 $('#multi_stop').show();
		 $('#no_multi_stop').hide();
		 $('#flexSearchContainer').hide();
		 $('#multi_stop input[type="text"]').attr("disabled", false);
		 $('#no_multi_stop input[type="text"]').attr("disabled", "disabled");
		
	
		 
	 }else if(checkedId=='chkRetAnotLoc')
	 {
		 $('#multi_stop').show();
		 $('#no_multi_stop').hide();
		 
		 
		 $('#flexSearchContainer').hide();
		 $("#destCity1").val($("#depCity").val());
		 $("#depCity1").attr("placeholder", '');
		 $("#depCity1").attr("value", '');
		 
		 
		 $("#depCity1Container").show();
		 $("#destCity1Container").show();
		 $("#returnDateContainer").show();
		 
		 
		  $('#multi_stop input[type="text"]').attr("disabled", "disabled");
		 $('#no_multi_stop input[type="text"]').attr("disabled", false);
		 
	 }
	 else
	 {
		 $("#returnDateContainer").show();
		 $("#depCity1Container").hide();
		 $("#destCity1Container").hide();
		 
		 
	
		 $('#no_multi_stop input[type="text"]').attr("disabled", false);
		 $('#multi_stop input[type="text"]').attr("disabled", "disabled");
	 }
}

function valueReset()
{
    $('#blue_box_4').hide();
	$('#blue_box_5').hide();
	$('#add_main_trip_3').show();
	$('#depCity').val('Stockholm');
	$('#destCity').val('London');
	$('#depCity1').val('London');
	$('#destCity1').val('Stockholm');
	$('#depCity2').val('Stockholm');
	$('#destCity2').val('London');
}

function addNew(i)
{ 
   $('#blue_box_'+parseInt(i+1)).show();
   $('#add_main_trip_'+i).hide();
        
   var destValue2 = $('#depCity2').val();
   var destValue = $('#destCity'+i).val(); 
   
   if( destValue == destValue2 )
	   $('#destCity'+i).val('');
 
   $('#destCity'+parseInt(i+1)).val($('#depCity2').val());     	
}