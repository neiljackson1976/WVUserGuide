
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Add Rooms</title>
    <?php
        include_once "Configure.php";
        global $wvdb;

        $floorresult = $wvdb->query('SELECT * FROM Floors ORDER BY FloorLevel;');
        $floors = array();
        while($flres = $floorresult->fetchArray(SQLITE3_ASSOC)) {
            $floors[$flres['FloorID']] = $flres['FloorName'];
        }

        $locationresult = $wvdb->query('SELECT * FROM Locations ORDER BY LocationID;');
        $locations = array();
        while($locres = $locationresult->fetchArray(SQLITE3_ASSOC)) {
            $locations[$locres['FloorID']] = $locres['FloorName'];
        }


        $roomNameErr = "";
        $roomName = "";
        $roomID = "";
        $floorIDErr = "";
        $locationIDErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
            if (empty($_POST["roomName"])) {
                $roomNameErr = "Room Name is required";
            }
            elseif (empty($_POST["floorID"]) or $_POST["floorID"]==-1){
                $floorIDErr = "Choose a floor";
            }

            else {
                $roomName = test_input($_POST["roomName"]);
                $floorID = test_input($_POST["floorID"]);
                $locationID = test_input($_POST["locationID"]);

                $ret=insertRoom($roomName,$floorID,$locationID);
                if($ret["success"])
                {
                    $roomID = $ret["rowid"];
                    header('Location: IndexRooms.php?id='.$roomid);
                    die();
                }
                else
                {
                    $roomNameErr="Unable to create room./n".$ret["error"];
                    $roomID="";
                }
            }
            echo "Room add failed: ".$roomNameErr;
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function insertRoom($name,$floor,$location)
        {
            global $wvdb;
            $sql = "Insert into rooms(RoomName,FloorID, LocationID) values(:name,:floor,:location);";
            $stmt=$wvdb->prepare($sql);
            $stmt->bindValue(':name',$name,SQLITE3_TEXT);
            $stmt->bindValue(':floor',$floor,SQLITE3_TEXT);
            $stmt->bindValue(':location',$location,SQLITE3_TEXT);
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
</head>
<body>

    <a href="indexrooms.php">Manage Rooms</a>
    <br />
    <br />

    <form action="AddRooms.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Room Name</td>
                <td>
                    <input type="text" name="roomName" />
                </td>
                <td style="color:red">
                    <?php
                    global $roomNameErr;
                        echo $roomNameErr;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Floor Name</td>
                <td>
                    <select name='floorID' onchange="this.form.submit();">
                        <option value='-1'>Select...</option>
                        <?php
                        global $floors;
                        foreach($floors as $key => $value)
                            echo "<option value='".$key."'>".$value."</option>";
                        ?>
                    </select>
                </td>
                <td style="color:red">
                    <?php
                    global $floorIDErr;
                    echo $floorIDErr;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Location Description</td>
                <td>
                    <select name='locationID' onchange="this.form.submit();">
                        <option value='-1'>Select...</option>
                        <?php
                        global $locations;
                        foreach($locations as $key => $value)
                            echo "<option value='".$key."'>".$value."</option>";
                        ?>
                    </select>
                </td>
                <td style="color:red">
                    <?php
                    global $locationIDErr;
                    echo $locationIDErr;
                    ?>
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
</body>
</html>