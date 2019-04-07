<?php
    $name = 'user_courses';
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
        <div class='container-fluid p-0'>
            <div class='row m-0'>
                <div class='col-12 col-sm-4 col-md-3 col-lg-2 p-1 p-md-3' id='side_navbar'>
                    <?php require_once 'web_sidebar.php' ?>
                </div>

                <div class='col-12 col-sm-8 col-md-7 col-lg-10 p-0'>
                    <div class='row mx-0 p-0'>
                        <div class='col-12 col-lg-9 px-lg-4 p-1'>
                            <div class='row mx-0'>
                                <?php
                                    for ($index = 0; $index < 15; $index++) {
                                        $width = rand(8, 100) . '%';
                                        echo <<<EOT
                                                    <div class='col-12 col-lg-6 p-1'>
                                                        <a href='#' class='anchor'>
                                                            <div class='list_container p-1'>
                                                                <div>
                                                                     <img src='admin/files/images/temp/course_list.jpg'>
                                                                </div>
                                                                <div>
                                                                     <div class='content'>
                                                                        <h4>Persius delenit has cu</h4>
                                                                        <p>
                                                                                Dicam diceret ut ius, no epicuri dissentiet philosophia vix. 
                                                                                Usu decore percipitur definitiones ex, nihil utinam recusabo mel no. 
                                                                        </p>
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
                                ?>
                            </div>
                        </div>

                        <div class='col-12 col-lg-3 p-1'>
                            <div class='row mx-0'>
                                <div class='col-12'>
                                    <h4>Suggested Courses</h4>
                                </div>
                                <div class="col-12 p-1">
                                    <div class="box_grid wow">
                                        <figure class="block-reveal">
                                            <div class="block_horizontal"></div>
                                            <a href="#" class="wish_bt"></a>
                                            <a href="flexi_course_details.php?course=2">
                                                <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                            </a>
                                            <div class="price">$65</div>
                                            <div class="preview"><span>Preview course</span></div>
                                        </figure>
                                        <div class="wrapper">
                                            <small>Category</small>
                                            <h3>Ei has exerci graecis</h3>
                                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                                        </div>
                                        <ul>
                                            <li><i class="fas fa-clock"></i> 1h 30min</li>
                                            <li><i class="fas fa-thumbs-up"></i> 890</li>
                                            <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-12 p-1">
                                    <div class="box_grid wow">
                                        <figure class="block-reveal">
                                            <div class="block_horizontal"></div>
                                            <a href="#" class="wish_bt"></a>
                                            <a href="flexi_course_details.php?course=2">
                                                <img src="admin/files/images/temp/course_list.jpg" class="img-fluid" alt="">
                                            </a>
                                            <div class="price">$65</div>
                                            <div class="preview"><span>Preview course</span></div>
                                        </figure>
                                        <div class="wrapper">
                                            <small>Category</small>
                                            <h3>Ei has exerci graecis</h3>
                                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                                        </div>
                                        <ul>
                                            <li><i class="fas fa-clock"></i> 1h 30min</li>
                                            <li><i class="fas fa-thumbs-up"></i> 890</li>
                                            <li><a href="flexi_course_details.php?course=2">Enroll now</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>
    </body>
</html>
