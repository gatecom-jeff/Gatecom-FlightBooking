<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


function createFormatedDate($date, $year, $time)
{
    $dateMonth    = substr($date, 2);
    $dateMonthNum = date("n", strtotime($dateMonth));
    $dateDay      = substr($date, 0, 2);
    $fullDate     = $year . '-' . $dateMonthNum . '-' . $dateDay . ' ' . $time;
    return $fullDate;
}

function dateDifference($date1, $date2)
{
    $diff       = abs(strtotime($date1) - strtotime($date2));
    $hours      = floor(($diff) / (60 * 60));
    $minuts     = floor(($diff - $hours * 60 * 60) / 60);
    $seconds    = floor(($diff - $hours * 60 * 60 - $minuts * 60));
    $difference = '';
    $difference .= (isset($hours) && $hours > 0) ? $hours . 'hrs ' : '';
    $difference .= (isset($minuts) && $minuts > 0) ? $minuts . 'min ' : '';
    $difference .= (isset($seconds) && $seconds > 0) ? $seconds . 'sec ' : '';
    return $difference;
}
function convertTime($timestamp)
{
    $hours      = 0;
    $minuts     = 0;
    $hours      = floor(($timestamp) / (60 * 60));
    $minuts     = floor(($timestamp - $hours * 60 * 60) / 60);
    $seconds    = floor(($timestamp - $hours * 60 * 60 - $minuts * 60));
    $difference = '';
    $difference .= ($hours < 10) ? "0" . $hours : $hours;
    $difference .= ($minuts < 10) ? ":0" . $minuts : ":" . $minuts;
    //$difference .= (isset($seconds) && $seconds > 0) ? ':'.$seconds: '';
    return $difference;
}
function createHiddenElementFromArray($array)
{
    $hiddenElements = '';
    foreach ($array as $key => $value)
    {
        $hiddenElements .= "<input type='hidden' name='" . $key . "' id='" . $key . "' value='" . $value . "'>";
    } //$array as $key => $value
    return $hiddenElements;
}
function getCarrierNameFromCarrierCode($carrierCode)
{
    $flightName = '';
    $CI =& get_instance();
    $CI->load->model('flyg_model');
    $result = $CI->flyg_model->getCarrierNameFromCarrierCode($carrierCode);
    return $result;
}

