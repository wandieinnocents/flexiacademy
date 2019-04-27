<?php
    $name = 'tutor_courses';
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Tutor Courses</title>

        <?php require_once 'web_links.php' ?>
        <link href='admin/files/lib/css/client/tutor_courses.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <?php require_once 'web_header.php'; ?>

        <div class='container p-0' id="content_container">
            <div class='row m-0'>
                <div class='col-12 col-lg-9 px-lg-4 p-1'>

                </div>

                <div class='col-12 col-lg-3 p-1'>

                </div>
            </div>
        </div>

        <div id="create_course" data-toggle="modal" data-target="#course_creation_modal">
            <i class="fas fa-folder-plus"></i>
        </div>

        <!-- The Modal -->
        <div class="modal" id="course_creation_modal">
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

                            <div class="clearfix"></div>
                        </div>

                        <div id="form_data">
                            <form>
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
                                    </div>

                                    <div class="form-group">
                                        <label for="course_category">Course Category</label>
                                       <div>
                                           <select id="course_category" class="custom-select">
                                               <option selected>Custom Select Menu</option>
                                               <option value="volvo">Volvo</option>
                                               <option value="fiat">Fiat</option>
                                               <option value="audi">Audi</option>
                                           </select>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="course_fee">Course Fee</label>
                                        <input type="number" class="form-control" id="course_fee">
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
                                        </div>
                                    </div>
                                </div>

                                <div class="step_tab">
                                    <h1>Learning Material</h1>
                                </div>

                                <div class="step_tab">
                                    <h1>Course Module</h1>
                                </div>

                                <div class="step_tab">
                                    <h1>Module Description</h1>
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

        <script>

            $(document).ready(function () {
                new MultiForm();
            });

            class MultiForm {
                constructor() {
                    const parent = this;
                    this.current_tab = 0;

                    this.step_tab = $('.step_tab');
                    this.btn_back = $('#btn_back');
                    this.btn_forward = $('#btn_forward');

                    this.step_pointer = $('.step_pointer');
                    this.step_space = $('.step_space');

                    this.btn_back.click(function () {
                        parent.next_prev_tab(-1);
                    });

                    this.btn_forward.click(function () {
                        parent.next_prev_tab(1);
                    });

                    this.show_tab();
                }

                show_tab() {
                    this.btn_back.attr('disabled', this.current_tab === 0);
                    this.btn_forward.html(this.current_tab === (this.step_tab.length - 1) ? 'Submit' : 'Next');

                    for (let index = 0; index < this.step_pointer.length; index++) {
                        if (this.step_pointer.eq(index).hasClass('finished')) {
                            this.step_pointer.eq(index).removeClass('finished');
                        }
                    }
                    for (let index = 0; index <= this.current_tab; index++) {
                        this.step_pointer.eq(index).addClass('finished');
                    }

                    for (let index = 0; index < this.step_space.length; index++) {
                        if (this.step_space.eq(index).hasClass('finished')) {
                            this.step_space.eq(index).removeClass('finished');
                        }
                    }
                    for (let index = 0; index < this.current_tab; index++) {
                        this.step_space.eq(index).addClass('finished');
                    }

                    for (let index = 0; index < this.step_tab.length; index++) {
                        this.step_tab.eq(index).addClass('d-none');
                    }

                    this.step_pointer.eq(this.current_tab).addClass('finished');
                    this.step_tab.eq(this.current_tab).removeClass('d-none');
                }

                next_prev_tab(index) {
                    if (!MultiForm.validate_form()) {
                        return;
                    }

                    let current_tab = this.current_tab + index;
                    if (current_tab < 0 || current_tab >= this.step_tab.length) {
                        return;
                    }

                    this.current_tab = current_tab;
                    this.show_tab(this.current_tab);
                }

                static validate_form() {
                    return true;
                }
            }
        </script>
    </body>
</html>
