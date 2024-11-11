<?php
  use backend\Update\Update;
  require_once __DIR__ . '/start.php';
  $db1 = new Update();
  $db1->edit(file_get_contents('php://input'));
  echo $db1->getData()


?>