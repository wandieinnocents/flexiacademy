<?php
    require_once '../../constants.php';
    save_course_structure();

    function save_course_structure() {
        $connection = connect_database();

        if ($_POST['category_id'] == 0) {
            $statement = $connection->prepare('SELECT category_id FROM course_categories WHERE category_name = :category_name LIMIT 1');
            $statement->bindParam(':category_name', $_POST['category_name']);
            $statement->execute();
            if ($statement->rowCount() == 1) {
                $category_id = ($statement->fetch())['category_id'];
            } else {
                $statement = $connection->prepare('INSERT INTO course_categories (category_name) VALUES (:category_name)');
                $statement->bindParam(':category_name', $_POST['category_name']);
                $statement->execute();
                $category_id = $connection->lastInsertId();
            }

        } else {
            $category_id = $_POST['category_id'];
        }

        $start_date = empty($_POST['start_date']) ? 0 : $_POST['start_date'];
        $end_date = empty($_POST['end_date']) ? 0 : $_POST['end_date'];

        if ($_POST['structure_id'] == 0) {
            $statement = $connection->prepare('INSERT INTO course_structure (category_id, course_name, course_fee, 
                              start_date, end_date, course_highlight, course_description, learning_material) VALUES (:category_id, 
                              :course_name, :course_fee, :start_date, :end_date, :course_highlight, :course_description, :learning_material)');

            $course_description = '';
            $learning_material = '{}';
            $statement->bindParam(':course_description', $course_description);
            $statement->bindParam(':learning_material', $learning_material);

        } else {
            $statement = $connection->prepare('UPDATE course_structure SET category_id = :category_id, 
                                  course_name = :course_name, course_fee = :course_fee, start_date = :start_date, end_date = :end_date,
                                  course_highlight = :course_highlight WHERE structure_id = :structure_id');
            $statement->bindParam(':structure_id', $_POST['structure_id']);
        }

        $statement->bindParam(':category_id', $category_id);
        $statement->bindParam(':course_name', $_POST['course_name']);
        $statement->bindParam(':course_fee', $_POST['course_fee']);
        $statement->bindParam(':start_date', $start_date);
        $statement->bindParam(':end_date', $end_date);
        $statement->bindParam(':course_highlight', $_POST['course_highlight']);

        $statement->execute();
        $structure_id = $_POST['structure_id'] == 0 ? $connection->lastInsertId() : $_POST['structure_id'];

        $course_categories = '';
        $statement = $connection->prepare('SELECT category_name FROM course_categories ORDER BY category_name');
        $statement->execute();

        foreach ($statement->fetchAll() as $row) {
            $category_name = $row['category_name'];
            $course_categories = $course_categories . "<option value='$category_name'>$category_name</option>";
        }


        echo json_encode(['code'              => 1, 'structure_id' => $structure_id, 'category_id' => $category_id,
                          'course_categories' => $course_categories]);
    }

