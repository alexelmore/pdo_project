<?php

include_once 'Database.php';

$form_errors = [];
$data = [];

if (isset($_POST['name']) && isset($_POST['description'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    if (!$name || $name == null) {
        $form_errors['name'] = "Task Name Is Required";
    }

    if (!$description || $description == null) {
        $form_errors['description'] = "Task Description Is Required";
    }

    if (count($form_errors) < 1) {

        try {
            $createQuery = "INSERT INTO task(name,description,created_at)
                         VALUES(:name,:description, now())";

            $statement = $conn->prepare($createQuery);

            $statement->execute(array(":name" => $name, ":description" => $description));

            if ($statement) {
                $data['success'] = true;
                $data['message'] = "Record Inserted";
            }
        } catch (PDOException $e) {
            echo "An error occurred" . $e->getMessage();
        }
    } else {
        // Process error messaging
        $data['success'] = false;
        $data['message'] = $form_errors;
    }

    echo json_encode($data);
}
