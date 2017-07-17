
<html>
    <head>
        <title>Add Floorplans</title>
    </head>
<body>

    <?php


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
        global $__client_floorplan_folder;
        $filefilters = array("png","gif","jpg","jpeg");
		$targetfile = $__client_floorplan_folder."/".$name.".".pathinfo($file["name"],PATHINFO_EXTENSION);
        //if file already in floorplan folder, use filename;

        while(file_exists($targetfile)){
            $targetfile=$__client_floorplan_folder."/".pathinfo($targetfile,PATHINFO_FILENAME)."_.".pathinfo($targetfile,PATHINFO_EXTENSION);

        }

            //otherwise copy file to folder and use that filename -- ensuring the address is relative to the site, not the site builder;
        $uploadsuccess = UploadFiles("floorPlanFile",$targetfile,$filefilters,50000);

        if($uploadsuccess->success){
            //copy file to local folder
            global $__builder_floorplan_folder;
            $buildertargetfile = $__builder_floorplan_folder."/".pathinfo($targetfile,PATHINFO_BASENAME);
            $buildertargetfile = ltrim($buildertargetfile,"/");
            $copyres = copy($targetfile,$buildertargetfile);

            $sql = "Insert into floorPlans(floorPlanName,floorPlanFile) values(:name,:file);";
            $stmt=$wvdb->prepare($sql);
            $stmt->bindValue(':name',$name,SQLITE3_TEXT);
		    $stmt->bindValue(':file',$targetfile,SQLITE3_TEXT);

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
        }
        return $retval;
    }

    ?>

   
</body>
</html>