
<html>
<head>
    <title>Add Locations</title>

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
    <?php

    include_once("Configure.php");
    global $wvdb;

    $floorplanres = $wvdb->query("SELECT * FROM FloorPlans ORDER BY FloorPlanID");
    $floorplanarray = array() ;

    ?>
    <a href="indexlocations.php">Manage Locations</a>
    <br />
    <br />

    <form action="AddLocations.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Location Description</td>
                <td>
                    <input type='text' name='locationDescription' <?php echo 'value="'.$_POST["locationDescription"].'"'; ?>/>
                </td>
            </tr>
            <tr>
                <td>Floor Plan</td>
                <td>
                    <select name='floorPlan' onchange="this.form.submit();">
                        <option value='-1'>Select...</option>
                        <?php
                        $selectedplan = -1;
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['floorPlan'])) {
                            $selectedplan = $_POST['floorPlan'];
                        }
                        global $floorplanres;
                        global $floorplanarray;
                        while($plan = $floorplanres->fetchArray(SQLITE3_ASSOC)) {
                            $planid = $plan['FloorPlanID'];
                            $selectedstring=$selectedplan==$planid?" selected=selected":"";
                            echo "<option value='".$planid."'".$selectedstring.">".$plan['FloorPlanName']."</option>";
                            $floorplanarray[$planid] = $plan['FloorPlanFile'];
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Plan</td>
                <td>
                       <div class='containerdiv' align='center'>

                            <div class="imgdiv"> 
                        <?php
                        global $floorplanarray;
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['floorPlan'])) {
                            $planid = $_POST['floorPlan'];
                            if ($planid!=-1){
                            global $__builder_floorplan_folder;
                            $planfile = $__builder_floorplan_folder."/".pathinfo($floorplanarray[$planid],PATHINFO_BASENAME);
                            echo "<input type='image' alt='Click location on floorplan' src='".$planfile."' name='flplan' border='0' style=cursor:crosshair; />";
                            }
                        }

                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['flplan_x'])) {
                            $flpln_x=$_POST['flplan_x'];
                            $flpln_y=$_POST['flplan_y'];

                            $imagesize = getimagesize(ltrim($planfile,"/"));
                            $x_percent = $flpln_x*100/$imagesize[0];
                            $y_percent = $flpln_y*100/$imagesize[1];
                            $crosshairssize = getimagesize("images/elementcross@12px.png");
                            $marginleft = round($crosshairssize[0]/2);
                            $margintop = round($crosshairssize[1]/2);
                            echo "<img src='images/elementcross@12px.png' border='0' class='absimg' style='top: ".round($y_percent,PHP_ROUND_HALF_DOWN)."%; left:".round($x_percent,PHP_ROUND_HALF_DOWN)."%; margin-left:-".$marginleft."px; margin-top:-".$margintop."px;'/>";

                        }
                        ?>
                             </div>
    
                    </div>
                </td>
            </tr>
            <tr>
                <td>Location X: </td>
                <td>
                    <?php 
                    global $x_percent;
                    echo $x_percent; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Location Y: </td>
                <td>
                    <?php 
                    global $y_percent;
                    echo $y_percent; 
                    
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
        <input type="hidden" name="x_percent" id="hiddenField" value="<?php global $x_percent;
                                                                            echo $x_percent;  ?>" />
        <input type="hidden" name="y_percent" id="hiddenField" value="<?php global $y_percent;
                                                                            echo $y_percent;  ?>" />
    </form>
    <?php
    // define variables and set to empty values
    $locationDescriptionErr = "";
    $locationDescription = "";
    $floorPlanID="";
    $locationX = "";
    $locationY = "";
    $locationID = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
        if (empty($_POST["locationDescription"])) {
            $floorNameErr = "Location Description is required";
        }
        else {
            $locationDescription = test_input($_POST["locationDescription"]);
            $floorplan = test_input($_POST["floorPlan"]);
            $locationX = test_input($_POST["x_percent"]);
            $locationY = test_input($_POST["y_percent"]);
            $ret=insertLocation($locationDescription,$floorplan,$locationX,$locationY);
            if($ret["success"])
            {
                $URL = "IndexLocations.php";
                $locationID = $ret["rowid"];
					$URL.="?ID=".$locationID;
                header("Location: $URL");
                die();
            }
            else
            {
                $locationDescriptionErr="Unable to create location.\n".$ret["error"];
                $locationID="";
            }
        }
        echo "Location add failed: ".$locationDescriptionErr;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function insertLocation($description,$flplan,$X,$Y)
    {
        global $wvdb;
        $sql = "Insert into locations(locationDescription,floorPlanID,locationX,locationY) values(:description,:floorplan,:x,:y);";
        $stmt=$wvdb->prepare($sql);
        $stmt->bindValue(':description',$description,SQLITE3_TEXT);
        $stmt->bindValue(':floorplan',intval($flplan),SQLITE3_INTEGER);
        $stmt->bindValue(':x',floatval($X),SQLITE3_FLOAT);
        $stmt->bindValue(':y',floatval($Y),SQLITE3_FLOAT);
        if(!$stmt->execute()){
            $retval['success'] = false;
            //check the error code for unique index violation.  Check whether last error message is function or propertgy.
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



</body>
</html>