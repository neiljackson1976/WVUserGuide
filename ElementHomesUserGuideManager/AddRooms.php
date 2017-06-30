
<html>
    <head>
        <title>Add Rooms</title>
    </head>
<body>

    <?php

    include_once("el_SQLiteInteraction.php");

    // define variables and set to empty values
    $roomNameErr = "";
    $roomName = "";
    $roomID = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
        if (empty($_POST["roomName"])) {
            $roomNameErr = "Room Name is required";
        }
        else {
            $roomName = test_input($_POST["roomName"]);
            $ret=insertRoom($roomName);
            if($ret["success"])
            {
                $roomID = $ret["rowid"];

            }
            else
            {
                $roomNameErr="Unable to create room./n".$ret["error"];
                $roomID="";
            }
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function insertRoom($name)
    {
        global $wvdb;
        $sql = "Insert into rooms(RoomName) values(:name);";
        $stmt=$wvdb->prepare($sql);
        $stmt->bindValue(':name',$name,SQLITE3_TEXT);
        $stmt->execute();

        var_dump($stmt);
		if(!$stmt){
            $retval['success'] = false;
            $retval['error'] = $wvdb->lastErrorMsg;
        }
        else
        {
            $retval['success'] = true;
            $retval['rowid'] = $wvdb->lastInsertRowID;
        }
        return $retval;
    }

    ?>

   
</body>
</html>