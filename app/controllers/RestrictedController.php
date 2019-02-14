<?php

class RestrictedController extends Controller {

    function beforeroute() {
        if (!$this->f3->exists('SESSION.member')) {
            $this->f3->reroute('/masuk');
        }
    }

    function afterroute() {
        echo Template::instance()->render('layout.html');
        $this->f3->clear('SESSION.flash');
    }

}
