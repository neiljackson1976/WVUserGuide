<?php
namespace elementhomes;
use SQLite3;

$projectname = "Westgate View";
$wvdb = new db();

$databaselocation = '../westgateview/data/westgateview.db';
$databasescript = "../westgateview/data/westgateviewscript.sql";
$__client_data_folder = "../westgateview/data";
$__builder_data_folder = "";
$__client_floorplan_folder = $__client_data_folder."/floorplans";
$__builder_floorplan_folder = $__builder_data_folder."/floorplans";
$__builder_documentation_folder = $__builder_data_folder."/documentation";
$__client_documentation_folder = $__client_data_folder."/documentation";

$__site_images_folder = "../westgateview/images";
$__user_images_folder = $__data_folder."/userimages";


class db extends SQLite3{


    function __construct()
    {
        global $databaselocation;
        $this->open($databaselocation);
    }


}
?>