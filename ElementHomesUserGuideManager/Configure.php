<?php
namespace elementhomes;
use SQLite3;

$projectname = "Westgate View";
$wvdb = new db();

$databasescript = "../westgateview/data/westgateviewscript.sql";



class db extends SQLite3{


    function __construct()
    {
        $this->open('../westgateview/data/westgateview.db');
    }


}
?>