function getFlightHeader($outLeg, $inLeg, $triptype, $year)
{
    $resultHeader       = array();
    $outTotalTravelTime = 0;
    $inTotalTravelTime  = 0;
    $CI =& get_instance();
    $CI->load->model('flyg_model');
    for ($k = 0; $k < count($outLeg); $k++)
    {
        $outLegArray = array();
        if (count($outLeg) == 1)
        {
            $outLegArray = $outLeg['@attributes'];
        } //count($outLeg) == 1
        else
        {
            $outLegArray = $outLeg[$k]['@attributes'];
        }
        if (count($outLeg) == 1)
        {
            //$resultHeader['out']['dep'] = $outLegArray['departureCityCode'];
            //$resultHeader['out']['dest'] = $outLegArray['destinationCityCode'];
            $resultHeader['out']['dep'] = $CI->flyg_model->getAirportNameFromCode($outLegArray['departureCityCode']) . '(' . $outLegArray['departureCityCode'] . ')';
            ;
            $resultHeader['out']['dest'] = $CI->flyg_model->getAirportNameFromCode($outLegArray['destinationCityCode']) . '(' . $outLegArray['destinationCityCode'] . ')';
            $depFullDate                 = createFormatedDate($outLegArray['departureDate'], $year, $outLegArray['departureTime']);
			
            $resultHeader['out']['depdate'] = $depFullDate;
			
		   
		    $arrivalFullDate             = createFormatedDate($outLegArray['arrivalDate'], $year, $outLegArray['arrivalTime']);
            
			
            $diff                        = abs(strtotime($arrivalFullDate) - strtotime($depFullDate));
            $outTotalTravelTime          = $outTotalTravelTime + $diff;
        } //count($outLeg) == 1
        else
        {
            $depFullDate        = createFormatedDate($outLegArray['departureDate'], $year, $outLegArray['departureTime']);
			$resultHeader['out']['depdate'] = $depFullDate;
            $arrivalFullDate    = createFormatedDate($outLegArray['arrivalDate'], $year, $outLegArray['arrivalTime']);
            $diff               = abs(strtotime($arrivalFullDate) - strtotime($depFullDate));
            $outTotalTravelTime = $outTotalTravelTime + $diff;
            if ($k == 0)
            {
                //$resultHeader['out']['dep'] = $outLegArray['departureCityCode'];
                $resultHeader['out']['dep'] = $CI->flyg_model->getAirportNameFromCode($outLegArray['departureCityCode']);
                $resultHeader['out']['dep'] = $CI->flyg_model->getAirportNameFromCode($outLegArray['departureCityCode']) . '(' . $outLegArray['departureCityCode'] . ')';
                ;
            } //$k == 0
            else
            {
                //$resultHeader['out']['dest'] = $outLegArray['destinationCityCode'];
                $resultHeader['out']['dest'] = $CI->flyg_model->getAirportNameFromCode($outLegArray['destinationCityCode']) . '(' . $outLegArray['destinationCityCode'] . ')';
            }
        }
    } //$k = 0; $k < count($outLeg); $k++
    if ($outTotalTravelTime != 0)
    {
        $resultHeader['out']['totalTravelTime'] = convertTime($outTotalTravelTime);
    } //$outTotalTravelTime != 0
    if ($triptype == 'R' && $inLeg != '')
    {
        for ($k = 0; $k < count($inLeg); $k++)
        {
            $inLegArray = array();
            if (count($inLeg) == 1)
            {
                $inLegArray = $inLeg['@attributes'];
            } //count($inLeg) == 1
            else
            {
                $inLegArray = $inLeg[$k]['@attributes'];
            }
            if (count($inLeg) == 1)
            {
                //$resultHeader['in']['dep'] = $inLegArray['departureCityCode'];
                //$resultHeader['in']['dest'] = $inLegArray['destinationCityCode'];
                $resultHeader['in']['dep'] = $CI->flyg_model->getAirportNameFromCode($inLegArray['departureCityCode']) . '(' . $inLegArray['departureCityCode'] . ')';
                ;
                $resultHeader['in']['dest'] = $CI->flyg_model->getAirportNameFromCode($inLegArray['destinationCityCode']) . '(' . $inLegArray['destinationCityCode'] . ')';
                $depFullDate                = createFormatedDate($inLegArray['departureDate'], $year, $inLegArray['departureTime']);
				$resultHeader['in']['depdate'] = $depFullDate;
				 
                $arrivalFullDate            = createFormatedDate($outLegArray['arrivalDate'], $year, $outLegArray['arrivalTime']);
                //$totalTravelTime = dateDifference($arrivalFullDate, $depFullDate);
                $diff                       = abs(strtotime($arrivalFullDate) - strtotime($depFullDate));
                $inTotalTravelTime          = $inTotalTravelTime + $diff;
            } //count($inLeg) == 1
            else
            {
                $depFullDate       = createFormatedDate($inLegArray['departureDate'], $year, $inLegArray['departureTime']);
				$resultHeader['in']['depdate'] = $depFullDate;
                $arrivalFullDate   = createFormatedDate($inLegArray['arrivalDate'], $year, $inLegArray['arrivalTime']);
                //$totalTravelTime = dateDifference($arrivalFullDate, $depFullDate);
                $diff              = abs(strtotime($arrivalFullDate) - strtotime($depFullDate));
                $inTotalTravelTime = $inTotalTravelTime + $diff;
                if ($k == 0)
                {
                    //$resultHeader['in']['dep'] = $inLegArray['departureCityCode'];
                    $resultHeader['in']['dep'] = $CI->flyg_model->getAirportNameFromCode($inLegArray['departureCityCode']) . '(' . $inLegArray['departureCityCode'] . ')';
                    ;
                } //$k == 0
                else
                {
                    //$resultHeader['in']['dest'] = $inLegArray['destinationCityCode'];
                    $resultHeader['in']['dest'] = $CI->flyg_model->getAirportNameFromCode($inLegArray['destinationCityCode']) . '(' . $inLegArray['destinationCityCode'] . ')';
                }
            }
        } //$k = 0; $k < count($inLeg); $k++
    } //$triptype == 'R'
    if ($inTotalTravelTime != 0)
    {
        $resultHeader['in']['totalTravelTime'] = convertTime($inTotalTravelTime);
    } //$inTotalTravelTime != 0
    return $resultHeader;
}


