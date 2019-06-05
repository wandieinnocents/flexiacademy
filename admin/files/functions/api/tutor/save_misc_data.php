<?php
    require_once '../../constants.php';
    save_misc_data();

    function save_misc_data() {
        $column = $_POST['operation'];
        //save_
        $column = substr($column, 5);
        $connection = connect_database();

        $statement = $connection->prepare("update course_structure set $column = :post_data
                                  where structure_id = :structure_id");
        $statement->bindParam(':post_data', $_POST['post_data']);
        $statement->bindParam(':structure_id', $_POST['structure_id']);
        $statement->execute();
        echo json_encode(['code' => 1]);
        $connection = null;
    }
