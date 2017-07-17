<?php
namespace elementhomes;
use SQLite3;

$projectname = "Westgate View";
$databaselocation = '../westgateview/data/westgateview.db';
$databasescript = "../westgateview/data/westgateviewscript.sql";
$__client_data_folder = "../westgateview/data";
$__client_data_folder_in_db = "/data";
$__builder_data_folder = "/data";
$__floorplans_suffix = "/floorplans";
$__client_floorplan_folder = $__client_data_folder.$__floorplans_suffix;
$__client_floorplan_folder_in_db = $__client_data_folder_in_db.$__floorplans_suffix;
$__builder_floorplan_folder = $__builder_data_folder.$__floorplans_suffix;
$__documentation_suffix = "/documentation";
$__builder_documentation_folder = $__builder_data_folder.$__documentation_suffix;
$__client_documentation_folder = $__client_data_folder.$__documentation_suffix;
$__client_documentation_folder_in_db = $__client_data_folder_in_db.$__documentation_suffix;
$__images_suffix = "/images";
$__client_site_images_folder = $__client_data_folder.$__images_suffix;
$__builder_site_images_folder = $__builder_data_folder.$__images_suffix;
$__user_images_folder = $__data_folder."/userimages";

$wvdb = new db();

class db extends SQLite3{


    function __construct()
    {
        global $databaselocation;
        $this->open($databaselocation);
    }


}
?>