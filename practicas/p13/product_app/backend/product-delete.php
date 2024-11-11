<?php
    use backend\Delete\Delete;
    require_once __DIR__ . '/start.php';
    $db1 = new Delete();
    $db1->delete($_POST['id']);
    echo $db1->getData()
?>