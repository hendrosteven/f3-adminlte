<?php

class RestrictedController extends Controller {

    function beforeroute() {
        if (!$this->f3->exists('SESSION.acc')) {
            $this->f3->reroute('/');
        }
    }

    function afterroute() {
        echo Template::instance()->render('layout.html');
        $this->f3->clear('SESSION.flash');
    }

}
