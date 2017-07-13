<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    	<title>Add Room</title>
	</head>
	<body>
 	   	<a href="indexrooms.php">Manage Rooms</a>
   	 	<br /><br />
    <form action="AddComponentGroup.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Component Group Name</td>
                <td><input type="text" name="ComponentGroupName"
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ComponentGroupName'])) {
    	echo 'value="'.$_POST['ComponentGroupName'].'"';                    	
				} ?>
		></td>
            </tr>
				<tr>
                <td>Description</td>
                <td><input type="text" name="ComponentGroupDescription"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
		
	
	<?php
	//ComponentGroupID integer PRIMARY KEY, ComponentGroupName text, ComponentGroupDescription text
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ComponentGroupName'])) {
   		if (empty($_POST["ComponentGroupName"])) {
            $componentGroupNameErr = "Component Group Name is required";
        }
        else {
            $componentGroupName = test_input($_POST["ComponentGroupName"]);
            $componentGroupDescription = test_input($_POST["ComponentGroupDescription"]);
            $ret=insertComponentGroup($componentGroupName,$componentGroupDescription);
            if($ret["success"])
            {
                $URL = "IndexComponentGroups.php";
                $componentGroupID = $ret["rowid"];
                $URL.="?ID=".$componentGroupID;
                header("Location: $URL");
                die();
            }
            else
            {
                $componentGroupNameErr="Unable to create floor./n".$ret["error"];
                $componentGroupID="";
            }
        }
        echo "Component Group add failed: ".$componentGroupNameErr;
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

