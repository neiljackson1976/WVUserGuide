
<html>
    <head>
        <title>Add Floorplans</title>
    </head>
<body>

    <?php
$sql = "CREATE TABLE IF NOT EXISTS FloorPlans(FloorPlanID integer PRIMARY KEY, FloorPlanName text, FloorPlanFile text);";


    include_once("Configure.php");
    include_once("UploadFiles.php");

    // define variables and set to empty values
    $floorPlanNameErr = "";
    $floorPlanName = "";
    $floorPlanID = "";
	$floorPlanFile = "";



    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
        if (empty($_POST["floorPlanName"])) {
            $floorPlanNameErr = "Floor Plan Name is required";
        }
        else {
            $floorPlanName = test_input($_POST["floorPlanName"]);
            $floorPlanFile = $_FILES["floorPlanFile"];
            $ret=insertFloorPlan($floorPlanName, $floorPlanFile);
            if($ret["success"])
            {
                $URL = "IndexFloorPlans.php";
                $floorPlanID = $ret["rowid"];
                $URL.="?id=".$floorPlanID;
                header("Location: $URL");
                die();
            }
            else
            {
                $floorPlanNameErr="Unable to create floor./n".$ret["error"];
                $floorPlanID="";
            }
        }
        echo "Floorplan add failed: ".$floorPlanNameErr;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function insertFloorPlan($name,$file)
    {
        global $wvdb;
			global $__floorplan_folder;
            $filefilters = array("png","gif","jpg","jpeg");
			alert("need to copy to floorplan folder");
			//if file already in floorplan folder, use filename;
            if(file_exists($_FILES["fileToUpload"]))

			//otherwise copy file to folder and use that filename -- ensuring the address is relative to the site, not the site builder;
            $uploadsuccess = UploadFiles($__floorplan_folder,basename($_FILES["fileToUpload"]["name"]),$filefilters,50000);

            $sql = "Insert into floorPlans(floorPlanName,floorPlanFile) values(:name,:file);";
        $stmt=$wvdb->prepare($sql);
        $stmt->bindValue(':name',$name,SQLITE3_TEXT);
		  $stmt->bindValue(':file',$file,SQLITE3_INTEGER);



        if(!$stmt->execute()){
            $retval['success'] = false;
				//check the error code for unique index violation.  Check whether last error message is function or propertgy.
				if($wvdb->lastErrorCode==-1){
				$retval['error'] = "A floor with this Floor Level ID already exists.  Amend that one first.";}
				else{
            $retval['error'] = $wvdb->lastErrorMsg;
				}
        }
        else
        {
            $retval['success'] = true;
            $retval['rowid'] = $wvdb->lastInsertRowID();
        }
        return $retval;
    }

    ?>

   
</body>
</html>