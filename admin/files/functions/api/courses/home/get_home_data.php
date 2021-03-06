<?php
    require_once '../../../constants.php';
    get_data();

    function get_data() {
        $connection = connect_database();
        $results = [];

        $statement = $connection->prepare("SELECT * FROM course_categories");
        $statement->execute();
        $results['categories'] = $statement->fetchAll();

        $statement = $connection->prepare("SELECT structure_id, course_name, course_fee, course_highlight, category_id,
                                    cover_image FROM course_structure ORDER BY rating_average DESC, rating_people 
                                    DESC  LIMIT 8");
        $statement->execute();
        $results['slider'] = $statement->fetchAll();


        echo json_encode($results);
    }