<?php

include_once 'Database.php';

$table = "CREATE TABLE IF NOT EXISTS task
          (

              id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR(35) NOT NULL UNIQUE,
              description VARCHAR(255) NOT NULL,
              status VARCHAR(25) DEFAULT 'Not Completed',
              created_at TIMESTAMP
          )";

try {
    $conn->query($table);
    echo "<br> Table Created";
} catch (PDOException $e) {
    echo "<br> An error occurred" . $e->getMessage();
}
