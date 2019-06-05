<?php
    require_once '../../constants.php';
    require_once 'get_course_module_sub_modules.php';

    get_course_data();

    function get_course_data() {
        $connection = connect_database();

        $statement = $connection->prepare('SELECT structure_id, category_name, course_name, course_fee, course_description, 
                                  learning_material, start_date, end_date, course_highlight, cover_image, cover_video, rating_average, 
                                  rating_people, what_you_learn, who_is_for, why_unique 
                                FROM course_structure 
                                  INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id
                                WHERE structure_id = :structure_id LIMIT 1');
        $statement->bindParam(':structure_id', $_POST['structure_id']);
        $statement->execute();

        $data = $statement->fetch();
        $data['start_date'] = $data['start_date'] == 0 ? '' : date('Y-m-d', $data['start_date']);
        $data['end_date'] = $data['end_date'] == 0 ? '' : date('Y-m-d', $data['end_date']);
        $data['modules'] = get_course_module_sub_modules($connection, $_POST['structure_id']);

        echo json_encode($data);
        $connection = null;
    }