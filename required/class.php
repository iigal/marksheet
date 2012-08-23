<?PHP
	//Connect to the database
	session_start();

	// get user IP
	function GetUserIP() {
          if (isset($_SERVER)) { if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) 
                                    { $ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; } 
                                 elseif(isset($_SERVER["HTTP_CLIENT_IP"])) 
                                    { $ip = $_SERVER["HTTP_CLIENT_IP"]; } 
                                 else { $ip = $_SERVER["REMOTE_ADDR"]; }
                               }  
          else { if ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) 
                      { $ip = getenv( 'HTTP_X_FORWARDED_FOR' ); } 
                 elseif ( getenv( 'HTTP_CLIENT_IP' ) ) 
                      { $ip = getenv( 'HTTP_CLIENT_IP' ); } 
                 else { $ip = getenv( 'REMOTE_ADDR' ); }
               }
          return $ip;     
    }  
	
	

   function stringsplit($the_string, $the_number)  {
	        $startoff_nr = 0;
            $the_output_array = array();
            for($z = 1; $z < ceil(strlen($the_string)/$the_number)+1 ; $z++) {
	           $startoff_nr = ($the_number*$z)-$the_number;
               $the_output_array[] = substr($the_string, $startoff_nr, $the_number);
            }
            return($the_output_array);
   }
   
   function CheckBox($check) {
        // returns 1 if checkbox is checked or 0 if unchecked
	    if ($check == "on") { return 1; }
        else { return 0; }
    }
	
	
	function checkRequiredPost($requiredField) {
	$numRequired = count($requiredField);
	$keys        = array_keys($_POST);
	
	$allFieldExist  = true;
	for ($i = 0; $i < $numRequired && $allFieldExist; $i++) {
		if (!in_array($requiredField[$i], $keys) || $_POST[$requiredField[$i]] == '') {
			$allFieldExist = false;
		}
	}
	
	return $allFieldExist;
}
	
	function refresh($url){?>
			<html><head><META HTTP-EQUIV="Refresh" CONTENT="0; URL=<?PHP echo $url;?>"></head></html>
			<?PHP 
	}
	

?>	