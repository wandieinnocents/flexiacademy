<?php
    $name = 'user_courses';
    require_once 'admin/files/functions/constants.php';
    $connection = connect_database();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | My Courses</title>

        <?php require_once 'web_links.php' ?>
        <link href='admin/files/lib/css/client/client_courses.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <?php require_once 'web_header.php'; ?>

        <div class='container p-0'>
            <div class='row m-0'>
                <div class='col-12 col-lg-9 px-lg-4 p-1'>
                    <div class='row mx-0'>
                        <?php
                            $statement = $connection->prepare('SELECT structure_id, category_name, course_name, course_fee, 
                                course_highlight, cover_image, rating_average, rating_people 
                            FROM course_structure
                              INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id');
                            $statement->execute();

                            foreach ($statement->fetchAll() as $row) {
                                $structure_id = $row['structure_id'];
                                $course_name = $row['course_name'];
                                $course_highlight = $row['course_highlight'];
                                $cover_image = empty($row['cover_image']) ? 'admin/files/images/temp/course_list.jpg' :
                                    'admin/files/images/pictures/thumbnails/' . $row["cover_image"];
                                $course_fee = number_format($row['course_fee'], 0);
                                $width = 0;

                                echo <<<EOT
                                        <div class='col-12 col-lg-6 p-1'>
                                            <a href='#' class='anchor'>
                                                <div class='list_container p-1'>
                                                    <div>
                                                        <img src='$cover_image' alt="">
                                                    </div>
                                                    <div>
                                                        <div class='content'>
                                                            <h4>$course_name</h4>
                                                            <p>$course_highlight</p>
                                                        </div>
                                                        <div class='progress'>
                                                            <div class='progress-bar' role='progressbar' style='width: $width' 
                                                                         aria-valuenow='95' aria-valuemin='0' aria-valuemax='100'>  
                                                                $width      
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
EOT;

                            }

                            for ($index = 0; $index < 15; $index++) {
                                $width = rand(8, 100) . '%';
                                echo <<<EOT
                                                    
EOT;

                            }
                        ?>
                    </div>
                </div>

                <div class='col-12 col-lg-3 p-1'>
                    <div class='row mx-0'>
                        <div class='col-12'>
                            <h4>Suggested Courses</h4>
                        </div>

                        <?php
                            $statement = $connection->prepare('SELECT structure_id, category_name, course_name, course_fee, 
                                        course_highlight, cover_image, rating_average, rating_people 
                                    FROM course_structure
                                        INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id
                                    LIMIT 2');
                            $statement->execute();

                            foreach ($statement->fetchAll() as $row){
                                $structure_id =$row['structure_id'];
                                $category_name = $row['category_name'];
                                $course_name = $row['course_name'];
                                $course_highlight =$row['course_highlight'];
                                $cover_image = empty($row['cover_image']) ? 'admin/files/images/temp/course_list.jpg' :
                                    'admin/files/images/pictures/thumbnails/' . $row["cover_image"];
                                $rating = get_rating($row['rating_average'], $row['rating_people']);
                                $course_fee = number_format($row['course_fee'], 0);

                                echo <<<EOT
                                        <div class="col-12 p-1">
                                            <div class="box_grid wow">
                                                <figure class="block-reveal">
                                                    <div class="block_horizontal"></div>
                                                    <a href="#" class="wish_bt"></a>
                                                    <a href="flexi_course_details.php?course=$structure_id">
                                                        <img src="$cover_image" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="price">$course_fee</div>
                                                    <div class="preview"><span>$course_name</span></div>
                                                </figure>
                                                <div class="wrapper">
                                                    <small>$category_name</small>
                                                    <h3>$course_name</h3>
                                                    <p>$course_highlight</p>
                                                    $rating
                                                </div>
                                                <ul>
                                                    <li><i class="fas fa-clock"></i> 0min</li>
                                                    <li><i class="fas fa-thumbs-up"></i> 0</li>
                                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                                </ul>
                                            </div>
                                        </div>

EOT;

                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>
    </body>
</html>
