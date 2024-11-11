<?php
    use backend\Read\Read;
    require_once __DIR__ . '/start.php';
    $db1 = new Read();
    $db1->search($_POST['search']);
    echo $db1->getData()

?>