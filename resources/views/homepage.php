<?php tmpl('header'); ?>
<?php
use ulole\core\classes\util\cookies\Session;
$session = new Session();
$session->set("mykey", "myvalue")->save();
echo $session->get("mykey");
?>
WELCOME
<?php tmpl('footer'); ?>