function priceGrouping($response, $i, $newResponse, $newResCou, $loopId, $flexibleChk)
{
	
    $attributes                               = $response[$i]['@attributes'];
    $bookingUrl                               = $attributes['bookingUrl'];
    $total                                    = $attributes['total'];
    $outLeg                                   = isset($response[$i]['out'][0]['leg']) ? $response[$i]['out'][0]['leg'] : $response[$i]['out']['leg'];
    
	$outLeg                                   = isset($response[$i]['out'][0]['leg']) ? $response[$i]['out'][0]['leg'] : $response[$i]['out']['leg'];
    
	
	
	$inLeg                                    = isset($response[$i]['in'][0]['leg']) ? $response[$i]['in'][0]['leg'] : isset($response[$i]['in']['leg']) ? $response[$i]['in']['leg']: '';
	
	$inDepDate = '';
	$newInDepDate = '';
	$outDepDate = '';
	$newOutDepDate = '';
	if($inLeg != '')
	{
		
		$inDepDate = isset($inLeg[0]['@attributes']['departureDate']) ? $inLeg[0]['@attributes']['departureDate'] : (isset($inLeg['@attributes']['departureDate']) ? $inLeg['@attributes']['departureDate'] : '');
	}
	
	$outDepDate = isset($outLeg[0]['@attributes']['departureDate']) ? $outLeg[0]['@attributes']['departureDate'] : (isset($outLeg['@attributes']['departureDate']) ? $outLeg['@attributes']['departureDate'] : '');
	
	
    $newResponse[$newResCou]['@attributes']   = $attributes;
    $newResponse[$newResCou]['out'][0]['leg'] = $outLeg;
    
	if ($inLeg != '')
        $newResponse[$newResCou]['in'][0]['leg'] = $inLeg;
    
	for ($j = 1; $j < count($response) & $loopId < count($response); $j++)
    {
        $loopId         = $i + 1;
        $nextAttributes = isset($response[$loopId]['@attributes']) ? $response[$loopId]['@attributes'] : '';
        if ($nextAttributes != '')
        {
            
			$nextTotal       = $nextAttributes['total'];
            $nextitineraryId = $nextAttributes['itineraryId'];
            $newOutLeg       = isset($response[$loopId]['out'][0]['leg']) ? $response[$loopId]['out'][0]['leg'] : (isset($response[$loopId]['out']['leg']) ? $response[$loopId]['out']['leg']: '');
			
			
			 
			$newOutDepDate = isset($newOutLeg[0]['@attributes']['departureDate']) ? $newOutLeg[0]['@attributes']['departureDate'] : (isset($newOutLeg['@attributes']['departureDate']) ? $newOutLeg['@attributes']['departureDate'] : '');
            
			if ($inLeg != '')
			{
                $newInLeg = isset($response[$loopId]['in'][0]['leg']) ? $response[$loopId]['in'][0]['leg'] : (isset($response[$loopId]['in']['leg'])? $response[$loopId]['in']['leg']: '');
				
				$newInDepDate = isset($newInLeg[0]['@attributes']['departureDate']) ? $newInLeg[0]['@attributes']['departureDate'] : (isset($newInLeg['@attributes']['departureDate']) ? $newInLeg['@attributes']['departureDate'] : '');
			
			}
			
			$conditionStr = '';
			$c1 = '';
			$c2= '';
			
			if($inLeg != '' && $flexibleChk == 1)
			{
				$c1 = $inDepDate ;
				$c2 = $newInDepDate;
			}
			else if($flexibleChk == 1)
			{
				$c1 = $outDepDate ;
				$c2 = $newOutDepDate;
			}
				
            if (($nextTotal == $total) && ($c1 == $c2)) 
            {
                $newResponse[$newResCou]['out'][$j]['itineraryId'] = $nextitineraryId;
                if ($j == 1)
                {
                    $currentOutLeg = $outLeg;
                    $nextOutLeg    = $newOutLeg;
                    if ($inLeg != '')
                    {
                        $currentInLeg = $inLeg;
                        $nextInLeg    = $newInLeg;
                    }
                    
                } //$j = 1
                else
                {
                    $currentOutLeg = $newOutLeg;
                    $nextOutLeg    = isset($response[$loopId - 1]['out'][0]['leg']) ? $response[$loopId - 1]['out'][0]['leg'] : isset($response[$loopId - 1]['out']['leg']) ? $response[$loopId - 1]['out']['leg']: '';
                    if ($inLeg != '')
                    {
                        $currentInLeg = $inLeg;
                        $nextInLeg    = isset($response[$loopId - 1]['in'][0]['leg']) ? $response[$loopId - 1]['in'][0]['leg'] : isset($response[$loopId - 1]['in']['leg']) ? $response[$loopId - 1]['in']['leg']: '';
                    }
                }
                
                $outmatched = legComparison($currentOutLeg, $nextOutLeg);
                
                
                if ($outmatched == 0)
                {
                    $newResponse[$newResCou]['out'][$j]['leg'] = $newOutLeg;
                } //$outmatched == 0
                
                if ($inLeg != '')
                {
                    $inmatched = legComparison($currentInLeg, $nextInLeg);
                    if ($inmatched == 0)
                    {
                        $newResponse[$newResCou]['in'][$j]['leg'] = $newInLeg;
                    } //$inmatched == 0
                }
                
               // unset($response[$loopId]);
                $i++;
            } //$nextTotal == $total
            else
            {
                $newResCou = $newResCou + 1;
                $i++;
                return priceGrouping($response, $i, $newResponse, $newResCou, $loopId, $flexibleChk);
            }
        } //$nextAttributes != ''
        //echo "Change Loop"."##".$i."<br>";	
    } //$j = 1; $j < count($response) & $loopId < count($response); $j++
    return $newResponse;
}





