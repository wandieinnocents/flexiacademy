<?php
    require_once '../../constants.php';
    require_once 'get_course_module_sub_modules.php';

    save_sub_modules();

    function save_sub_modules() {
        $connection = connect_database();

        $insert = $connection->prepare('INSERT INTO course_sub_modules (module_id, sub_module_name, sub_module_order, 
                                viewable) VALUES (:module_id, :sub_module_name, :sub_module_order, :viewable)');
        $update = $connection->prepare('UPDATE course_sub_modules SET  sub_module_name = :sub_module_name, 
                                  sub_module_order = :sub_module_order, viewable = :viewable
                                WHERE module_id = :module_id AND sub_module_id = :sub_module_id');

        foreach (json_decode($_POST['modules'], true) as $module) {
            $insert->bindParam(':module_id', $module['module_id']);
            $update->bindParam(':module_id', $module['module_id']);

            foreach ($module['sub_modules'] as $sub_module) {
                if ($sub_module['sub_module_id'] == 0) {
                    $insert->bindParam(':sub_module_name', $sub_module['sub_module_name']);
                    $insert->bindParam(':sub_module_order', $sub_module['order']);
                    $insert->bindParam(':viewable', $sub_module['viewable']);
                    $insert->execute();

                } else {
                    $update->bindParam(':sub_module_id', $sub_module['module_id']);
                    $update->bindParam(':sub_module_name', $sub_module['sub_module_name']);
                    $update->bindParam(':sub_module_order', $sub_module['order']);
                    $update->bindParam(':viewable', $sub_module['viewable']);
                    $update->execute();
                }
            }
        }

        echo json_encode(['code' => 1, 'modules' => get_course_module_sub_modules(
            $connection,$_POST['structure_id'])]);
        $connection = null;
    }