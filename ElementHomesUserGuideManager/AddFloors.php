
<html>
    <head>
        <title>Add Floors</title>
    </head>
<body>

    <?php

    include_once("Configure.php");

    // define variables and set to empty values
    $floorNameErr = "";
    $floorName = "";
    $floorID = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
        if (empty($_POST["floorName"])) {
            $floorNameErr = "Floor Name is required";
        }
        else {
            $floorName = test_input($_POST["floorName"]);
            $ret=insertFloor($floorName);
            if($ret["success"])
            {
                $URL = "IndexFloors.php";
                $floorID = $ret["rowid"];
                header("Location: $URL");
                die();
            }
            else
            {
                $floorNameErr="Unable to create floor./n".$ret["error"];
                $floorID="";
            }
        }
        echo "Floor add failed: ".$floorNameErr;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function insertFloor($name)
    {
        global $wvdb;
        $sql = "Insert into floors(floorName) values(:name);";
        $stmt=$wvdb->prepare($sql);
        $stmt->bindValue(':name',$name,SQLITE3_TEXT);


        if(!$stmt->execute()){
            $retval['success'] = false;
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