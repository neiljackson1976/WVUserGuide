<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    	<title>Add Component</title>
	</head>
	<body>
	<?php
		include_once("Configure.php");
		global $wvdb;
      	$sql = "Select ComponentGroupID, ComponentGroupName From ComponentGroups ORDER BY ComponentGroupName;";
      $res=$wvdb->query($sql);
		$cgarray = array();
		while($cg = $res->fetchArray(SQLITE3_ASSOC)) {
                            $cgarray[$cg['ComponentGroupID']] = $cg['ComponentGroupName'];
                        }
		$cgarray = asort($cgarray);
		$sql = "Select LocationID, LocationDescription,FloorPlanID,LocationX,LocationY From Locations ORDER BY ComponentGroupName;";
      $locres=$wvdb->query($sql);
		$locarray = array();
		while($loc = $locres->fetchArray(SQLITE3_ASSOC)) {
                            $locarray[$loc['LocationID']] = $cg['LocationDescription'];
                        }
		

	?>
 	   	<a href="indexcomponents.php">Manage Components</a>
   	 	<br /><br />
    <form action="AddComponent.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Component Name</td>
                <td><input type="text" name="ComponentName"
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ComponentGroupName'])) {
    	echo 'value="'.$_POST['ComponentName'].'"';                    	
				} ?>
		></td>
            </tr>
				<tr>
                <td>Component Group</td>
                <td>
						<select name='ComponentGroupID' onchange="this.form.submit();">
                        <option value='-1'>Select...</option>
                        <?php
									global $cgarray;
									$selectedcg=-1;
									if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ComponentGroupID'])) {
    	
									$selectedcg=$_POST['ComponentGroupID'];									} 
									foreach($cgarray as $cgid=>$cgname){
										$selectedstring=$selectedcg==$cgid?" selected=selected":"";

										echo "<option value='".$cgid.$selectedstring"'>".$cgname."</option>";
                        
									}
								?>
						</select>
					</td>
            </tr>
				
				<tr>
                <td>Location</td>
                <td>
						<select name='LocationID' onchange="this.form.submit();">
                        <option value='-1'>Select...</option>
                        <?php
									global $locarray;
									$selectedloc=-1;
									if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['LocationID'])) {
    	
									$selectedcg=$_POST['LocationID'];									} 
									foreach($locarray as $locid=>$locname){
										$selectedstring=$selectedloc==$locid?" selected=selected":"";

										echo "<option value='".$locid.$selectedstring"'>".$locname."</option>";
                        
									}
								?>
							</select>
					</td>
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

