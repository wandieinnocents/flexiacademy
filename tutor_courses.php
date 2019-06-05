<?php
    $name = 'tutor_courses';
    require_once 'admin/files/functions/constants.php';
    $connection = connect_database();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Tutor Courses</title>

        <?php require_once 'web_links.php' ?>
        <link href='admin/files/lib/css/client/index.css' rel='stylesheet' type='text/css'/>
        <link href='admin/files/lib/css/client/courses.css' rel='stylesheet' type='text/css'/>
        <link href='admin/files/lib/css/client/tutor_courses.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <?php require_once 'web_header.php'; ?>

        <div class='container p-0 mb-5' id="content_container">
            <div class='row m-0'>
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
                                <h6>Course Category</h6>
                                <ul id="list_category">
                                    <?php
                                        get_categories($connection);
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 px-1 py-2">
                        <button class="btn solid">Apply Filter</button>
                    </div>
                </div>

                <div class='col-12 col-sm-6 col-md-8 col-lg-9 p-2'>
                    <div class="row mx-0" id="tutor_data">

                    </div>
                </div>
            </div>
        </div>

        <div id="create_course">
            <i class="fas fa-folder-plus"></i>
        </div>

        <!-- The Modal -->
        <div class="modal" id="course_creation_modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <figure>
                            <img src="admin/files/images/temp/logo.png" alt="">
                        </figure>

                        <div id="steps">
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>
                            <span class="step_space"></span>
                            <span class="step_pointer"></span>

                            <div class="clearfix"></div>
                        </div>

                        <h1 id="tab_header">Learning Material</h1>

                        <div id="form_data">
                            <form>
                                <input id="structure_id" class="d-none" value="0" placeholder="">

                                <div class="step_tab" id="intro">
                                    <img src="admin/files/images/images/wizard_intro_icon.svg" alt="">
                                    <h1>Course Creation</h1>
                                    <p>Exerci tibique eum cu, paulo appellantur et mei, ea partem urbanitas vim. His ei iusto nonumes
                                        atomorum. Mentitum pericula in nec. In eos habemus tibique. </p>
                                    <p><strong>Mel erant legere iuvaret ea. At eum doctus voluptatibus, has id veritus constituam.</strong>
                                    </p>
                                </div>

                                <div class="step_tab">
                                    <h1>Course Structure</h1>

                                    <div class="form-group">
                                        <label for="course_name">Course Name</label>
                                        <input type="text" class="form-control" id="course_name">
                                        <small class="error" id="course_name_error">Course name must be 3 to 200 characters</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="course_category">Course Category</label>
                                        <div class="editable_select">
                                            <select id="course_category" onchange="this.nextElementSibling.value=this.value">
                                                <?php
                                                    $statement = $connection->prepare('SELECT category_name FROM course_categories
                                                            ORDER BY category_name ASC');
                                                    $statement->execute();

                                                    foreach ($statement->fetchAll() as $row) {
                                                        $category_name = $row['category_name'];
                                                        echo "<option value='$category_name'>$category_name</option>";
                                                    }
                                                ?>
                                            </select>
                                            <input type="text" id="category_name" placeholder="Select or insert category">
                                        </div>
                                        <small class="error" id="category_name_error">
                                            Course category name must be 3 to 200 characters
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <label for="course_fee">Course Fee</label>
                                        <input type="number" class="form-control" id="course_fee" min="0">
                                        <small class="error" id="course_fee_error">Enter a valid course fee</small>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row mx-0">
                                            <div class="col-12 col-sm-6 p-1">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" class="form-control" id="start_date">
                                            </div>
                                            <div class="col-12 col-sm-6 p-1">
                                                <label for="end_date">End Date</label>
                                                <input type="date" class="form-control" id="end_date">
                                            </div>
                                            <small class="error" id="time_error">End time can not be before start time</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="course_highlight">Course Highlight</label>

                                        <div>
                                            <small class="mt-2" id="words_left"></small>
                                        </div>
                                        <div>
                                            <small class="error" id="course_highlight_error">
                                                Course highlight must not be beyond 300 characters
                                            </small>
                                        </div>
                                        <textarea class="form-control form-control-sm" rows="5" id="course_highlight"
                                                  placeholder="Enter short course highlight (300 characters)"></textarea>
                                    </div>
                                </div>

                                <div class="step_tab">
                                    <h1>Cover Image</h1>
                                    <div>
                                        <div class="custom-file w-100">
                                            <input type="file" class="custom-file-input" id="cover_image"
                                                   accept='image/jpeg, image/png'>
                                            <label class="custom-file-label" for="cover_image" id='cover_image_label'>
                                                Choose cover image photo
                                            </label>
                                        </div>
                                        <div class='w-100 mt-2'>
                                            <div id='cover_image_container'>
                                                <img src='' alt=''>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="step_tab">
                                    <div id="course_description"></div>
                                    <h1>Course Description</h1>
                                </div>

                                <div class="step_tab">
                                    <h1>Learning Material</h1>
                                    <table class="table table-striped table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" class="icheck" id="video_tutorials">
                                                        &nbsp;Video tutorials
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" class="icheck" id="document_resources">
                                                        &nbsp;Document resources
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" class="icheck" id="course_assignments">
                                                        &nbsp;Course assignments
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label><input type="checkbox" class="icheck" id="mobile_access">
                                                        &nbsp;Access on mobile</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" class="icheck" id="course_certificate">
                                                        &nbsp;Certificate on completion
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="step_tab">
                                    <h1>What You Will Learn</h1>
                                    <div id="what_you_will_learn"></div>
                                </div>

                                <div class="step_tab">
                                    <h1>Who Is This Course For</h1>
                                    <div id="who_is_this_course_for"></div>
                                </div>

                                <div class="step_tab">
                                    <h1>Why Is This Course Unique</h1>
                                    <div id="why_is_this_course"></div>
                                </div>

                                <div class="step_tab">
                                    <h1>Course Modules</h1>
                                    <div class="table_nav">
                                        <span><i class="fas fa-arrow-circle-up" id="move_module_up"></i></span>
                                        <span><i class="fas fa-arrow-circle-down" id="move_module_down"></i></span>
                                        <span><i class="fas fa-plus-circle" id="add_course_module"></i></span>
                                        <span><i class="fas fa-minus-circle" id="remove_course_module"></i></span>
                                    </div>
                                    <div class="table_data">
                                        <table class="table table-striped table-borderless" id="table_course_module">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="step_tab">
                                    <h1>Course Sub-Modules</h1>
                                    <div id="select_module_sub_modules_container">
                                        <label for="select_module_sub_modules" class="d-none"></label>
                                        <select class="custom-select" id="select_module_sub_modules"></select>
                                    </div>
                                    <div id="table_course_sub_module_container">
                                        <div class="table_nav">
                                            <span><i class="fas fa-arrow-circle-up" id="move_sub_module_up"></i></span>
                                            <span><i class="fas fa-arrow-circle-down" id="move_sub_module_down"></i></span>
                                            <span><i class="fas fa-plus-circle" id="add_course_sub_module"></i></span>
                                            <span><i class="fas fa-minus-circle" id="remove_course_sub_module"></i></span>
                                        </div>
                                        <div class="table_data">
                                            <table class="table table-striped table-borderless" id="table_course_sub_module">
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row mx-0">
                            <div class="col-4 offset-2 p-1">
                                <button class="btn solid" id="btn_back">Backward</button>
                            </div>
                            <div class="col-4 p-1">
                                <button class="btn solid" id="btn_forward">Forward</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'web_footer.php' ?>

        <script src="admin/files/lib/ckeditor/ckeditor.js"></script>
        <script src="admin/files/lib/js/custom/tutor_courses.js"></script>
    </body>
</html>
