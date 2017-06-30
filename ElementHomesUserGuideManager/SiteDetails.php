<?php

include_once("Configure.php");

$sitedetails = new SiteDetails();
$sitename = "";

class SiteDetails
{
	function __construct(){
		
		global $wvdb;
		//check whether site is configured in the database
		$result = $wvdb->query("SELECT * FROM SiteDetails");
		
		
		
		//if not - get details from the user
		if(!result)
		{
						
		}
		//otherwise - persist details
		else
		{
			
		}

	}

}

?>