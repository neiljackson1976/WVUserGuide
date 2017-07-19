<?php
	
	include_once("Configure.php");
	
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Submit"])) {
	//this bit is for once we have set the amendment	

	$DetailTypeErr = "";
	$DetailTextErr = "";
	if(!isset($_POST['DetailName'])) $DetailTypeErr = "Detail Type Is Needed";
   	if(!isset($_POST['DetailText'])) $DetailTextErr = "Detail Text Is Needed";
   


	}

	if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
   		$getErr = "";
		if(!isset($_GET['DetailType'])) {
			$getErr = "Invalid Detail Type - click here to go back";
		}
		else{
			$DetailType = $_GET['DetailType'];
			
		}	
	
	
		$valtext = CheckDetailName($DetailType);
		if($valtext[0]){
			global $wvdb;
			$stmt = $wvdb->prepare("Select HouseDetailID, HouseDetailType, HouseDetailText FROM HouseDetails WHERE HouseDetailType=:hd");
			$stmt->bindValue(":hd",$DetailType);
			$res = $stmt->execute();
			//now populate the page with updatable form


			
		}	
		else
		{	
			//put something in here to let the user know we have a problem
		}
	}



	function CheckDetailName($detailtype){
	
		global $wvdb;
		$stmt = $wvdb->prepare("Select count(DetailText) as detcount From HouseDetails Where DetailType=:dn");
		$stmt->bindValue(":dn",$detailtype);
		$res = $stmt->execute();

		//this bit needs to return the count.  lets see how to do that later.
		$cnt_details = $res["detcount"];
		$success = array();
		if($cnt_details==0){
			$success = [false,"There are no details with this type in the database."];
		}
		elseif($cnt_details>1){
			$success = [false,"Something has gone wrong.  There is more than one detail with this type in the database.  This could cause conflicting results"];
		}
		else{
            $success = [true,"There is a detail with this type in the database."];
		}
		return $success;
	}
?>