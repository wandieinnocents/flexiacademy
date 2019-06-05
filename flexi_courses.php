<?php
    $name = 'sys_courses';
    require_once 'admin/files/functions/constants.php';
    $connection = connect_database();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Courses</title>

        <?php require_once 'web_links.php' ?>
        <link href='admin/files/lib/css/client/index.css' rel='stylesheet' type='text/css'/>
        <link href='admin/files/lib/css/client/courses.css' rel='stylesheet' type='text/css'/>

    </head>
    <body>
        <?php require_once 'web_header.php'; ?>


        <div class='container p-0 mb-4'>
            <div class='row m-0'>
                <div class='col-12 p-0'>
                    <div class='row mx-0'>
                        <div class='col-12 col-sm-6 col-md-4 col-lg-3 p-2' id='filters'>
                            <div class="col-12 px-1 py-2">
                                <input type="text" placeholder="Filter by course name" class="form-control">
                            </div>

                            <div id="filters_col">
                                <a data-toggle="collapse" href="#collapse_filters" aria-expanded="false" aria-controls="collapse_filters"
                                   id="filters_col_bt" class='fas fa-sliders-h'>Filters
                                </a>

                                <div class="collapse show" id="collapse_filters">
                                    <div class="filter_type">
                                        <h6>Category</h6>
                                        <ul id="list_category">
                                            <?php
                                                get_categories($connection);
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="filter_type">
                                        <h6>Rating</h6>
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck d-inline-block">
                                                    &nbsp;<?php get_rating(5.0) ?>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">
                                                    &nbsp;<?php get_rating(4.0) ?>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">
                                                    &nbsp;<?php get_rating(3.0) ?>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">
                                                    &nbsp;<?php get_rating(2.0) ?>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">
                                                    &nbsp;<?php get_rating(1.0) ?>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-1 py-2">
                                <button class="btn solid">Apply Filter</button>
                            </div>
                        </div>

                        <div class='col-12 col-sm-6 col-md-8 col-lg-9 p-2'>
                            <div class="row">
                                <?php
                                    $statement = $connection->prepare('SELECT structure_id, category_name, course_name, course_fee, 
                                                                            course_highlight, cover_image, rating_average, rating_people 
                                                                    FROM course_structure
                                                                        INNER JOIN course_categories 
                                                                            ON course_structure.category_id = course_categories.category_id');
                                    $statement->execute();
                                    foreach ($statement->fetchAll() as $row) {
                                        $structure_id = $row['structure_id'];
                                        $category_name = $row['category_name'];
                                        $course_name = $row['course_name'];
                                        $course_highlight = $row['course_highlight'];
                                        $cover_image = empty($row['cover_image']) ? 'admin/files/images/temp/course_list.jpg' :
                                            'admin/files/images/pictures/thumbnails/' . $row["cover_image"];
                                        $rating = get_rating($row['rating_average'], $row['rating_people']);
                                        $course_fee = number_format($row['course_fee'], 0);

                                        echo <<<EOT
                                                <div class="col-12 col-md-6 col-lg-4">
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
                                                            <small>Category</small>
                                                            <h3>$course_name</h3>
                                                            <p class="max_4">$course_highlight</p>
                                                            $rating
                                                        </div>
                                                        <ul>
                                                            <li><i class="fas fa-clock"></i> 0min</li>
                                                            <li><i class="fas fa-thumbs-up"></i> 0</li>
                                                            <li><a href="flexi_course_details.php?course=$structure_id">Enroll now</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
EOT;
                                    }

                                    if ($statement->rowCount() == 0) {
                                        echo " <div class='col-12 p-1 no_list d-none'>No courses to display</div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>

        <script>
            $(document).ready(function () {

            });
        </script>
    </body>
</html>