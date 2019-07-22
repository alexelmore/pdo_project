<?php

use voku\helper\Paginator;

require __DIR__ . '/vendor/autoload.php';


include_once 'Database.php';

$task = '';

try {

    $paginate = new Paginator(2, 'p');

    $readQuery = "SELECT * FROM task";
    $statement = $conn->query($readQuery);

    $total = $statement->rowCount();
    $paginate->set_total($total);

    $tasks = $conn->query("SELECT * FROM task " . $paginate->get_limit());
} catch (PDOException $e) {
    echo "An error has occurred " . $e->getMessage();
}
