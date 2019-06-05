<?php
    $name = 'course_details';
    require_once 'admin/files/functions/constants.php';
    $connection = connect_database();

    if (!isset($_GET['course'])) {
        header('location: index.php');
        die();
    }


    $statement = $connection->prepare('SELECT structure_id, category_id, course_name, course_fee, course_description, 
                                learning_material, start_date, end_date, course_highlight, cover_image, cover_video, rating_average, 
                                rating_people, what_you_learn, who_is_for, why_unique 
                            FROM course_structure WHERE structure_id = :structure_id LIMIT 1');
    $statement->bindParam(':structure_id', $_GET['course']);
    $statement->execute();

    if ($statement->rowCount() == 0) {
        header('location: index.php');
        die();
    }

    $data = $statement->fetch();
    $structure_id = $data['structure_id'];
    $course_fee = number_format($data['course_fee'], 0);
    $start_date = empty($data['start_date']) ? 'Open' : date('d M Y');
    $duration = '';
    if (empty($data['start_date']) || empty($data['end_date'])) {
        $duration = 'Open';
    } else {
        $duration = $data['end_date'] - $data['start_date'];
        $duration = $data / (3600 * 24 * 30);
        $duration = number_format($duration, 0) . ' MONTHS';
    }
    $course_highlight = $data['course_highlight'];
    $course_description = $data['course_description'];


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
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Course</title>

        <?php require_once 'web_links.php' ?>
        <link href='admin/files/lib/css/client/course_details.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <?php require_once 'web_header.php'; ?>

        <div class='container p-0'>
            <div class='row m-0'>
                <div class='col-12 p-0'>
                    <div class='row mx-0 p-0'>
                        <div class='col-12 col-lg-8 px-lg-4 p-1'>
                            <div class="box_highlight">
                                <ul class="additional_info">
                                    <li><i class="fas fa-clock fa-2x"></i>Course Duration<strong><?php echo $duration ?></strong></li>
                                    <li><i class="fas fa-calendar-day fa-2x"></i>Course Start<strong><?php echo $start_date ?></strong></li>
                                    <li><i class="fas fa-wallet fa-2x"></i>Course Fee<strong><?php echo $course_fee ?> UGX</strong></li>
                                </ul>
                            </div>

                            <h2>Course Highlight</h2>
                            <div id="course_highlight" class="mb-5"><?php echo $course_highlight ?></div>


                            <h2>Description</h2>
                            <?php
                                //ul = bullets
                                echo $course_description;
                            ?>
                            <hr/>

                            <h2>What will you learn</h2>
                            <ul class="list_ok">
                                <li>
                                    <h6>Suas summo id sed erat erant oporteat</h6>
                                    <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                                        posidonium necessitatibus.</p>
                                </li>
                                <li>
                                    <h6>Illud singulis indoctum ad sed</h6>
                                    <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                                        posidonium necessitatibus.</p>
                                </li>
                                <li>
                                    <h6>Alterum bonorum mentitum an mel</h6>
                                    <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                                        posidonium necessitatibus.</p>
                                </li>
                            </ul>
                            <hr>

                            <section id="lessons">
                                <div class="intro_title">
                                    <h2>Lessons</h2>
                                    <ul>
                                        <li><?php echo count($data) ?> lessons</li>
                                        <li>0 hrs</li>
                                    </ul>
                                </div>

                                <div id="accordion_lessons" role="tablist" class="mb-5">
                                    <?php
                                        $html = '';
                                        $index = 0;
                                        foreach ($data as $datum) {
                                            $index = $index + 1;
                                            $collapse = 'collapse_' . $index;
                                            $heading = 'heading_' . $index;
                                            $module_name = $datum['module_name'];

                                            $html = $html . <<<EOT
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="$heading">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" href="#$collapse" aria-expanded="true"
                                                               aria-controls="$collapse"><i class="indicator ti-minus"></i> $module_name</a>
                                                        </h5>
                                                    </div>
            
                                                    <div id="$collapse" class="collapse show" role="tabpanel" aria-labelledby="$heading"
                                                         data-parent="#accordion_lessons">
                                                        <div class="card-body">
                                                            <div class="list_lessons">
                                                                <ul>
EOT;
                                            foreach ($datum['sub_modules'] as $sub_module){
                                                $time = 'Unknown time';
                                                $sub_module_name = $sub_module['sub_module_name'];
                                                $html = $html . <<<EOT
                                                    <li><a href="javascript:void()" class="">$sub_module_name</a><span>$time</span></li>
EOT;
                                            }

                                            $html = $html . <<<EOT
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
EOT;

                                        }

                                        echo $html;
                                    ?>
                                </div>
                            </section>

                            <section id="reviews" class="d-none">
                                <h2>Reviews</h2>
                                <div class="reviews-container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div id="review_summary">
                                                <strong>4.7</strong>
                                                <div class="rating">
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star"></i>
                                                </div>
                                                <small>Based on 4 reviews</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-10 col-9">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3">
                                                    <small><strong>5 stars</strong></small>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                            <div class="row">
                                                <div class="col-lg-10 col-9">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3">
                                                    <small><strong>4 stars</strong></small>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                            <div class="row">
                                                <div class="col-lg-10 col-9">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3">
                                                    <small><strong>3 stars</strong></small>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                            <div class="row">
                                                <div class="col-lg-10 col-9">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3">
                                                    <small><strong>2 stars</strong></small>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                            <div class="row">
                                                <div class="col-lg-10 col-9">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3">
                                                    <small><strong>1 stars</strong></small>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>

                                <hr>
                                <div class="reviews-container">
                                    <div class="review-box clearfix">
                                        <figure class="rev-thumb"><img src="admin/files/images/temp/avatar.png" alt=""></figure>
                                        <div class="rev-content">
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <div class="rev-info">Admin – April 03, 2016:</div>
                                            <div class="rev-text">
                                                <p>
                                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum
                                                    sociis natoque penatibus et magnis dis
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /review-box -->
                                    <div class="review-box clearfix">
                                        <figure class="rev-thumb"><img src="admin/files/images/temp/avatar2.png" alt=""></figure>
                                        <div class="rev-content">
                                            <div class="rating">
                                                <i class="icon-star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <div class="rev-info">Ahsan – April 01, 2016:</div>
                                            <div class="rev-text">
                                                <p>
                                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum
                                                    sociis natoque penatibus et magnis dis
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /review-box -->
                                    <div class="review-box clearfix">
                                        <figure class="rev-thumb"><img src="admin/files/images/temp/avatar3.png" alt=""></figure>
                                        <div class="rev-content">
                                            <div class="rating">
                                                <i class="icon-star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <div class="rev-info">Sara – March 31, 2016:</div>
                                            <div class="rev-text">
                                                <p>
                                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum
                                                    sociis natoque penatibus et magnis dis
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /review-box -->
                                </div>
                                <!-- /review-container -->
                            </section>
                        </div>

                        <div class='col-12 col-lg-4 p-1' id='side_bar'>
                            <div class="box_detail">
                                <figure>
                                    <a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">
                                        <i class="arrow_triangle-right"></i>
                                        <img src="admin/files/images/temp/course_list.jpg" alt="" class="img-fluid">
                                        <span>View course preview</span>
                                    </a>
                                </figure>
                                <div class="price">
                                    $29<span class="original_price"><em>$49</em>60% discount price</span>
                                </div>
                                <div class='links'>
                                    <a href="cart-1.html">Purchase</a>
                                    <a href="#"><i class="icon_heart"></i> Add to wishlist</a>
                                </div>
                                <div class='clearfix'></div>

                                <div id="list_feat" class='mt-3'>
                                    <h4>What's includes</h4>
                                    <ul>
                                        <li><i class="icon_mobile"></i>Mobile support</li>
                                        <li><i class="icon_archive_alt"></i>Lesson archive</li>
                                        <li><i class="icon_mobile"></i>Mobile support</li>
                                        <li><i class="icon_chat_alt"></i>Tutor chat</li>
                                        <li><i class="icon_document_alt"></i>Course certificate</li>
                                    </ul>
                                </div>

                                <hr/>
                                <h4>Enquire now</h4>
                                <p class="d-none">Ex quem dicta delicata usu, zril vocibus maiestatis in qui.</p>
                                <form>
                                    <div class='form-row form-group mx-0'>
                                        <input class='form-control form-control-sm' type='text' placeholder='Full name'>
                                    </div>
                                    <div class='form-row form-group mx-0'>
                                        <input class='form-control form-control-sm' type='email' placeholder='Email address'>
                                    </div>
                                    <div class='form-row form-group mx-0'>
                                        <input class='form-control form-control-sm' type='tel' placeholder='Mobile contact'>
                                    </div>
                                    <div class='form-row form-group mx-0'>
                                        <textarea class='form-control form-control-sm' rows='8'
                                                  placeholder='Enter your message here'></textarea>
                                    </div>

                                    <div class='form-row mt-4 mx-0'>
                                        <div class='col-6 offset-3 p-0'>
                                            <button class='btn solid'>Enquire Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>
        <script>
            $(document).ready(function () {
                // Sticky sidebar
                $("#side_bar").theiaStickySidebar({
                    additionalMarginTop: 5
                });
            });
        </script>
    </body>
</html>