<?php
$name = 'sys_courses';
require_once 'admin/files/functions/constants.php';
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


        <div class='container p-0'>
            <div class='row m-0'>
                <div class='col-12 p-0'>
                    <div class='row mx-0'>
                        <div class='col-12 col-sm-6 col-md-4 col-lg-3 p-2' id='filters'>
                            <div id="filters_col">
                                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters"
                                   id="filters_col_bt" class='fas fa-sliders-h'>Filters
                                </a>

                                <div class="collapse show" id="collapseFilters">
                                    <div class="filter_type">
                                        <h6>Category</h6>
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck" checked> &nbsp;All
                                                    <small>(945)</small>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">&nbsp;&nbsp;Architecture
                                                    <small>(45)</small>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">&nbsp;&nbsp;Management
                                                    <small>(30)</small>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">&nbsp;&nbsp;Business
                                                    <small>(25)</small>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">&nbsp;&nbsp;Literature
                                                    <small>(56)</small>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="icheck">&nbsp;&nbsp;Biology
                                                    <small>(10)</small>
                                                </label>
                                            </li>
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
                                <!--/collapse -->
                            </div>
                        </div>

                        <div class='col-12 col-sm-6 col-md-8 col-lg-9 p-2'>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 d-none">
                                    <div class="box_grid wow">
                                        <figure class="block-reveal">
                                            <div class="block_horizontal"></div>
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
                                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                        class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                                <small>(145)</small>
                                            </div>
                                        </div>
                                        <ul>
                                            <li><i class="fas fa-clock"></i> 1h 30min</li>
                                            <li><i class="fas fa-thumbs-up"></i> 890</li>
                                            <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class='col-12 p-1 no_list'>No courses to display</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>

        <script>
            $(document).ready(function () {
                // Check and radio input styles
                $("input.icheck").iCheck({
                    checkboxClass: "icheckbox_square-grey",
                    radioClass: "iradio_square-grey"
                });

            });
        </script>
    </body>
</html>