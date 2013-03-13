<?php
/*$dbhost='localhost';
$dbuser='root';
$dbuserpass='';
$dbname='travelsolutions-rcg';
*/

$dbhost='myprojectsdb.db.9563307.hostedresource.com';
$dbuser='myprojectsdb';
$dbuserpass='W2PQFVW@IciG';
$dbname='myprojectsdb';

$link_id = mysql_connect ($dbhost, $dbuser, $dbuserpass);
if (!mysql_select_db($dbname)) die(mysql_error());

if(isset($_REQUEST['city'])){ 
	//header('content-type:text/html;charset=utf-8');
	//$q = utf8_decode($_GET['term']);
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("SET collation_connection = 'utf8_general_ci'");
	$city = $_REQUEST['city'];
	
	/*$searchQuery = mysql_query("select pc.Country, pc.Location, pc.Name, cc.CountryName  from prefix2012_1_unlocode_codelist pc left join prefixcountrycodes cc on pc.Country=cc.CountryCode where  Functions like '%4%' and (pc.Location like '$city%' or pc.Name like '$city%' or cc.CountryName LIKE '$city%')") or die(mysql_error());
	*/
	/*
	$searchQuery = mysql_query("SELECT air.airportname, air.airportcode, ci.cityname FROM airport as air 
								LEFT JOIN city as ci ON ci.citycode = air.referencecity
								WHERE (air.airportname LIKE '$city%') OR (ci.cityname LIKE '$city%') LIMIT 0, 50");
	*/
	$searchQuery = mysql_query("SELECT air.airportname, air.airportcode, ci.cityname FROM airport as air 
								LEFT JOIN city as ci ON ci.citycode = air.referencecity
								WHERE ci.cityname LIKE '$city%'");
	
	$row = array();
	while($hits = mysql_fetch_assoc($searchQuery)){
		//$row[] = $hits['cityname'].', '.$hits['citycode'];
		$row[] = cleanText($hits['airportname']).'('.cleanText($hits['airportcode']).'), '.$hits['cityname'].'';
	}
	
	echo json_encode($row);
}

function cleanText($str){
$str = str_replace("Ñ" ,"&#209;", $str);
$str = str_replace("ñ" ,"&#241;", $str);
$str = str_replace("ñ" ,"&#241;", $str);
$str = str_replace("Á","&#193;", $str);
$str = str_replace("á","&#225;", $str);
$str = str_replace("É","&#201;", $str);
$str = str_replace("é","&#233;", $str);
$str = str_replace("ú","&#250;", $str);
$str = str_replace("ù","&#249;", $str);
$str = str_replace("Í","&#205;", $str);
$str = str_replace("í","&#237;", $str);
$str = str_replace("Ó","&#211;", $str);
$str = str_replace("ó","&#243;", $str);
$str = str_replace("“","&#8220;", $str);
$str = str_replace("”","&#8221;", $str);
$str = str_replace("‘","&#8216;", $str);
$str = str_replace("’","&#8217;", $str);
$str = str_replace("—","&#8212;", $str);
$str = str_replace("–","&#8211;", $str);
$str = str_replace("™","&trade;", $str);
$str = str_replace("ü","&#252;", $str);
$str = str_replace("Ü","&#220;", $str);
$str = str_replace("Ê","&#202;", $str);
$str = str_replace("ê","&#238;", $str);
$str = str_replace("Ç","&#199;", $str);
$str = str_replace("ç","&#231;", $str);
$str = str_replace("È","&#200;", $str);
$str = str_replace("è","&#232;", $str);
$str = str_replace("•","&#149;" , $str);
$str = str_replace("¼","&#188;" , $str);
$str = str_replace("½","&#189;" , $str);
$str = str_replace("¾","&#190;" , $str);
$str = str_replace("½","&#189;" , $str);

return $str;
}
?>