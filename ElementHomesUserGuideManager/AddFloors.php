
<html>
    <head>
        <title>Add Floors</title>
    </head>
<body>

    <?php

    include_once("el_SQLiteInteraction.php");

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
                $floorID = $ret["rowid"];

            }
            else
            {
                $floorNameErr="Unable to create floor./n".$ret["error"];
                $floorID="";
            }
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function insertFloor($name)
    {
        $sql = "Insert into floors(floorName) values(".$name.");";
        $result=$wvdb->exec($sql);
        var_dump($result);
		if(!$result){
            retval['success'] = 'false';
            retval['error'] = $wvdb->lastErrorMsg;
        }
        else
        {
            retval['success'] = 'true';
            retval['rowid'] = $wvdb->lastInsertRowID;
        }
        return $retval;  
    }

    ?>

   
</body>
</html>