<?php

    function get_course_module_sub_modules(pdo $connection, $structure_id) {
        $module_statement = $connection->prepare('SELECT module_id, module_name, module_order, viewable 
                                    FROM course_modules WHERE course_structure_id = :structure_id ORDER BY module_order');

        $sub_statement = $connection->prepare('SELECT sub_module_id, sub_module_name, viewable, sub_module_order 
                                    FROM course_sub_modules WHERE module_id = :module_id ORDER BY sub_module_order');

        $module_statement->bindParam(':structure_id', $structure_id);
        $module_statement->execute();

        $data = [];
        foreach ($module_statement->fetchAll() as $module_row) {
            $sub_statement->bindParam(':module_id', $module_row['module_id']);
            $sub_statement->execute();

            $module_row['sub_modules'] = $sub_statement->fetchAll();
            $data[] = $module_row;
        }
        return $data;
    }
