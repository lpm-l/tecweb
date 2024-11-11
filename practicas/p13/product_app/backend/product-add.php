<?php
    use backend\Create\Create;
    require_once __DIR__ . '/start.php';
    $db1 = new Create();
    $db1->add(file_get_contents('php://input'));
    echo $db1->getData();

?>