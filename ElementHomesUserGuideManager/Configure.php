<?php
namespace elementhomes;
use SQLite3;

$projectname = "Westgate View";
$wvdb = new db();

$databasescript = "../westgateview/data/westgateviewscript.sql";
$__data_folder = "../westgateview/data";
$__floorplan_folder = $__data_folder."/floorplans";
$__documentation_folder = $__data_folder."/documentation";
$__site_images_folder = "../westgateview/images";
$__user_images_folder = $__data_folder."/userimages";


class db extends SQLite3{


    function __construct()
    {
        $this->open('../westgateview/data/westgateview.db');
    }


}
?>