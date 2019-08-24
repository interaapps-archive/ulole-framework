<?php tmpl('header'); ?>
<?php
$x = new databases\TestTable;
/*$x->username = "Test";
$x->password = "a";
$x->save();*/
$y =  $x->select("*")->get();
foreach ($y as $obj) 
    echo "<br>".$obj["id"];
?>
WELCOME
<?php tmpl('footer'); ?>