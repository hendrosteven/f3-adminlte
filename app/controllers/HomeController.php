<?php


class HomeController extends Controller {

    public function index() {
        echo Template::instance()->render('index.html');
    }

}
