<?php

class Controller {

    protected $f3;
    protected $db;

    function __construct() {
        $f3 = Base::instance();
        $dbh = new PDO($f3->get('db_dns') . $f3->get('db_name'), $f3->get('db_user'), $f3->get('db_pass'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->f3 = $f3;
        $this->db = $dbh;
    }

}
