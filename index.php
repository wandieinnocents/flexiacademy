<?php
    $name = 'index';
    require_once 'admin/files/functions/constants.php';

    $connection = connect_database();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Dashboard</title>

        <?php require_once 'web_links.php' ?>
        <link href='admin/files/lib/css/client/index.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <div class='container-fluid p-0'>
            <div class='row mx-0'>
                <div class='col-12  p-0'>
                    <div id='header_image'>

                        <div id="nav_content">
                            <?php require_once 'web_header.php'; ?>
                        </div>

                        <div id="other_content">
                            <div id='div_1'>
                                <div>STUDY ONLINE</div>
                                <div>Enjoy today and get the best online courses</div>
                                <div>
                                    <span data-toggle="modal" data-target="#login_modal">GET STARTED</span>
                                </div>
                            </div>
                            <div id='div_2'>
                                <div>FLEXI STUDY</div>
                                <div>Anywhere Anytime</div>
                            </div>
                        </div>
                    </div>

                    <div class='row mx-0'>
                        <div class='col-12 p-4' id='features'>
                            <ul>
                                <li>
                                    <i class="fas fa-graduation-cap"></i>
                                    <h4>+200 courses</h4>
                                    <span>Explore a variety of topics</span>
                                </li>
                                <li>
                                    <i class="fas fa-book-open"></i>
                                    <h4>STUDY ONLINE</h4>
                                    <span>With internet, you win</span>
                                </li>
                                <li>
                                    <i class="fas fa-laptop"></i>
                                    <h4>DISTANT ACCESS</h4>
                                    <span>No worry for location today</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class='container-fluid'>
            <div class='row mx-0 mt-5'>
                <div class='col-12 px-0 main_title_2'>
                    <span><em></em></span>
                    <h2>FlexiStudy Popular Courses</h2>
                    <p>We have many course for you, choose your convinient ones.</p>
                </div>

                <div class='col-12 px-1'>
                    <div id="recommended" class="owl-carousel owl-theme">
                        <?php
                            $statement = $connection->prepare('SELECT structure_id, category_name, course_name, course_fee, 
                                course_highlight, cover_image, rating_average, rating_people 
                            FROM course_structure
                              INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id
                            LIMIT 6');

                            $statement->execute();
                            foreach ($statement->fetchAll() as $row) {
                                $structure_id =$row['structure_id'];
                                $category_name = $row['category_name'];
                                $course_name = $row['course_name'];
                                $course_highlight =$row['course_highlight'];
                                $cover_image = empty($row['cover_image']) ? 'admin/files/images/temp/course_list.jpg' :
                                    'admin/files/images/pictures/thumbnails/' . $row["cover_image"];
                                $rating = get_rating($row['rating_average'], $row['rating_people']);
                                $course_fee = number_format($row['course_fee'], 0);

                                echo <<<EOT
                                    <div class="item">
                                        <div class="box_grid">
                                            <figure>
                                                <a href="#" class="wish_bt"></a>
                                                <a href="flexi_course_details.php?course=$structure_id">
                                                    <div class="preview"><span>$category_name</span></div>
                                                    <img src="$cover_image" class="img-fluid" alt=""></a>
                                                <div class="price">$course_fee</div>
            
                                            </figure>
                                            <div class="wrapper">
                                                <small>$category_name</small>
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
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>

        <!-- popper -->
        <script src='admin/files/lib/js/owl.carousel.js'></script>

        <script>
            $(document).ready(function () {
                $("#recommended").owlCarousel({
                    center: true,
                    items: 2,
                    loop: true,
                    margin: 0,
                    responsive: {
                        0: {
                            items: 1
                        },
                        767: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        },
                        1400: {
                            items: 4
                        }
                    },
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: false
                });
            });
        </script>
    </body>
</html>