function legComparison($currentLeg, $nextLeg)
{
    $matched              = 1;
    $newArray             = array();
    $counter              = 0;
    $previousFlightNumber = '';
    $currentFlightNumber  = '';
	
	
    for ($k = 0; $k < count($nextLeg); $k++)
    {
        if (isset($currentLeg[$k]))
        {
            if (isset($currentLeg[$k]['@attributes']['flightNumber']))
            {
                $previousFlightNumber = $currentLeg[$k]['@attributes']['flightNumber'];
            }
            else if (isset($currentLeg['@attributes']['flightNumber']))
            {
                $previousFlightNumber = $currentLeg['@attributes']['flightNumber'];
            }
        }
        
        
        if (isset($nextLeg[$k]))
        {
            if (isset($nextLeg[$k]['@attributes']['flightNumber']))
            {
                $currentFlightNumber = $nextLeg[$k]['@attributes']['flightNumber'];
            }
            else if (isset($nextLeg['@attributes']['flightNumber']))
            {
                $currentFlightNumber = $nextLeg['@attributes']['flightNumber'];
            }
        }
        
        if ($previousFlightNumber != $currentFlightNumber)
        {
            $matched = 0;
        } //$previousFlightNumber != $currentFlightNumber
    } //$k = 0; $k < count($nextLeg); $k++
    return $matched;
}


