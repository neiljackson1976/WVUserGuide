<?php
//including the database connection file
include_once("Configure.php");

global $wvdb;
$result = $wvdb->query('SELECT * FROM Locations ORDER BY LocationID;');
$locationid = $_GET['id'];
?>

<html>
<head>
    <title>Locations</title>
</head>

<body>
    <a href="AddLocations.html">Add New Location</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Location ID</td>
            <td>Location Description</td>
            <td>Location X</td>
            <td>Location Y</td>

        </tr>
        <?php
        while($res = $result->fetchArray(SQLITE3_ASSOC)) {
            if($locationid==$res['LocationID']){
                echo "<tr class='highlight'>";
            }
            else{echo "<tr>";}
            echo "<td>".$res['LocationID']."</td>";
            echo "<td>".$res['locationDescription']."</td>";
            echo "<td>".$res['locationX']."</td>";
            echo "<td>".$res['locationY']."</td>";

            echo "<td><a href=\"edit.php?id=$res[locationID]\">Edit</a> | <a href=\"deletelocation.php?id=$res[locationID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>