<?php
global $wvdb;

if(isset($_GET["id"]))
$id = intval($_GET["id"]);

$sql = "delete from locations where LocationID=:id";

$stmt = $wvdb->prepare($sql);
$stmt->bindValue(":id",$id);

$retval = $stmt->execute();


?>