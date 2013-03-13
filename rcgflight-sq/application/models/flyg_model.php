<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flyg_model extends CI_Model {

    function __construct()
    {
		parent::__construct();
    }

    function getCarrierNameFromCarrierCode($carrierCode)
	{
		$this->db->select('carrier_name');
		$this->db->from('carrier');
		$this->db->where("carrier_code = '$carrierCode'");
		$this->db->order_by("carrier_name", "ASC");
		$query = $this->db->get();
		$results = '';
		if ($query->num_rows() > 0)
		{
			$results = $query->result_array();
			$results = $results[0]['carrier_name'];
		    return $results;
		}
		
	}
	
	
	function getAirportCityName($airportCode)
	{
		$this->db->select('cityname, airportname, airportcode');
		$this->db->from('city ci');
		
		$this->db->join('airport air', 'air.referencecity = ci.citycode', 'left');
		$this->db->where("air.airportcode = '$airportCode'");
		
		$query = $this->db->get();
		$results = '';
		if ($query->num_rows() > 0)
		{
			$results = $query->result_array();
			$cityName = $results[0]['cityname'];
		    $airportcode = $results[0]['airportcode'];
			$airportname = $results[0]['airportname'];
			$results['city'] = $cityName;
			$results['airportname'] = $airportname.'('.$airportcode.')';
			
		}
		return $results;
		
	}
	
	
	function getAirportNameFromCode($code)
	{
		$this->db->select('Name');
		$this->db->from('prefix2012_1_unlocode_codelist');
		$this->db->where("Location = '$code'");
		$this->db->like('Functions', '4');  
		$query = $this->db->get();
		$results = '';
		if ($query->num_rows() > 0)
		{
			$results = $query->result_array();
			$results = $results[0]['Name'];
		    return $results;
		}
	}
	
	function getCarrierList()
	{
		$this->db->select('carrier_name, carrier_code');
		$this->db->from('carrier');
		//$this->db->where("Location = '$code'");
		//$this->db->like('Functions', '4');  
		$query = $this->db->get();
		$results = '';
		if ($query->num_rows() > 0)
		{
			$results = $query->result_array();
			
		}
		return $results;
	}
	
	 
 }

/* End of file flyg_model.php */
/* Location: ./application/model/flyg_model.php */
?>