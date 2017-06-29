<?php

$wvdb = new elDB();

class elDB extends SQLite3 {
    function __construct() {
        $this->open('../westgateview/data/westgateview.db');
    }
}

?>