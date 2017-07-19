<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    	<title>Add House Detail</title>
	</head>
	<body>
 	   	<a href="indexhousedetails.php">Manage House Details</a>
   	 	<br /><br />
    <form action="AddHouseDetails.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>House Detail Type</td>
                <td>
						<input type="text" name="HouseDetailType"
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['HouseDetailType'])) {
    							echo 'value="'.$_POST['HouseDetailType'].'"';} 
							?>
						>
					</td>
            	</tr>
				<tr>
                <td>House Detail Text</td>
                <td>
						<input type="text" name="HouseDetailText"
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['HouseDetailText'])) {
    							echo 'value="'.$_POST['HouseDetailText'].'"';} 
							?>
						>
					</td>
            </tr>
				
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
		
	
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
   		if (empty($_POST["HouseDetailType"])) {
            $houseDetailTypeErr = "House detail type is required";
        }
		elseif(empty($_POST["HouseDetailType"])){
				$houseDetailTypeErr = "House detail text is required";
			}
        else {
            $houseDetailType = test_input($_POST["HouseDetailType"]);
            $houseDetailText = test_input($_POST["HouseDetailText"]);
            $ret=insertHouseDetail($houseDetailType,$houseDetailText);
            if($ret["success"])
            {
                $URL = "IndexHouseDetails.php";
                $houseDetailID = $ret["rowid"];
                $URL.="?ID=".$houseDetailID;
                header("Location: $URL");
                die();
            }
            else
            {
                $houseDetailTypeErr="Unable to create floor.\n".$ret["error"];
                $houseDetailID="";
            }
        }
        echo "House Detail add failed: ".$houseDetailTypeErr;
	}
	?>
	</body>
</html>
	<?php

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	function InsertComponentGroup($GroupName,$GroupDescription){
		  global $wvdb;
        $sql = "Insert into ComponentGroups(componentGroupName,componentGroupDescription) values(:name,:description);";
        $stmt=$wvdb->prepare($sql);
        $stmt->bindValue(':name',$GroupName,SQLITE3_TEXT);
		  $stmt->bindValue(':description',$GroupDescription,SQLITE3_TEXT);



        if(!$stmt->execute()){
            $retval['success'] = false;
				//check the error code for unique index violation.  Check whether last error message is function or propertgy.
				if($wvdb->lastErrorCode==-1){
				$retval['error'] = "A component group with this description already exists.  Amend that one first.";}
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

