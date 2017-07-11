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
    <a href="AddFloorPlans.html">Add New Floor Plan</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Floor Plan ID</td>
            <td>Floor Plan Name</td>
            <td>Floor Plan File</td>

        </tr>
        <?php
        global $result;
        while($res = $result->fetchArray(SQLITE3_ASSOC)) {
            if($res['FloorPlanID']==$lastid){
                echo "<tr class='highlighted'>";
            }
            else {
				echo "<tr>";
            }
            echo "<td>".$res['FloorPlanID']."</td>";
            echo "<td>".$res['FloorPlanName']."</td>";
            echo "<td>".$res['FloorPlanFile']."</td>";
            echo "<td><a href=\"editfloorplan.php?id=$res[FloorPlanID]\">Edit</a> | <a href=\"deletefloorplan.php?id=$res[FloorPlanID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>