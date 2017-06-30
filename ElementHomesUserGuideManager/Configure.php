<?php
namespace elementhomes;
use SQLite3;

$projectname = "Westgate View";
$wvdb = new InitialiseDatabase();

$databasescript = "../westgateview/data/westgateviewscript.sql";



class db extends SQLite3{


    function __construct()
    {
        $this->open('../westgateview/data/westgateview.db');
    }


}
?>