<?php

require 'vendor/autoload.php';

//dompdf config
define('DOMPDF_ENABLE_AUTOLOAD', false);

//validator config
use Valitron\Validator as V;
V::langDir('vendor/vlucas/valitron/lang');
V::lang('en');

$f3 = Base::instance();

$f3->config('config/config.ini');
$f3->config('config/routes.ini');
$f3->set('UPLOADS','ui/uploads/');

//$f3->set('ONERROR',function($f3){
//  echo Template::instance()->render('404.html');
//});

$f3->run();