function getTotalDuration($legArray, $year, $type)
{
    $totalTravelTime = '';
    $numberofLegs    = count($legArray);
    
    $totalDuration              = 0;
    $lastFlightIndex            = $numberofLegs - 1;
    $responseArray              = array();
    $responseArray['legLength'] = count($legArray) - 1;
    
    if ($numberofLegs > 1)
    {
        $stopoverTimeDifference = 0;
        $totalDuration          = 0;
        //if($type == 'out')
        //{
        $depCityCode            = explode(":", $legArray[0]['@attributes']['departureCityCode']);
        $depAirportCityName     = getAirportCityName($depCityCode[0], 'header');
        
        $responseArray['depAirportCityName'] = $depAirportCityName;
        $responseArray['depAirportCityName'] = $depAirportCityName;
        
        
        
        $destCityCode                         = explode(":", $legArray[count($legArray) - 1]['@attributes']['destinationCityCode']);
        $destAirportCityName                  = getAirportCityName($destCityCode[0], 'header');
        $responseArray['destAirportCityName'] = $destAirportCityName;
        
        
        for ($i = 0; $i < count($legArray); $i++)
        {
            $durationArray = array();
            if(isset($legArray[$i]['@attributes']['duration']))
			{
			
				$durationArray = explode(":", $legArray[$i]['@attributes']['duration']);
            
				$durationMinutes = isset($durationArray[1]) ? $durationArray[1] : 0;
				$durationValue   = $durationArray[0] . "." . $durationMinutes;
				
				$totalDuration = $totalDuration + $durationValue;
				$totalDuration = number_format($totalDuration, 2, '.', '');
			}
			else
			{
				$totalDuration = 0;
			}
            $nextCounter   = $i + 1;
            
            if ($nextCounter < count($legArray))
            {
                $arrivalTime       = $legArray[$i]['@attributes']['arrivalTime'];
                $arrivalDateValue  = $legArray[$i]['@attributes']['arrivalDate'];
                $arrivalDate       = $year . '-' . date("n", strtotime(substr($arrivalDateValue, 2))) . '-' . substr($arrivalDateValue, 0, 2) . ' ' . $arrivalTime;
                $arrivalDateSecond = strtotime(date('Y-m-d H:i', strtotime($arrivalDate)));
                
                $depatureTime       = $legArray[$nextCounter]['@attributes']['departureTime'];
                $depautreDateValue  = $legArray[$nextCounter]['@attributes']['departureDate'];
                $depautreDate       = $year . '-' . date("n", strtotime(substr($depautreDateValue, 2))) . '-' . substr($depautreDateValue, 0, 2) . ' ' . $depatureTime;
                $depautreDateSecond = strtotime(date('Y-m-d H:i', strtotime($depautreDate)));
                
                
                $difference             = $depautreDateSecond - $arrivalDateSecond;
                $stopoverTimeDifference = $stopoverTimeDifference + $difference;
                //echo $depautreDate."###".$arrivalDate."<br>";
                
            }
        }
        
        
        $responseArray['flightTime'] = $totalDuration;
        $transferTime                = covertTime($stopoverTimeDifference);
        
        $totalDurationArray = explode(".", $totalDuration);
        $totalDuration      = ($totalDurationArray[0] * 3600);
        
        if (isset($totalDurationArray[1]))
            $totalDuration = $totalDuration + ($totalDurationArray[1] * 60);
        
        //$totalTravelTime = covertTime($totalDuration);
        $totalTimeInFlight = covertTime($totalDuration);
        
        $totDuration     = $totalDuration + $stopoverTimeDifference;
        $totalTravelTime = covertTime($totDuration);
        
        $responseArray['transferTime'] = $transferTime;
        
        if ($type == 'out')
		{
			$responseArray['travelDate'] = $legArray[0]['@attributes']['departureDate'];
			$responseArray['travelTime'] = $legArray[0]['@attributes']['departureTime'];
        }
		else
		{
            $responseArray['travelDate'] = $legArray[0]['@attributes']['arrivalDate'];
			$responseArray['travelTime'] = $legArray[0]['@attributes']['arrivalTime'];
        }
        $responseArray['carrierCode']     = $legArray[0]['@attributes']['carrierCode'];
        $responseArray['totalTravelTime'] = $totalTravelTime;
    }
    else
    {
        $firstDuration = explode(":", $legArray['@attributes']['duration']);
        
        $hours   = $firstDuration[0];
        $minutes = $firstDuration[1];
        if ($hours < 10)
            $hours = "0" . $hours;
        
        
        
        
        $totalTravelTime = $hours . "h " . $minutes . "m";
        if ($type == 'out')
            $responseArray['travelDate'] = $legArray['@attributes']['departureDate'];
        else
            $responseArray['travelDate'] = $legArray['@attributes']['arrivalDate'];
        
        $responseArray['carrierCode']     = $legArray['@attributes']['carrierCode'];
        $responseArray['totalTravelTime'] = $totalTravelTime;
        $responseArray['transferTime']    = '';
        
        //if($type == 'out')
        //{
        $depCityCode = explode(":", $legArray['@attributes']['departureCityCode']);
        
        $depAirportCityName = getAirportCityName($depCityCode[0], 'header');
        
        $responseArray['depAirportCityName'] = $depAirportCityName;
        
        
        
        $destCityCode                         = explode(":", $legArray['@attributes']['destinationCityCode']);
        $destAirportCityName                  = getAirportCityName($destCityCode[0], 'header');
        $responseArray['destAirportCityName'] = $destAirportCityName;
        
        
        /*}		
        if($type == 'in')
        {
        $cityCode = explode(":", $legArray['@attributes']['destinationCityCode']);
        $airportCityName = getAirportCityName($cityCode[0]);
        $responseArray['airportCityName'] = $airportCityName;
        }*/
        
        
    }
    
    return $responseArray;
}

function covertTime($diff)
{
    $hours   = floor($diff / 3600);
    $minutes = floor(($diff / 60) % 60);
    $seconds = $diff % 60;
    $hours   = ($hours < 10) ? "0" . $hours : $hours;
    $minutes = ($minutes < 10) ? "0" . $minutes : $minutes;
    
    return $hours . "h " . $minutes . "m ";
}

