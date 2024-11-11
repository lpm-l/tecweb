<?php
    use API\BACKEND\Products as DB;
    require_once __DIR__ . '/myapi/Products.php';
    $db1 = new DB();
    $db1->search($_POST['search']);
    echo $db1->getData()

?>