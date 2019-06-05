<?php
    require_once '../../constants.php';
    get_tutor_courses();

    function get_tutor_courses() {
        $connection = connect_database();

        $statement = $connection->prepare('SELECT structure_id, category_name, course_name, course_fee, 
                                course_highlight, cover_image, rating_average, rating_people 
                            FROM course_structure
                              INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id');
        $statement->execute();

        $data = '';
        foreach ($statement->fetchAll() as $row) {
            $cover_image = empty($row['cover_image']) ? 'admin/files/images/temp/course_list.jpg' :
                'admin/files/images/pictures/thumbnails/' . $row["cover_image"];
            $structure_id = $row['structure_id'];
            $category_name = $row['category_name'];
            $course_name = $row['course_name'];
            $course_fee = number_format($row['course_fee'], 0);
            $rating = get_rating($row['rating_average'], $row['rating_people']);
            $course_highlight = $row['course_highlight'];

            $data = $data . <<<EOT
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box_grid wow">
                                        <figure class="block-reveal">
                                            <div class="block_horizontal"></div>
                                            <a href="javascript:void()">
                                                <img src="$cover_image" class="img-fluid" alt="">
                                            </a>
                                            <div class="price">UGX $course_fee</div>
                                            <div class="preview">
                                                <span>Edit "$course_name"</span>
                                            </div>
                                        </figure>
                                        <div class="wrapper">
                                            <small>$category_name</small>
                                            <h3>$course_name</h3>
                                            <p class="max_4">$course_highlight</p>   
                                            $rating
                                        </div>
                                        <div class="box_button">
                                            <div class="row mx-0 px-0">
                                                <div class="col-4 offset-2 px-1">
                                                    <button class="btn solid edit_structure">Edit Structure</button>
                                                </div>
                                                <div class="col-4 px-1">
                                                    <button class="btn solid edit_details">Edit Details</button>
                                                </div>
                                                <div class="d-none structure_id_courses">$structure_id</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
EOT;
        }
        echo $data;
    }