function getAirportCityName($citycode, $type = '')
{
    $string = '';
    $CI =& get_instance();
    $CI->load->model('flyg_model');
    $result = $CI->flyg_model->getAirportCityName($citycode);
    $output = '';
    if ($type == 'header')
    {
        $cityName         = $result['city'];
        $aiportName       = $result['airportname'];
        $output['header'] = $aiportName . ', ' . $cityName;
        $output['hidden'] = $cityName . ' ' . $aiportName;
        
    }
    else if ($type == 'flightList')
    {
        $cityName   = isset($result['city']) ? $result['city'] : '';
        $aiportName = isset($result['airportname']) ? $result['airportname'] : '';
        $output     = $aiportName . ', ' . $cityName;
    }
    
    
    return $output;
}

function createDateHeader($response)
{
	$resultArray = array();
	
	$outArray = array();
	$inArray = array();
	$j =0;
	$x = 0;
	$c = 0;
	$counter = 0;
	$inArrayKeyChk = array();
	$arrayPrevKey = '';
	$arrayPrevInKey = '';
	$str = '';
	$str1 = '';
	
	for($i=0; $i<count($response); $i++)
	{
		$attributes = $response[$i]['@attributes'];
		$total = $attributes['total'];
		$currency = $attributes['currency'];
		$responseOutArr = $response[$i]['out'][0];
		$responseOutLegAttr = isset($responseOutArr['leg'][0]['@attributes']) ? $responseOutArr['leg'][0]['@attributes'] : $responseOutArr['leg']['@attributes'];
		$arrayKey = $responseOutLegAttr['departureDate'];
		if($i == 0)
		{
			$arrayPrevKey  = $arrayKey;
		}
			
		$responseInArr = isset($response[$i]['in'][0]) ? $response[$i]['in'][0] : '';
		
		
		$resultArray[$i]['out']['carrierCode'] = $responseOutLegAttr['carrierCode'];  
		$resultArray[$i]['out']['currency'] = $currency;
		$resultArray[$i]['out']['date'] = $arrayKey;     
		$resultArray[$i]['out']['total'] = $total;	
		$inArrayKey = '';
		
		if($responseInArr != '')
		{
			$responseInLegAttr = isset($responseInArr['leg'][0]['@attributes']) ? $responseInArr['leg'][0]['@attributes'] : $responseInArr['leg']['@attributes'];									 			$inArrayKey = $responseInLegAttr['departureDate'];
			
			if($i == 0)
			{
				$arrayPrevInKey  = $inArrayKey;
			}
			
			
			$resultArray[$i]['in']['carrierCode'] = $responseInLegAttr['carrierCode']; 
			$resultArray[$i]['in']['currency'] = $currency; 
			$resultArray[$i]['in']['date'] = $inArrayKey; 
			$resultArray[$i]['in']['total'] = $total;
		}
		
		if((strcmp($inArrayKey,$arrayPrevInKey) != 0) || (strcmp($arrayKey,$arrayPrevKey) != 0) || $i == 0)
		{
			if(strcmp($arrayKey,$arrayPrevKey) != 0)
			{
				$c = $c + 1;
				$j = 0;
				
			}
			
			
			$inArrayKeyChk[$j][$c]['indate'] = $inArrayKey;
			$inArrayKeyChk[$j][$c]['total'] = $total;
			$inArrayKeyChk[$j][$c]['outdate'] = $arrayKey;
			$inArrayKeyChk[$j][$c]['currency'] = $currency;
			$inArrayKeyChk[$j][$c]['carrierCode'] = $responseOutLegAttr['carrierCode'];
			$j  = $j+1;
		}
		
		$arrayPrevKey  = $arrayKey;
		$arrayPrevInKey  = $inArrayKey;	
	}
	
	$length = 0;
	$resultArray = array();
	
	if(count($inArrayKeyChk) == 1)
	{
		$length = count($inArrayKeyChk[0]);
		$resultArray['flightin']  = 0;
	}
	else
	{
		$length = count($inArrayKeyChk);
		$resultArray['flightin']  = 1;
	}
	
	$resultArray['inArrayLength']  = $length;
	$resultArray['result']         = $inArrayKeyChk;
	
	return $resultArray;
}


