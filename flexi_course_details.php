<?php
    $name = 'course_details';
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
                                    <li><i class="fas fa-clock fa-2x"></i>Course Duration<strong>3 Years</strong></li>
                                    <li><i class="fas fa-calendar-day fa-2x"></i>Course Start<strong>10 Sept. 2017</strong></li>
                                    <li><i class="fas fa-wallet fa-2x"></i>Course Fee<strong>2900 USD</strong></li>
                                </ul>
                            </div>

                            <!-- /box_highlight -->
                            <h2>Description</h2>
                            <p>Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris <strong>eloquentiam sed</strong>.
                                Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei
                                timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam
                                <strong>vulputate</strong> pertinacia eum at.</p>
                            <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei
                                timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam
                                vulputate pertinacia eum at.</p>
                            <div class="row mx-0">
                                <div class="col-lg-6">
                                    <ul class="bullets">
                                        <li>Dolorem mediocritatem</li>
                                        <li>Mea appareat</li>
                                        <li>Prima causae</li>
                                        <li>Singulis indoctum</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="bullets">
                                        <li>Timeam inimicus</li>
                                        <li>Oportere democritum</li>
                                        <li>Cetero inermis</li>
                                        <li>Pertinacia eum</li>
                                    </ul>
                                </div>
                            </div>
                            <hr/>

                            <h5>What will you learn</h5>
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
                                        <li>18 lessons</li>
                                        <li>01:02:10</li>
                                    </ul>
                                </div>
                                <div id="accordion_lessons" role="tablist" class="mb-5">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                   aria-controls="collapseOne"><i class="indicator ti-minus"></i> Introdocution</a>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                                             data-parent="#accordion_lessons">
                                            <div class="card-body">
                                                <div class="list_lessons">
                                                    <ul>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health
                                                                Science</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and
                                                                Social Care</a><span>00:59</span></li>
                                                        <li><a href="#" class="txt_doc">Audiology</a><span>00:59</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /card -->
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                                   aria-controls="collapseTwo">
                                                    <i class="indicator ti-plus"></i>Generative Modeling Review
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                             data-parent="#accordion_lessons">
                                            <div class="card-body">
                                                <div class="list_lessons">
                                                    <ul>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health
                                                                Science</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and
                                                                Social Care</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw"
                                                               class="video">History</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Healthcare
                                                                Science</a><span>00:59</span></li>
                                                        <li><a href="#" class="txt_doc">Audiology</a><span>00:59</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /card -->
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingThree">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false"
                                                   aria-controls="collapseThree">
                                                    <i class="indicator ti-plus"></i>Variational Autoencoders
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                                             data-parent="#accordion_lessons">
                                            <div class="card-body">
                                                <div class="list_lessons">
                                                    <ul>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health
                                                                Science</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and
                                                                Social Care</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw"
                                                               class="video">History</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Healthcare
                                                                Science</a><span>00:59</span></li>
                                                        <li><a href="#" class="txt_doc">Audiology</a><span>00:59</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /card -->

                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingFourth">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseFourth" aria-expanded="false"
                                                   aria-controls="collapseFourth">
                                                    <i class="indicator ti-plus"></i>Gaussian Mixture Model Review
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseFourth" class="collapse" role="tabpanel" aria-labelledby="headingFourth"
                                             data-parent="#accordion_lessons">
                                            <div class="card-body">
                                                <div class="list_lessons">
                                                    <ul>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health
                                                                Science</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and
                                                                Social Care</a><span>00:59</span></li>
                                                        <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw"
                                                               class="video">History</a><span>00:59</span></li>
                                                        <li>
                                                            <a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">
                                                                HealthCare Science</a><span>00:59</span>
                                                        </li>
                                                        <li><a href="#" class="txt_doc">Audiology</a><span>00:59</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /card -->
                                </div>
                            </section>

                            <section id="reviews">
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
                                <p>Ex quem dicta delicata usu, zril vocibus maiestatis in qui.</p>
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