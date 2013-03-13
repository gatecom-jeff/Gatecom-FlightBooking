<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locations_model extends CI_Model {

    function __construct()
    {
		parent::__construct();
    }

    function isCorrectUser($email, $password)
    {
		$city = $_POST['city'];
		$searchQuery = mysql_query("SELECT * FROM city WHERE cityname LIKE '%$city%'") or die(mysql_error());
	
		while($hits = mysql_fetch_assoc($searchQuery)){
				
			$row[] = $hits['cityname'].', '.$hits['citycode'];
		}
		
		echo json_encode($row);
    }
	
	 
 }

/* End of file locations.php */
/* Location: ./application/model/locations_model.php */
?>