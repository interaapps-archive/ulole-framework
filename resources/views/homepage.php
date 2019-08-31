<?php use databases\TestTable;

tmpl('header'); ?>
<?php

    $test = (new TestTable);
    $test->password = "Hello xDD";
    echo $test->save();


    foreach ((new TestTable)->select("*")->get() as $a ) {
        echo $a["password"]."<br>";
    }

  #?>
WELCOME
<?php tmpl('footer'); ?>