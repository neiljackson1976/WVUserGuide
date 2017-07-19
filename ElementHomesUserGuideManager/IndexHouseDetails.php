<?php
//including the database connection file
include_once("Configure.php");

global $wvdb;
$result = $wvdb->query('SELECT HouseDetailID, HouseDetailType, HouseDetailText FROM HouseDetails ORDER BY HouseDetailID;');
$hdid = $_GET['id'];
?>

<html>
<head>
    <title>Rooms</title>
</head>

<body>
    <a href="AddHouseDetails.php">Add New House Details</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>House Detail ID</td>
            <td>House Detail Type</td>
            <td>House Detail Text</td>


        </tr>
        <?php
        while($res = $result->fetchArray(SQLITE3_ASSOC)) {
            if($roomid==$res['HouseDetailID']){
                echo "<tr class='highlight'>";
            }
            else{echo "<tr>";}
            echo "<td>".$res['HouseDetailID']."</td>";
            echo "<td>".$res['HouseDetailType']."</td>";
            echo "<td>".$res['HouseDetailText']."</td>";

            echo "<td><a href=\"edithousedetails.php?id=$res[HouseDetailID]\">Edit</a> | <a href=\"deletehousedetails.php?id=$res[HouseDetailID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>