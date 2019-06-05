<?php
    require_once '../../constants.php';
    require_once 'get_course_module_sub_modules.php';

    save_course_modules();

    function save_course_modules() {
        $connection = connect_database();

        $insert = $connection->prepare('INSERT INTO course_modules (course_structure_id, module_name, 
                            module_order, viewable) VALUES (:structure_id, :module_name, :module_order, :viewable)');
        $insert->bindParam(':structure_id', $_POST['structure_id']);

        $update = $connection->prepare('UPDATE course_modules SET module_name = :module_name, 
                          module_order = :module_order, viewable = :viewable WHERE module_id = :module_id');

        foreach (json_decode($_POST['modules'], true) as $module) {
            $update->bindParam(':module_id', $module['id']);

            if ($module['id'] == 0) {
                $insert->bindParam(':module_name', $module['name']);
                $insert->bindParam(':module_order', $module['order']);
                $insert->bindParam(':viewable', $module['use']);
                $insert->execute();

            } else {
                $update->bindParam(':module_name', $module['name']);
                $update->bindParam(':module_order', $module['order']);
                $update->bindParam(':viewable', $module['use']);
                $update->execute();
            }
        }
        echo json_encode(['code' => 1, 'modules' => get_course_module_sub_modules($connection, $_POST['structure_id'])]);
    }
