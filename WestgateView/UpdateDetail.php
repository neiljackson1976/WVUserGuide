<?php
	include_once("Configure.php");
	if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
   		$getErr = "";
		if(!isset($_GET['DetailName'])) {
			$getErr = "Invalid Detail Name - click here to go back";
		}
		else{
			$DetailName = $_GET['DetailName'];
			
		}	
	}
	
	$DetailNameErr = "";
	$DetailTextErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST" {
		if(!isset($_POST['DetailName'])) $DetailTextErr = "Detail Name Is Needed";
   		if(!isset($_POST['DetailText'])) $DetailTextErr = "Detail Text Is Needed";
   
	}

	function CheckDetailName($detailname){
	
		global $wvdb;
		$stmt = $wvdb->prepare("Select count(DetailText) as detcount From HouseDetails Where DetailName=:dn");
		$stmt->bindValue(":dn",$detailname);
		$res = $stmt->execute();
		//this bit needs to return the count.  lets see how to do that later.
		$cnt_details = $res["detcount"];
		$success = array();
		if(cnt_details==0){
			$success = [false,"There are no details with this name in the database."];
		}
		elseif(cnt_details>1){
			$success = [false,"Something has gone wrong.  There is more than one detail with this name in the database.  This could cause conflicting results"];
		}
		else{			$success = [true,"There is a detail with this name in the database."];
		}
		return $success;
	}
?>