<?php
//including the database connection file
include_once("el_SQLiteInteraction.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = $wvdb->query("SELECT * FROM Rooms ORDER BY RoomID"); // using mysqli_query instead
?>

<html>
<head>
    <title>Rooms</title>
</head>

<body>
    <a href="AddRooms.html">Add New Room</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Room ID</td>
            <td>Room Name</td>
        </tr>
        <?php
        while($res = $result->fetchArray(SQLITE_ASSOC)) {
            echo "<tr>";
            echo "<td>".$res['RoomID']."</td>";
            echo "<td>".$res['RoomName']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"deleteroom.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>