
<html>
<head>
    <title>Add Locations</title>
</head>
<body>
    <?php

    include_once("Configure.php");
    global $wvdb;

    $floorplanres = $wvdb->query("SELECT * FROM FloorPlans ORDER BY FloorPlanID");
    $floorplanarray = array() ;

    ?>
    <a href="indexlocations.php">Manage Locations</a>
    <br />
    <br />

    <form action="AddLocations.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Location Description</td>
                <td>
                    <input type='text' name='locationDescription'/>
                </td>
            </tr>
            <tr>
                <td>Floor Plan</td>
                <td>
                    <select name='floorPlan'>
                        <option value='-1'>Select...</option>
                        <?php
                            
                        global $floorplanres;
                        global $floorplanarray;
                        while($plan = $floorplanres->fetchArray(SQLITE3_ASSOC)) {
                            $planid = $plan['FloorPlanID'];
                            echo "<option value='".$planid."'>".$plan['FloorPlanName']."</option>";
                            $floorplanarray[$planid] = $plan['FloorPlanFile'];
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Plan</td>
                <td>
                        
                        <?php
                        global $floorplanarray;
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['floorPlan'])) {
                            $planid = $_POST['floorPlan'];
                            global $__builder_floorplan_folder;
                            $planfile = $__builder_floorplan_folder."/".pathinfo($floorplanarray[$planid],PATHINFO_BASENAME);
                            echo "<input type='image' alt=' Finding coordinates of an image' src='".$planfile."' name='foo' style=cursor:crosshair; />";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>Location X</td>
                <td>
                    <input type="text" name="locationX" />
                </td>
            </tr>
            <tr>
                <td>Location Y</td>
                <td>
                    <input type="text" name="locationY" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Submit" value="Add" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    // define variables and set to empty values
    $locationDescriptionErr = "";
    $locationDescription = "";
    $floorPlanID="";
    $locationX = "";
    $locationY = "";
    $locationID = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
        if (empty($_POST["locationDescription"])) {
            $floorNameErr = "Location Description is required";
        }
        else {
            $locationDescription = test_input($_POST["locationDescription"]);
            $locationX = test_input($_POST["locationX"]);
            $ret=insertLocation($locationDescription,$locationX,locationY);
            if($ret["success"])
            {
                $URL = "IndexLocations.php";
                $locationID = $ret["rowid"];
					$URL.="?ID=".$locationID;
                header("Location: $URL");
                die();
            }
            else
            {
                $locationDescriptionErr="Unable to create location.\n".$ret["error"];
                $locationID="";
            }
        }
        echo "Location add failed: ".$locationDescriptionErr;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function insertLocation($description,$X,$Y)
    {
        global $wvdb;
        $sql = "Insert into locations(locationDescription,locationX,locationY) values(:description,:x,:y);";
        $stmt=$wvdb->prepare($sql);
        $stmt->bindValue(':description',$description,SQLITE3_TEXT);
        $stmt->bindValue(':x',$X,SQLITE3_INTEGER);
        $stmt->bindValue(':y',$Y,SQLITE3_INTEGER);
        if(!$stmt->execute()){
            $retval['success'] = false;
            //check the error code for unique index violation.  Check whether last error message is function or propertgy.
            $retval['error'] = $wvdb->lastErrorMsg;
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