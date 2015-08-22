<?php

class Account extends Crud{

   public function __construct($db) {
        parent::__construct($db, 'accounts');
   }

}
