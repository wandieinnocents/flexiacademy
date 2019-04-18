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

                        <div id='header_nav'>
                            <ul>
                                <li><a href='index.php'>HOME</a></li>
                                <li><a href='#'>ABOUT</a></li>
                                <li><a href='flexi_courses.php'>COURSES</a></li>
                                <li><a href='#'>NEWS</a></li>
                                <li><a href='user_settings.php'>ACCOUNT</a></li>
                            </ul>
                        </div>

                        <img src='admin/files/images/images/flexi_image.jpg' alt=''>
                        <div>
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
                                    <span>Explore a variety of fresh topics</span>
                                </li>
                                <li>
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <h4>Expert teachers</h4>
                                    <span>Find the right instructor for you</span>
                                </li>
                                <li>
                                    <i class="fas fa-hand-pointer"></i>
                                    <h4>Focus on target</h4>
                                    <span>Increase your personal expertise</span>
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
                    <h2>Udema Popular Courses</h2>
                    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                </div>

                <div class='col-12 px-1'>
                    <div id="recommended" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="#" class="wish_bt"></a>
                                    <a href="flexi_course_details.php?course=2">
                                        <div class="preview"><span>Preview course</span></div>
                                        <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt=""></a>
                                    <div class="price">$39</div>

                                </figure>
                                <div class="wrapper">
                                    <small>Category</small>
                                    <h3>Persius delenit has cu</h3>
                                    <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                    <?php get_rating(3.5, 127) ?>
                                </div>
                                <ul>
                                    <li><i class="fas fa-clock"></i> 1h 30min</li>
                                    <li><i class="fas fa-thumbs-up"></i> 890</li>
                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="#" class="wish_bt"></a>
                                    <a href="flexi_course_details.php?course=2">
                                        <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="price">$45</div>
                                    <div class="preview"><span>Preview course</span></div>
                                </figure>
                                <div class="wrapper">
                                    <small>Category</small>
                                    <h3>Persius delenit has cu</h3>
                                    <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                    <?php get_rating(4.5, 1207) ?>
                                </div>
                                <ul>
                                    <li><i class="fas fa-clock"></i> 1h 30min</li>
                                    <li><i class="fas fa-thumbs-up"></i> 890</li>
                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="#" class="wish_bt"></a>
                                    <a href="flexi_course_details.php?course=2">
                                        <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="price">$54</div>
                                    <div class="preview"><span>Preview course</span></div>
                                </figure>
                                <div class="wrapper">
                                    <small>Category</small>
                                    <h3>Persius delenit has cu</h3>
                                    <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                    <?php get_rating(4, 1450) ?>
                                </div>
                                <ul>
                                    <li><i class="fas fa-clock"></i> 1h 30min</li>
                                    <li><i class="fas fa-thumbs-up"></i> 890</li>
                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="#" class="wish_bt"></a>
                                    <a href="flexi_course_details.php?course=2">
                                        <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="price">$27</div>
                                    <div class="preview"><span>Preview course</span></div>
                                </figure>
                                <div class="wrapper">
                                    <small>Category</small>
                                    <h3>Persius delenit has cu</h3>
                                    <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                    <?php get_rating(3, 120) ?>
                                </div>
                                <ul>
                                    <li><i class="fas fa-clock"></i> 1h 30min</li>
                                    <li><i class="fas fa-thumbs-up"></i> 890</li>
                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="#" class="wish_bt"></a>
                                    <a href="flexi_course_details.php?course=2">
                                        <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="price">$35</div>
                                    <div class="preview"><span>Preview course</span></div>
                                </figure>
                                <div class="wrapper">
                                    <small>Category</small>
                                    <h3>Persius delenit has cu</h3>
                                    <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                    <?php get_rating(2.5, 457) ?>
                                </div>
                                <ul>
                                    <li><i class="fas fa-clock"></i> 1h 30min</li>
                                    <li><i class="fas fa-thumbs-up"></i> 890</li>
                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="#" class="wish_bt"></a>
                                    <a href="flexi_course_details.php?course=2">
                                        <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="price">$54</div>
                                    <div class="preview"><span>Preview course</span></div>
                                </figure>
                                <div class="wrapper">
                                    <small>Category</small>
                                    <h3>Persius delenit has cu</h3>
                                    <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                    <?php get_rating(5, 125) ?>
                                </div>
                                <ul>
                                    <li><i class="fas fa-clock"></i> 1h 30min</li>
                                    <li><i class="fas fa-thumbs-up"></i> 890</li>
                                    <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
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
