<?php
//including the database connection file
include_once("Configure.php");

global $wvdb;
$lastid = $_GET['id'];
$result = $wvdb->query("SELECT * FROM Floors ORDER BY FloorLevel"); 

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
            <td>Floor Level</td>

        </tr>
        <?php
        global $result;
        while($res = $result->fetchArray(SQLITE3_ASSOC)) {
            if($res['FloorID']==$lastid){
									echo "<tr class='highlighted'>";}
				else {
				echo "<tr>";}
            echo "<td>".$res['FloorID']."</td>";
            echo "<td>".$res['FloorName']."</td>";
            echo "<td>".$res['FloorLevel']."</td>";
            echo "<td><a href=\"editfloor.php?id=$res[FloorID]\">Edit</a> | <a href=\"deletefloor.php?id=$res[FloorID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>