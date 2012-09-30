<?php
/**
 * Citygrid API Class
 *
 * @author     M Teguh A Suandi
 * @link       http://mtasuandi.wordpress.com
 * @license    http://creativecommons.org/licenses/by/3.0/
 *
 */
require_once('citygrid_api_request.php');

class CityGridAPI{

	private $api_key	= 'de33b4963d3147f80877393d1eb9475e';
	
	private function verifyResponse($response){
	
		if($response === False){
			
			throw new Exception("Coul not connect to YellowPages");
		}else{
			
			return ($response);
		}
	}
	
	private function queryCityGrid($api_uri, $api_by, $parameters){
	
		return citygrid_api_request($api_uri, $api_by, $parameters);
	}
	
	# Valid values for type (movie movietheater restaurant hotel travel barclub spabeauty shopping)
	# Valid values for where is A zip code, city-state pair, or street address (Spaces are optional following the comma between a city and state)
	public function getPlacesWhere($type, $what, $where, $publisher){
		
		$api_uri 		= 'places';
		$api_by			= 'where';
		$parameters		= array(	"type"		=>	$type,
									"what"		=> 	$what,
									"where"		=>	$where,
									"publisher"	=>	$publisher
								);
		$json_response 	= $this->queryCityGrid($api_uri, $api_by, $parameters);
		
		return $json_response;
	}
	
	# Valid values for type (movie movietheater restaurant hotel travel barclub spabeauty shopping)
	# Valid values for radius (Positive number between 0 and 50 inclusive)
	public function getPlacesLatLon($what, $type, $lat, $lon, $radius, $publisher){
		
		$api_uri 		= 'places';
		$api_by			= 'latlon';
		$parameters		= array(	"what"		=> 	$what,
									"type"		=>	$type,
									"lat"		=> 	$lat,
									"lon"		=>	$lon,
									"radius"	=>	$radius,
									"publisher"	=>	$publisher
								);
		$json_response 	= $this->queryCityGrid($api_uri, $api_by, $parameters);
		
		return $json_response;
	}
	
	# Valid value for where is A zip code, city-state pair, or street address (Spaces are optional following the comma between a city and state)
	# A date specified in ISO 8601 format (yyyy-mm-ddThh:mi or yyyy-mm-dd)
	# Valid values for type (percentoff free dollarsoff gift buy1get1 purchase other gift printablecoupon groupbuy dailydeal)
	public function getOffersWhere($type, $what, $where, $publisher){
		
		$api_uri 		= 'offers';
		$api_by			= 'where';
		$parameters		= array(	"what"				=>	$type,
									"where"				=> 	$what,
									"start_date"		=> 	$start_date,
									"expires_before"	=>	$expires_before,
									"type"				=>	$where,
									"publisher"			=>	$publisher
								);
		$json_response 	= $this->queryCityGrid($api_uri, $api_by, $parameters);
		
		return $json_response;
	}

	# Valid values for type (percentoff free dollarsoff gift buy1get1 purchase other gift printablecoupon groupbuy dailydeal)
	# Valid values for radius (Positive number between 0 and 50 inclusive)
	public function getOffersLatLon($what, $type, $lat, $lon, $radius, $publisher){
		
		$api_uri 		= 'offers';
		$api_by			= 'latlon';
		$parameters		= array(	"what"		=>	$what,
									"type"		=>	$type,
									"lat"		=> 	$lat,
									"lon"		=>	$lon,
									"radius"	=>	$radius,
									"publisher"	=>	$publisher
								);
		$json_response 	= $this->queryCityGrid($api_uri, $api_by, $parameters);
		
		return $json_response;
	}

	# Valid value for where is A zip code, city-state pair, or street address (Spaces are optional following the comma between a city and state)
	public function getReviewsWhere($where, $what, $publisher){
		
		$api_uri 		= 'reviews';
		$api_by			= 'where';
		$parameters		= array(	"where"				=> 	$where,
									"what"				=>	$what,
									"publisher"			=>	$publisher
								);
		$json_response 	= $this->queryCityGrid($api_uri, $api_by, $parameters);
		
		return $json_response;
	}

	# Valid values for type (percentoff free dollarsoff gift buy1get1 purchase other gift printablecoupon groupbuy dailydeal)
	# Valid values for radius (Positive number between 0 and 50 inclusive)
	public function getReviewsLatLon($what, $lat, $lon, $radius, $publisher){
		
		$api_uri 		= 'reviews';
		$api_by			= 'latlon';
		$parameters		= array(	"what"		=>	$what,
									"lat"		=> 	$lat,
									"lon"		=>	$lon,
									"radius"	=>	$radius,
									"publisher"	=>	$publisher
								);
		$json_response 	= $this->queryCityGrid($api_uri, $api_by, $parameters);
		
		return $json_response;
	}	
}