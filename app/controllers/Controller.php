<?php

class Controller {

    protected $f3;
    protected $db;
    protected $response_array;

    function __construct() {
        $f3 = Base::instance();
        $dbh = new DB\SQL($f3->get('db_dns') . $f3->get('db_name'), $f3->get('db_user'), $f3->get('db_pass'));       
        $this->f3 = $f3;
        $this->db = $dbh;       
    }

   function afterroute() {
        echo Template::instance()->render('layout.html');
        $this->f3->clear('SESSION.flash');
    }

}
