<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Flyg extends CI_Controller
{
    /**
     * Controller for the "Flyg".
     *
     * This controller contains all functions needed to make a flight booking.
     *
     * 
     *
     * Created by GATECOM´s Robert Bornholm
     */

    public function __construct()
    {
        //$this->lang->load('my', $this->session->userdata('language'));
		parent::__construct();
		if(!$this->session->userdata('language'))
		{
			$this->lang->load('general', 'english');
			$data = array('language' => 'english');
			$this->session->set_userdata($data);		
		} 
		else
		{
			$this->lang->load('general', $this->session->userdata('language'));
			$data = array('language' => $this->session->userdata('language'));
			$this->session->set_userdata($data);
		}
	}
    public function index()
    {
         if (!$this->session->userdata('language'))
           $this->session->set_userdata('language','english');
			
		$this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
		$this->load->view('progress');
		
        $this->load->view('flight_search');
		$this->load->view('seebooking');
        $this->load->view('content');
        $this->load->view('footer');
    }
    public function searching()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
        $this->load->view('progress');
		
        $search         = $this->input->post(NULL, TRUE);
		
		
        $this->postData = $search;
        $this->load->view('flight_search');
        $this->load->view('seebooking');
		
		
        if ($search['depCity'] != '')
        {
            $infants = 0;
            for ($i = 0; $i < $search['numChilds']; $i++)
            {
                if ($search['childAge'][$i] < 1)
                {
                    $infants = $infants + 1;
                } 
                $this->postData['childAge_' . $i] = $search['childAge'][$i];
            } 
            
			
			$childs                           = $search['numChilds'] - $infants;
            $this->postData['childs']         = $childs;
            $this->postData['infants']        = $infants;
            
			$this->responseArray              = $this->flightSearchRequestResponse($search);
           
		    $this->postData['depCity']        = isset($search['depCity']) ? $search['depCity'] : '';
			$this->postData['depCity1']        = isset($search['depCity1']) ? $search['depCity1'] : '';
			$this->postData['depCity2']        = isset($search['depCity2']) ? $search['depCity2'] : '';
			$this->postData['depCity3']        = isset($search['depCity3']) ? $search['depCity3'] : '';
            
			$this->postData['destCity']       = isset($search['destCity']) ? $search['destCity'] : '';
			$this->postData['destCity1']        = isset($search['destCity1']) ? $search['destCity1'] : '';
			$this->postData['destCity2']        = isset($search['destCity2']) ? $search['destCity2'] : '';
			$this->postData['destCity3']        = isset($search['destCity3']) ? $search['destCity3'] : '';
            
			
			
			$this->postData['date']           = isset($search['date']) ? $search['date'] : '';
			$this->postData['date1']          = isset($search['date1']) ? $search['date1'] : '';
			$this->postData['date2']          = isset($search['date2']) ? $search['date2'] : '';
			$this->postData['date3']          = isset($search['date3']) ? $search['date3'] : '';
			
			$this->postData['formatedDate']   = isset($search['date']) ? $this->getFormatedFlightDate($search['date']) : '';
          	$this->postData['formatedDate1']   = isset($search['date1']) ? $this->getFormatedFlightDate($search['date1']) : '';
            $this->postData['formatedDate2']   = isset($search['date2']) ? $this->getFormatedFlightDate($search['date2']) :' ';
            $this->postData['formatedDate3']   = isset($search['date3']) ? $this->getFormatedFlightDate($search['date3']) : '';
            
			$this->postData['numAdults']      = isset($search['numAdults']) ? $search['numAdults'] : '';
            $this->postData['numChilds']      = isset($search['numChilds']) ? $search['numChilds'] : '';
            $this->postData['childAge']       = isset($search['childAge']) ? $search['childAge'] : '';
            $this->postData['flexibleSearch'] = isset($search['flexibleSearch']) ? $search['flexibleSearch'] : '';
            $this->postData['directFlight']   = isset($search['directFlight']) ? $search['directFlight'] : '';
           	
			$this->postData['tripType']       = isset($search['tripType']) ? $search['tripType'] : '';
			$this->postData['directFlight']   = isset($search['directFlight']) ? $search['directFlight'] : '';
			
			
			$this->postData['radioButtonId']   = isset($search['radioButtonId']) ? $search['radioButtonId'] : 'retrun';
            $this->load->view('flight/flight_search', $this->postData);
		} 
        else
        {
            $this->load->view('content');
        }
        $this->load->view('footer');
    }
	public function orderflight()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
        $this->load->view('progress');
        $postarray = $this->input->post(NULL, TRUE);
        if (isset($postarray['out']))
        {
            $outArray   = explode("~", $postarray['out']);
            $itenerayId = $outArray[0];
        } //isset($postarray['out'])
        
		$this->postData      = $postarray;
        $this->responseArray = $this->getBookAFlightRequestResponse($postarray);
        //$this->load->view('flight/bookaflight', $this->responseArray);
		$this->load->view('flight/orderflight', $this->responseArray);
		 $this->load->view('footer');
    }
	
	
    public function bookaflight()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
        $this->load->view('progress');
        $postarray = $this->input->post(NULL, TRUE);
		
		if (isset($postarray['out']))
        {
            $outArray   = explode("~", $postarray['out']);
            $itenerayId = $outArray[0];
        }
        
		$this->postData      = $postarray;
       	$this->load->view('flight/bookaflight', $this->postData);
		$this->load->view('footer');
    }
    public function bookingintermediate()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
        $this->load->view('progress');
		
        $postarray           = $this->input->post(NULL, TRUE);
        $this->postData      = $postarray;
        $this->responseArray = $this->getBookingIntermediateResponse($postarray);
		
        $this->load->view('flight/bookingIntermediate', $this->responseArray);
		
		
    }
    public function bookingconfirmation()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
		$this->load->view('progress');
        $postarray           = $this->input->post(NULL, TRUE);
        $this->postData      = $postarray;
        $this->responseArray = $this->getBookingConfirmationResponse($postarray);
		$this->load->view('flight/bookingconfirmation', $this->responseArray);
		$this->load->view('footer');
    }
    public function searchresult()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
		$this->load->view('progress');
        $this->load->view('flight_search');
        $this->load->view('content');
        $this->load->view('footer');
    }
    public function locations()
    {
        $this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
		$this->load->view('progress');
        $this->load->view('locations');
        $this->load->view('content');
        $this->load->view('footer');
    }
    /**
     * flightSearchRequestResponse: This funciton is used to return flight serach response in array format.
     * @param $postArray: POST data from the from
     * @return $response: an array
     **/
    public function getFormatedFlightDate($date)
    {
        if($date != '')
		{
			$fullDateArray = explode(",", $date);
			
			$dateMonthArray = explode(" ", trim($fullDateArray[1]));
			$day            = $dateMonthArray[0];
			$month          = trim($dateMonthArray[1]);
			$month = substr($month, "0", 3);
		   
			$year           = trim($fullDateArray[2]);
			$monthnum       = date("n", strtotime($month));
			$monthnum       = ($monthnum > 9) ? $monthnum : "0" . $monthnum;
			
			$day  = ($day > 9) ? $day : "0" . $day;
			$date = $day . "/" . $monthnum . "/" . $year;
			return $date;
		}
    }
    /*
     * 
     */
    public function flightSearchRequestResponse($postArray)
    {
       
		
		$depatureDate   = '';
        $tripParam      = '';
        $directFlight   = (isset($postArray['directFlight']) && $postArray['directFlight'] == "1") ? "Y" : "N";
        $flexibleSearch = (isset($postArray['flexibleSearch']) && $postArray['flexibleSearch'] == "1") ? "Y" : "N";
        
		$selectTripType = (isset($postArray['selectTripType'])) ? $postArray['selectTripType'] : '';
		$depCity = isset($postArray['depCity']) ? $this->getFormattedCity($postArray['depCity']) : '';
		$depCity1 = isset($postArray['depCity1']) ?  $this->getFormattedCity($postArray['depCity1'])  : '';
		$depCity2 =  isset($postArray['depCity2']) ? $this->getFormattedCity($postArray['depCity2']) : '';
		$depCity3 = isset($postArray['depCity3']) ? $this->getFormattedCity($postArray['depCity3']) : '';
		
		
		$destCity = isset($postArray['destCity']) ? $this->getFormattedCity($postArray['destCity']) : '';
		$destCity1 = isset($postArray['destCity1']) ? $this->getFormattedCity($postArray['destCity1']) : '';
		$destCity2 = isset($postArray['destCity2']) ? $this->getFormattedCity($postArray['destCity2']) : '';
		$destCity3 = isset($postArray['destCity3']) ? $this->getFormattedCity($postArray['destCity3']): '';
		
		
		
		$date = isset($postArray['date']) ? $postArray['date'] : '';
		$date1 = isset($postArray['date1']) ? $postArray['date1'] : '';
		$date2 = isset($postArray['date2']) ? $postArray['date2'] : '';
		$date3 = isset($postArray['date3']) ? $postArray['date3'] : '';
		
		if ($date != '')
        {
            $date = $this->getFormatedFlightDate($date);
        } 
        if ($date1 != '')
        {
            $date1 = $this->getFormatedFlightDate($date1);
        }
		if ($date2 != '')
        {
            $date2 = $this->getFormatedFlightDate($date2);
        }
		if ($date3 != '')
        {
            $date3 = $this->getFormatedFlightDate($date3);
        }
		
		
		
		$tripType = isset($postArray['tripType']) ? $postArray['tripType'] : '';
        $numAdults  = isset($postArray['numAdults']) ? $postArray['numAdults'] : '';
        $numChilds  = isset($postArray['numChilds']) ? $postArray['numChilds'] : '';
        $childAge   = isset($postArray['childAge']) ? $postArray['childAge'] : '';
        $numInfants = 0;
		
	
		
        for ($i = 0; $i < $numChilds; $i++)
        {
            if ($postArray['childAge'][$i] < 2)
            {
                $numInfants = $numInfants + 1;
            } //$postArray['childAge'][$i] < 2
        } //$i = 0; $i < $numChilds; $i++
        $numChilds     = $numChilds - $numInfants;
        $adults        = $numAdults;
        $twoWayParam   = '';
        $chkStopOver   = isset($postArray['chkStopOver']) ? $postArray['chkStopOver'] : '';
        $stopOverParam = '';
		$multiWayParam = '';
		
        if ($chkStopOver != '' && $chkStopOver == true)
        {
            $stopoverCity    = $postArray['stopoverCity'];
            $stopoverCityDay = $postArray['stopoverCityDay'];
            $stopOverParam   = "&stopoverCity=$stopoverCity&stopOverDays=$stopoverCityDay";
        } //$chkStopOver != '' && $chkStopOver == true
        //Stop over return and create URL
        $chkStopOverRet   = isset($postArray['chkStopOverRet']) ? $postArray['chkStopOverRet'] : '';
        $stopOverRetParam = '';
        //Stop over check and create URL
        if ($chkStopOverRet != '' && $chkStopOverRet == true)
        {
            $stopoverCityRet    = $postArray['stopoverCityRet'];
            $stopoverCityDayRet = $postArray['stopoverCityDayRet'];
            $stopOverRetParam   = "&stopOverCityRet=$stopoverCityRet&stopOverRetDays=$stopoverCityDayRet";
        } //$chkStopOverRet != '' && $chkStopOverRet == true
        if ($tripType == "O")
        {
           $tripParam = "DepCity=$depCity&DestCity=$destCity&date1=$date1";
        } 
		
        
		if ($tripType == "M")
        {
            
			
			if ($date != '' && $date1 != '' && $date2 != '' && $date3 != '')
			{
               $tripParam = "DepCity=$depCity&DestCity=$destCity&DepCity1=$depCity1&DestCity1=$destCity1&MultiCityDep1=$depCity2&MultiCityDest1=$destCity2&MultiCityDep2=$depCity3&MultiCityDest2=$destCity3&date1=$date&date2=$date1&date3=$date2&date4=$date3";
            }
			else if ($date != '' && $date1 != '' && $date2 != '')
			{
               $tripParam = "DepCity=$depCity&DestCity=$destCity&DepCity1=$depCity1&DestCity1=$destCity1&MultiCityDep1=$depCity2&MultiCityDest1=$destCity2&date1=$date&date2=$date1&date3=$date2";
            }
			else if ($date != '' && $date1 != '')
			{
              $tripParam = "DepCity=$depCity&DestCity=$destCity&DepCity1=$depCity1&DestCity1=$destCity1&date1=$date&date2=$date1";
            }
			
			
			
        } 
		
        if ($tripType == "R")
        {
           $tripParam = "DepCity=$depCity&DestCity=$destCity&date1=$date&date2=$date1";
		} 
		
		$carrierCode = '';
		if(isset($postArray['flightName']) && $postArray['flightName'] != '')
		{
		 	$carrierCode = "&carrierCode=".$postArray['flightName'];
		}
		
        $url      = "http://dev.fareofficets.com/FareOfficets/AvailableSeatsXMLAPI.action?$tripParam&triptype_Search=$tripType&adults=$adults&childs=$numChilds&infants=$numInfants&directFlight=$directFlight&flexibleSearch=$flexibleSearch&key=" . KEY . "$stopOverParam$stopOverRetParam$carrierCode";
        $response = $this->getXmlInArray($url);
		
		
        return $response;
    }
    public function getBookAFlightRequestResponse($postArray)
    {
        $city1             = $postArray['city1'];
        $city2             = $postArray['city2'];
		
		
        $adults            = $postArray['adults'];
        $childs            = isset($postArray['childs']) ? $postArray['childs'] : 0;
        $infants           = isset($postArray['infants']) ? $postArray['infants'] : 0;
        $itinerary_id      = $postArray['itinerary_id'];
        $pricekey          = $postArray['pricekey'];
        $triptype          = $postArray['triptype'];
        $trip1             = $postArray['trip1'];
        $trip2             = $postArray['trip2'];
        $trip3             = $postArray['trip3'];
        $trip4             = $postArray['trip4'];
        $tripCount         = $postArray['tripCount'];
        $sessionId         = $postArray['sessionId'];
        $sessionKey        = $postArray['sessionKey'];
        $companyId         = $postArray['companyId'];
        $accessId          = $postArray['accessId'];
        $currency_Notation = $postArray['currency_Notation'];
        $adtBaseFare       = $postArray['adtBaseFare'];
        $adtTaxFare        = $postArray['adtTaxFare'];
        $adtTotalFare      = $postArray['adtTotalFare'];
        $chdBaseFare       = isset($postArray['chdBaseFare']) ? $postArray['chdBaseFare'] : '0';
        $chdTaxFare        = isset($postArray['chdTaxFare']) ? $postArray['chdTaxFare'] : '0';
        $chdTotalFare      = isset($postArray['chdTotalFare']) ? $postArray['chdTotalFare'] : '0';
        $infBaseFare       = isset($postArray['infBaseFare']) ? $postArray['infBaseFare'] : '0';
        $infTaxFare        = isset($postArray['infTaxFare']) ? $postArray['infTaxFare'] : '0';
        $infTotalFare      = isset($postArray['infTotalFare']) ? $postArray['infTotalFare'] : '0';
        //Add all fares
        $totalAmount       = $adtBaseFare + $adtTaxFare + $adtTotalFare + $chdBaseFare + $chdTaxFare + $chdTotalFare + $infBaseFare + $infTaxFare + $infTotalFare;
        $params            = '';
        $params            = "currency_Notation=$currency_Notation&key=".KEY."&city1=$city1&city2=$city2&adults=$adults";
        if ($childs > 0)
        {
            $params .= "&childs= $childs";
        } //$childs > 0
        $params .= "&itinerary_id=$itinerary_id&pricekey=$pricekey&triptype=$triptype&trip1=$trip1&trip2=$trip2&trip3=$trip3&trip4=$trip4&tripCount=$tripCount&sessionId=$sessionId&sessionKey=$sessionKey&companyId=$companyId&accessId=$accessId&adtBaseFare=$adtBaseFare&adtTaxFare=$adtTaxFare&adtTotalFare=$adtTotalFare&username=" . USERNAME . "&password=" . PASSWORD;
        $url      = "http://dev.fareofficets.com/FareOfficets/BookFlightOnComponentXMLAPI.action?$params";
        $response = $this->getXmlInArray($url);
        return $response;
    }
    public function getBookingIntermediateResponse($postArray)
    {
        
		
		$key                = $postArray['key'];
        $city1              = $postArray['city1'];
        $sessionId          = $postArray['sessionId'];
        $sessionKey         = $postArray['sessionKey'];
        $companyId          = $postArray['companyId'];
        $accessId           = $postArray['accessId'];
        $currency_Notation  = $postArray['currency_Notation'];
        $adults             = $postArray['adults'];
        $childs             = ($postArray['childs']) ? $postArray['childs'] : 0;
        $infants            = ($postArray['infants']) ? $postArray['infants'] : 0;
        $countPackage       = $postArray['totalPackage'];
        $adtBaseFare        = $postArray['adtBaseFare'];
        $adtTaxFare         = $postArray['adtTaxFare'];
        $adtTotalFare       = $postArray['adtTotalFare'];
        $chdBaseFare        = $postArray['chdBaseFare'];
        $chdTaxFare         = $postArray['chdTaxFare'];
        $chdTotalFare       = $postArray['chdTotalFare'];
        $infBaseFare        = $postArray['infBaseFare'];
        $infTaxFare         = $postArray['infTaxFare'];
        $infTotalFare       = $postArray['infTotalFare'];
        $totalAmount        = $postArray['totalAmount'];
        //$adtTotalFare = $postArray['adtTotalFare'];
        $firstName          = rawurlencode($postArray['prim-firstName']);
        $sirName            = rawurlencode($postArray['prim-sirName']);
        $title              = $postArray['prim-Title'];
        $address            = rawurlencode($postArray['prim-address']);
        $pincode            = $postArray['prim-pincode'];
        $mailingAddress     = rawurlencode($postArray['prim-mailingAddress']);
        $comanyName         = rawurlencode($postArray['prim-comanyText']);
        $phone              = $postArray['prim-phone'];
        $mobile             = $postArray['prim-mobile'];
        $email              = $postArray['prim-email'];
        $vefifyemail        = $postArray['prim-vefifyemail'];
        $phone              = $postArray['prim-phone'];
        $mobile             = $postArray['prim-mobile'];
        $email              = $postArray['prim-email'];
        $vefifyemail        = $postArray['prim-vefifyemail'];
        $totAdults          = $postArray['adults'];
        $totChilds          = $postArray['childs'];
        $totInfants         = $postArray['infants'];
        $packCounter        = 0;
        $adultsDataPackage  = '';
        $childsDataPackage  = '';
        $infantsDataPackage = '';
        // If number of adults is greater than 0 we are calling a 'getPackageData', this function will return 'adultsData' and additional package list
        if ($adults > 0)
        {
            $adultsDataPackage = $this->getPackageData($postArray, 'adult', 'chkAdult', $adults, $adtTotalFare, 'adultsData');
        } //$adults > 0
        // If number of childs is greater than 0 we are calling a 'getPackageData', this function will return 'childsData' and additional package list
        if ($childs > 0)
        {
            $childsDataPackage = $this->getPackageData($postArray, 'child', 'chkChilds', $childs, $chdTotalFare, 'childsData');
        } //$childs > 0
        // If number of infants is greater than 0 we are calling a 'getPackageData', this function will return 'infants' and additional package list
        if ($infants > 0)
        {
            $infantsDataPackage = $this->getPackageData($postArray, 'infant', 'chkInfants', $infants, $infTotalFare, 'infantsData');
        } //$infants > 0
        //If SFPD is true
        $sfpdData             = $this->getSFPDData($postArray);
        //Primary Traveller Parameters
        $primaryPassagerParam = "firstname=$firstName&lastname=$sirName&title=$title&address=$address&postal=$pincode&address2=$mailingAddress&city_1=$city1&salTitle=Herr&phone=$phone&mobile=$mobile&email=$email&verifyemail=$vefifyemail&countryid=99&fee=0";
       echo $url                  = "http://dev.fareofficets.com/FareOfficets/bookingIntermediate.action?currency=$currency_Notation&sessionId=$sessionId&sessionKey=$sessionKey&companyId=$companyId&accessId=$accessId&" . $primaryPassagerParam . $adultsDataPackage . $childsDataPackage . $infantsDataPackage . "&totalAdult=$adults&totalChild=$totChilds&totalInfant=$infants&totalAmountOfTickets=$totalAmount&totalPrice=$totalAmount&username=" . USERNAME . "&password=" . PASSWORD . "$sfpdData";
        die;$response             = $this->getXmlInArray($url);
        return $response;
    }
    
	/**
     * getPackageData: This funciton is used to get adultsData, childsData, infantsData and additional package of all passanger
     * @param $postArray: POST data from the from
     * @param $category: the value will be 'adult', 'child', 'infant'
     * @param $checkBoxPackageField: additional package checkbox filed name
     * @param $categoryLength: Number of traveller for each category(Number of Adults, Number of Childs and Number of infants
     * @param $totalCategoryFare: Total fare for each category(Total Adults Fare, Total Childs Fare and Total Infants Fare
     * @param $urlParamName: the value of this parameter will be 'adultsData' or 'childsData' or 'infantsData'
     * @return a string 
     * 
     **/
    public function getPackageData($postArray, $category, $checkBoxPackageField, $categoryLength, $totalCategoryFare, $urlParamName)
    {
        $categoriesData        = '';
        $adultsData            = '';
        $travellerCategroyInfo = '';
        $packageLength         = $postArray['totalPackage'];
        for ($i = 0; $i < $categoryLength; $i++)
        {
            $additionalTravellerPackage = '';
            $nickName                   = rawurlencode($postArray['nickname' . $category . '_' . $i]);
            $lastName                   = rawurlencode($postArray['lastname' . $category . '_' . $i]);
            $title                      = rawurlencode($postArray['title' . $category . '_' . $i]);
            $prefSeat                   = isset($postArray['prefferedseating' . $category . '_' . $i]) ? $postArray['prefferedseating' . $category . '_' . $i] : '';
            $travellerCategroyInfo .= "nickname" . $category . "_$i=" . $nickName . "&lastname" . $category . "_$i=" . $lastName . "&title" . $category . "_$i=" . $title . "&prefferedseating" . $category . "_$i=" . $prefSeat . "&";
            $categoriesData = $nickName . '~' . $lastName . '~' . $title;
            if ($packageLength > 0)
            {
                for ($j = 0; $j < $packageLength; $j++)
                {
                    if (isset($postArray[$checkBoxPackageField . '_' . $i . '_' . $j]) && $postArray[$checkBoxPackageField . '_' . $i . '_' . $j] != '')
                    {
                        $chkCategory = str_replace("###", "<data>", $postArray[$checkBoxPackageField . '_' . $i . '_' . $j]);
                        $additionalTravellerPackage .= $chkCategory . '~';
                    } //isset($postArray[$checkBoxPackageField . '_' . $i . '_' . $j]) && $postArray[$checkBoxPackageField . '_' . $i . '_' . $j] != ''
                } //$j = 0; $j < $packageLength; $j++
            } //$packageLength > 0
            $categoriesDataParam = '';
            if ($additionalTravellerPackage != '')
            {
                $categoriesDataParam .= $categoriesData . "<separator>" . $additionalTravellerPackage . "<TA>" . $totalCategoryFare;
            } //$additionalTravellerPackage != ''
        } //$i = 0; $i < $categoryLength; $i++
        $url = '';
        if ($categoriesDataParam != '')
        {
            $url .= "&$urlParamName=$categoriesDataParam";
        } //$categoriesDataParam != ''
        if ($travellerCategroyInfo != '')
        {
            $travellerCategroyInfo = "&$travellerCategroyInfo";
            $travellerCategroyInfo = substr_replace($travellerCategroyInfo, "", -1);
            $url .= $travellerCategroyInfo;
        } //$travellerCategroyInfo != ''
        return $url;
    }
    /**
     * getSFPDData: If SFPD is avaialable, this function will return a string
     * @param $postArray: POST data from the from
     * @return $sfpdString:  a string 
     **/
    public function getSFPDData($postArray)
    {
        $genderAdultSFPD  = '';
        $dobAdultSFPD     = '';
        $genderChildSFPD  = '';
        $dobChildSFPD     = '';
        $genderInfantSFPD = '';
        $dobInfantSFPD    = '';
        $sfpdString       = '';
        if (isset($postArray['genderadult']) && count($postArray['genderadult']))
        {
            for ($i = 0; $i < count($postArray['genderadult']); $i++)
            {
                $genderAdultSFPD .= "&";
                $genderAdultSFPD .= "genderadult_$i=" . $postArray['genderadult'][$i];
            } //$i = 0; $i < count($postArray['genderadult']); $i++
        } //isset($postArray['genderadult']) && count($postArray['genderadult'])
        if (isset($postArray['birthdayadult']) && count($postArray['birthdayadult']))
        {
            for ($i = 0; $i < count($postArray['birthdayadult']); $i++)
            {
                $dobAdultSFPD .= "&";
                $dobAdultSFPD .= "birthdayadult_$i=" . $postArray['birthdayadult'][$i];
            } //$i = 0; $i < count($postArray['birthdayadult']); $i++
        } //isset($postArray['birthdayadult']) && count($postArray['birthdayadult'])
        if (isset($postArray['genderchild']) && count($postArray['genderchild']))
        {
            for ($i = 0; $i < count($postArray['genderchild']); $i++)
            {
                $genderChildSFPD .= "&";
                $genderChildSFPD .= "genderchild_$i=" . $postArray['genderchild'][$i];
            } //$i = 0; $i < count($postArray['genderchild']); $i++
        } //isset($postArray['genderchild']) && count($postArray['genderchild'])
        if (isset($postArray['birthdaychild']) && count($postArray['birthdaychild']))
        {
            for ($i = 0; $i < count($postArray['birthdaychild']); $i++)
            {
                $dobChildSFPD .= "&";
                $dobChildSFPD .= "birthdaychild_$i=" . $postArray['birthdaychild'][$i];
            } //$i = 0; $i < count($postArray['birthdaychild']); $i++
        } //isset($postArray['birthdaychild']) && count($postArray['birthdaychild'])
        if (isset($postArray['genderinfant']) && count($postArray['genderinfant']))
        {
            for ($i = 0; $i < count($postArray['genderinfant']); $i++)
            {
                $genderInfantSFPD .= "&";
                $genderInfantSFPD .= "genderinfant_$i=" . $postArray['genderinfant'][$i];
            } //$i = 0; $i < count($postArray['genderinfant']); $i++
        } //isset($postArray['genderinfant']) && count($postArray['genderinfant'])
        if (isset($postArray['birthdayinfant']) && count($postArray['birthdayinfant']))
        {
            for ($i = 0; $i < count($postArray['birthdayinfant']); $i++)
            {
                $dobInfantSFPD .= "&";
                $dobInfantSFPD .= "birthdayinfant_$i=" . $postArray['birthdayinfant'][$i];
            } //$i = 0; $i < count($postArray['birthdayinfant']); $i++
        } //isset($postArray['birthdayinfant']) && count($postArray['birthdayinfant'])
        $sfpdString = $genderAdultSFPD . $dobAdultSFPD . $genderChildSFPD . $dobChildSFPD . $genderInfantSFPD . $dobInfantSFPD;
        return $sfpdString;
    }
    /*
     * 
     */
    function getBookingConfirmationResponse($postArray)
    {
        $city1        = $postArray['city1'];
        $sessionId    = $postArray['sessionId'];
        $sessionKey   = $postArray['sessionKey'];
        $companyId    = $postArray['companyId'];
        $accessId     = $postArray['accessId'];
        $adtTotalFare = $postArray['adtTotalFare'];
        //$payment_method_type = $postArray['payment_method_type'];
        //$fee = $postArray['fee'];
        //$testFeesDes = $postArray['testFeesDes'];
        $latestTotal  = $postArray['totalAmount'];
        $paymentType  = $postArray['paymentType'];
        $transDate    = date("Y/m/d");
        $orderId      = $postArray['orderId'];
        if ($paymentType == '1') //DIBS
        {
            $url = ''; //DIBS
        } //$paymentType == '1'
        else if ($paymentType = "3")
        {
            $creditCardInfo = "&monthsList=59n+unXdkeA=&yearList=t2C2SJLfFos=&creditcardholder=nWhDSlybf5dzt2q9Ng8cLw==&creditcardno=OO9SnlcywRWgzxKD1bzxt0pM7WhSuJRV&cvc=J4X5irzEWSc=";
            $url            = "http://dev.fareofficets.com/FareOfficets/bookingConfirmation.action?sessionId=$sessionId&sessionKey=$sessionKey&companyId=$companyId&accessId=$accessId&payment_method_id=3&payment_method_type=Visa&fee=0&testFeesDes=PaygateTesting&latestTotal=$latestTotal&$creditCardInfo&username=" . USERNAME . "&password=" . PASSWORD . "";
        } //$paymentType == "3"
		
        $response = $this->getXmlInArray($url);
        return $response;
    }
    /*
     * 
     */
	
    public function getXmlInArray($url)
    {
        
		$xml = simplexml_load_file($url);
		
		echo $url;
		$xmlArray    = json_decode(json_encode($xml), 1);
        
		$errorMsg    = isset($xmlArray['ErrorMsg']) ? $xmlArray['ErrorMsg'] : '';
        $resultArray = array();
		
		
        if ($errorMsg == '')
        {
            $resultArray['response'] = 'sucess';
            $resultArray['data']     = $xmlArray;
        } //$errorMsg == ''
        else
        {
            $resultArray['response'] = 'faield';
            $resultArray['data']     = $xmlArray['ErrorMsg'];
        }
        /*}else
        {
        $resultArray['response'] = 'faield';
        $resultArray['data'] = "Unable to provide result";
        }*/
        return $resultArray;
    }
	
	/*
	 * 
	 */
	public function get_string_between($string, $start, $end){
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
	}
	
	
	
	public function getFormattedCity($cityCode)
	{
		$cityParam = '';
		if(isset($cityCode))
		{
			if (strlen($cityCode) > 3)
        	{
          		$cityParam = strtoupper($this->get_string_between($cityCode, '(', ')'));
			}
			else
			{
            	$cityParam = strtoupper($cityCode);
        	}
			
		}
		return $cityParam;
	}
}
/* End of file flyg.php */
/* Location: ./application/controllers/flyg.php */ 
