<?php

include_once 'Database.php';

if (isset($_POST['id'])) {

    $column = trim($_POST['column']);
    $theData = $_POST['theData'];
    $id = $_POST['id'];

    try {
        $updateQuery = "UPDATE task SET {$column}= :placeholder
                       WHERE id = :id";

        $statement = $conn->prepare($updateQuery);

        $statement->execute(array(":placeholder" => $theData, ":id" => $id));

        if ($statement->rowCount() === 1) {
            echo "Task {$column} Updated";
        } else {
            echo "No Changes Made";
        }
    } catch (PDOException $e) {
        echo "An error occurred" . $e->getMessage();
    }
} else if (isset($_POST['description']) && isset($_POST['id'])) {

    $description = trim($_POST['description']);
    $id = $_POST['id'];

    try {
        $updateQuery = "UPDATE task SET description = :description
                       WHERE id = :id";

        $statement = $conn->prepare($updateQuery);

        $statement->execute(array(":description" => $description, ":id" => $id));

        if ($statement->rowCount() === 1) {
            echo "Task Description Updated";
        } else {
            echo "No Changes Made";
        }
    } catch (PDOException $e) {
        echo "An error occurred" . $e->getMessage();
    }
} else if (isset($_POST['status']) && isset($_POST['id'])) {

    $status = trim($_POST['status']);
    $id = $_POST['id'];

    try {
        $updateQuery = "UPDATE task SET status = :status
                       WHERE id = :id";

        $statement = $conn->prepare($updateQuery);

        $statement->execute(array(":status" => $status, ":id" => $id));

        if ($statement->rowCount() === 1) {
            echo "Task Status Updated";
        } else {
            echo "No Changes Made";
        }
    } catch (PDOException $e) {
        echo "An error occurred" . $e->getMessage();
    }
}
