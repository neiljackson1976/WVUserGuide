<?php



    $db = new PDO('sqlite:.\data\westgateview.db');
    $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);
    $basementvalue = 'Second';
    $isrt=$db->prepare('INSERT INTO Floors(FloorName) VALUES(?)');
    $isrt->execute(array($basementvalue));
    $result = $db->query('SELECT FloorID, FloorName FROM Floors');
    while ($resultobj = $result->fetchObject()){
        echo "<p>FloorID: ", $resultobj->FloorID, "       FloorName: ", $resultobj->FloorName,"</p>";

    };


echo "<p>Connected successfully</p>";
?>
