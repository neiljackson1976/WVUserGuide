
<html>
<head>
    <title>Add Locations</title>
</head>
<body>

    <?php

    include_once("Configure.php");

    // define variables and set to empty values
    $locationDescriptionErr = "";
    $locationDescription = "";
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