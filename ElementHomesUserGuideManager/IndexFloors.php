<?php
//including the database connection file
include_once("el_SQLiteInteraction.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = $wvdb->query("SELECT * FROM Floors ORDER BY FloorID"); // using mysqli_query instead
?>

<html>
<head>
    <title>Floors</title>
</head>

<body>
    <a href="AddFloors.html">Add New Floor</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Floor ID</td>
            <td>Floor Name</td>
        </tr>
        <?php
        while($res = $result->fetchArray(SQLITE_ASSOC)) {
            echo "<tr>";
            echo "<td>".$res['FloorID']."</td>";
            echo "<td>".$res['FloorName']."</td>";
            echo "<td><a href=\"editfloor.php?id=$res[id]\">Edit</a> | <a href=\"deletefloor.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>