<?php
namespace databases;

use modules\uloleorm\Table;
class TestTable extends Table {

    public $username, 
           $password,
           $enumTest;

    public function database() {
        $this->setTable("user");
        // The default value is "main"
        $this->setDatabase("main");
    }

}