/*function createDateHeader($response)
{
	$resultArray = array();
	
	$outArray = array();
	$inArray = array();
	$j =0;
	$x = 0;
	$c = 0;
	$counter = 0;
	$inArrayKeyChk = array();
	$previousOutDate = '';
	$previousOutDate = '';
	for($i=0; $i<count($response); $i++)
	{
		$attributes = $response[$i]['@attributes'];
		$total = $attributes['total'];
		$currency = $attributes['currency'];
		
		
		$responseOutArr = $response[$i]['out'][0];
		$responseOutLegAttr = isset($responseOutArr['leg'][0]['@attributes']) ? $responseOutArr['leg'][0]['@attributes'] : $responseOutArr['leg']['@attributes'];
		$arrayKey = $responseOutLegAttr['departureDate'];
		
		$responsePrevOutArr = isset($response[$i - 1]['out'][0]) ? $response[$i - 1]['out'][0] : $response[$i]['out'][0];
		$responsePrevOutLegAttr = isset($responsePrevOutArr['leg'][0]['@attributes']) ? $responsePrevOutArr['leg'][0]['@attributes'] : $responsePrevOutArr['leg']['@attributes'];
		$arrayPrevKey = $responsePrevOutLegAttr['departureDate'];
		
		
		$responseInArr = isset($response[$i]['in'][0]) ? $response[$i]['in'][0] : '';
		
		
		$resultArray[$i]['out']['carrierCode'] = $responseOutLegAttr['carrierCode'];  
		$resultArray[$i]['out']['currency'] = $currency;
		$resultArray[$i]['out']['date'] = $arrayKey;     
		$resultArray[$i]['out']['total'] = $total;	
		$arrayPrevInKey = '';
		$inArrayKey = '';
		if($responseInArr != '')
		{
			$responseInLegAttr = isset($responseInArr['leg'][0]['@attributes']) ? $responseInArr['leg'][0]['@attributes'] : $responseInArr['leg']['@attributes'];									 			$inArrayKey = $responseInLegAttr['departureDate'];
			
			
			$responsePrevInArr = isset($response[$i - 1]['in'][0]) ? $response[$i - 1]['in'][0] : $response[$i]['in'][0];
			$responsePrevInLegAttr = isset($responsePrevInArr['leg'][0]['@attributes']) ? $responsePrevInArr['leg'][0]['@attributes'] : $responsePrevInArr['leg']['@attributes'];
			$arrayPrevInKey = $responsePrevInLegAttr['departureDate'];
		
			
			
			$resultArray[$i]['in']['carrierCode'] = $responseInLegAttr['carrierCode']; 
			$resultArray[$i]['in']['currency'] = $currency; 
			$resultArray[$i]['in']['date'] = $inArrayKey; 
			$resultArray[$i]['in']['total'] = $total;
		}
		if($inArrayKey == '23APR')
			echo $total.'--'.$arrayKey.'--'.$inArrayKey."<br>";
		
		if(((strcmp($arrayKey,$arrayPrevKey) != 0) || (strcmp($inArrayKey,$arrayPrevInKey) != 0)) || $i == 0)
		{
			if($i == 0)
			{
				$c = $c + 1;
			}
		    if(strcmp($arrayKey,$arrayPrevKey) != 0)
			{
				$c = $c + 1;
				$j =0;
			}
			$inArrayKeyChk[$j][$c]['indate'] = $inArrayKey;
			$inArrayKeyChk[$j][$c]['total'] = $total;
			$inArrayKeyChk[$j][$c]['outdate'] = $arrayKey;
			$inArrayKeyChk[$j][$c]['currency'] = $currency;
			$inArrayKeyChk[$j][$c]['carrierCode'] = $responseOutLegAttr['carrierCode'];
			
			//echo $j.'--'.$c.'--'.$total.'--'.$arrayKey.'--'.$inArrayKey."<br>";
			
			$j  = $j+1;
		}
			
	}
	
	$length = 0;
	$resultArray = array();
	
	if(count($inArrayKeyChk) == 1)
	{
		$length = count($inArrayKeyChk[0]);
		$resultArray['flightin']  = 0;
	}
	else
	{
		$length = count($inArrayKeyChk);
		$resultArray['flightin']  = 1;
	}
	
	$resultArray['inArrayLength']  = $length;
	$resultArray['result']         = $inArrayKeyChk;
	
	return $resultArray;
}
*/


function getCarrierList()
{
    $string = '';
    $CI =& get_instance();
    $CI->load->model('flyg_model');
    $result = $CI->flyg_model->getCarrierList();
    return $result;
}
