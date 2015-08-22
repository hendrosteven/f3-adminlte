<?php

class DashboardController extends RestrictedController {

    public function index() {
        $this->f3->set('view', 'dashboard/main.html');
    }

}
