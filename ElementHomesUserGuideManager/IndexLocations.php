<?php
//including the database connection file
include_once("Configure.php");

global $wvdb;
$result = $wvdb->query('SELECT l.LocationID, l.LocationDescription, f.FloorPlanFile, l.LocationX, l.LocationY FROM Locations as l INNER JOIN FloorPlans as f ON l.FloorPlanID = f.FloorPlanID ORDER BY l.LocationID;');
$locationid = $_GET['ID'];
?>

<html>
<head>
    <title>Locations</title>
    <style>
        .containerdiv {
            position: relative;
            width: 100%;
            text-align: center;
        }


        .absimg {
            position: absolute;
        }

        .imgdiv {
            display: inline-block;
            position: relative;
        }
    </style>
</head>

<body>
    <a href="AddLocations.php">Add New Location</a>
    <br />
    <br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <th>Location ID</th>
            <th>Location Description</th>
            <th>Floor Plan</th>
            <th>Location X</th>
            <th>Location Y</th>

        </tr>
        <?php
        global $locationid;
        global $__builder_floorplan_folder;
        global $__builder_site_images_folder;
        while($res = $result->fetchArray(SQLITE3_ASSOC)) {
            if($locationid==$res['LocationID']){
                echo "<tr class='highlight'>";
            }
            else{echo "<tr>";}
            echo "<td>".$res['LocationID']."</td>";
            echo "<td>".$res['LocationDescription']."</td>";
            echo "<td>";
            $floorplanimage = $__builder_floorplan_folder."/".pathinfo($res['FloorPlanFile'],PATHINFO_BASENAME);
            $floorplanimagesize = getimagesize($floorplanimage);
            echo "<div class='containerdiv' align='center' style='height: ".$floorplanimagesize[1]."px'>";

            echo "<div class='imgdiv'>";
            echo "<img src='".$floorplanimage."' border='0' />";
            $crossimage = $__builder_site_images_folder."/elementcross@12px.png";
            $crossimagesize = getimagesize($crossimage);
            $marginleft = round($crosshairssize[0]/2);
            $margintop = round($crosshairssize[1]/2);

            $imagehtml = "<img src='".$crossimage."' border='0' class='absimg' style='top: ".round($res['LocationY'],PHP_ROUND_HALF_DOWN)."%; left:".round($res['LocationX'],PHP_ROUND_HALF_DOWN)."%; margin-left:-".$marginleft."px; margin-top:-".$margintop."px;'/>";
            echo $imagehtml;

            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "<td>".$res['LocationX']."</td>";
            echo "<td>".$res['LocationY']."</td>";

            echo "<td><a href='edit.php?id=".$res[locationID]."'>Edit</a> | <a href='deletelocation.php?id=".$res[locationID]."' onClick='return confirm('Are you sure you want to delete?')'>Delete</a></td>";

            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>