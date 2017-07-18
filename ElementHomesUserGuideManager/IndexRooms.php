<?php
//including the database connection file
include_once("Configure.php");

global $wvdb;
$result = $wvdb->query('SELECT r.RoomID, r.RoomName, f.FloorName, l.LocationDescription FROM Rooms as r inner join Floors as f on r.FloorID = f.FloorID inner join Locations as l on r.LocationID = l.LocationID ORDER BY RoomID;');
$roomid = $_GET['id'];
?>

<html>
<head>
    <title>Rooms</title>
</head>

<body>
    <a href="AddRooms.php">Add New Room</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Room ID</td>
            <td>Room Name</td>
            <td>Floor Name</td>
            <td>Location Description</td>

        </tr>
        <?php
        while($res = $result->fetchArray(SQLITE3_ASSOC)) {
            if($roomid==$res['RoomID']){
                echo "<tr class='highlight'>";
            }
            else{echo "<tr>";}
            echo "<td>".$res['RoomID']."</td>";
            echo "<td>".$res['RoomName']."</td>";
            echo "<td>".$res['FloorName']."</td>";
            echo "<td>".$res['LocationDescription']."</td>";

            echo "<td><a href=\"edit.php?id=$res[RoomID]\">Edit</a> | <a href=\"deleteroom.php?id=$res[RoomID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>