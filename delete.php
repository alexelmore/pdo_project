<?php


include_once 'Database.php';

if (isset($_POST['id'])) {

    $id = $_POST['id'];


    try {
        $deleteQuery = "DELETE FROM task WHERE id = :id";

        $statement = $conn->prepare($deleteQuery);

        $statement->execute(array(":id" => $id));

        if ($statement) {
            echo "Task Deleted";
        }
    } catch (PDOException $e) {
        echo "An error occurred" . $e->getMessage();
    }
}
