<?php
    use backend\Read\Read;
    require_once __DIR__ . '/start.php';
    $db1 = new Read();
    $db1->single($_POST['id']);
    echo $db1->getData()

?>