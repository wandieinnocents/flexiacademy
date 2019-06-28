<?php
    require_once '../../constants.php';

    get_data();
    function get_data() {
        $connection = connect_database();
        $response = [];

        $statement = $connection->prepare("SELECT * FROM course_categories");
        $statement->execute();
        $response['categories'] = $statement->fetchAll();

        $statement = $connection->prepare("SELECT * FROM course_structure WHERE  user_id = :user_id");
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
        $response['structures'] = $statement->fetchAll();

        $modules = [];
        $sub_modules = [];
        $module_statement = $connection->prepare("SELECT * FROM course_modules 
                    WHERE course_structure_id = :course_structure_id");

        foreach ($response['structures'] as $structure) {
            $course_structure_id = $structure['structure_id'];
            $module_statement->bindParam(':course_structure_id', $course_structure_id);
            $module_statement->execute();
            $modules = array_merge($modules, $module_statement->fetchAll());
        }

        $sub_statement = $connection->prepare('SELECT * FROM course_sub_modules WHERE module_id = :module_id');
        foreach ($modules as $module) {
            $sub_statement->bindParam(':module_id', $module['module_id']);
            $sub_statement->execute();
            $sub_modules = array_merge($sub_modules, $sub_statement->fetchAll());
        }

        $connection = null;
        $response['modules'] = $modules;
        $response['sub_modules'] = $sub_modules;
        echo json_encode($response);
    }
