$(document).ready(function () {
    new MultiForm();
});

class MultiForm {
    constructor() {
        const parent = this;
        this.current_tab = 0;
        this.changed = false;

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

        const modal = $('#course_creation_modal');

        modal.find('input').on('change paste keyup keydown', function () {
            parent.changed = true;
        });

        modal.find('select').on('change', function () {
            parent.changed = true;
        });

        modal.find('textarea').on('change paste keyup keydown', function () {
            parent.changed = true;
        });

        modal.on('ifChanged ifChecked ifUnChecked', '.icheck', function () {
            parent.changed = true;
        });

        /*module course tables*/
        $('#add_course_module').on('click', function () {
            MultiForm.add_table_row('module', 0, '0', '');
        });
        $('#remove_course_module').on('click', function () {
            MultiForm.remove_table_row('module');
        });
        $('#move_module_up').on('click', function () {
            MultiForm.change_position('module', -1);
        });
        $('#move_module_down').on('click', function () {
            MultiForm.change_position('module', +1);
        });
        $('#table_course_module > tbody').on('click', 'tr', function () {
            const tr = $('#table_course_module tr');
            const index = tr.index(this);
            MultiForm.set_active(tr, index);
        });

        /*submodule course table*/
        $('#add_course_sub_module').on('click', function () {
            if (parent.current_module === '0') {
                alertify.error('No module selected');
                return;
            }
            MultiForm.add_table_row('sub_module', 0, '0', '');
        });
        $('#remove_course_sub_module').on('click', function () {
            if (parent.current_module === '0') {
                alertify.error('No module selected');
                return;
            }
            MultiForm.remove_table_row('sub_module');
        });
        $('#move_sub_module_up').on('click', function () {
            if (parent.current_module === '0') {
                alertify.error('No module selected');
                return;
            }
            MultiForm.change_position('sub_module', -1);
        });
        $('#move_sub_module_down').on('click', function () {
            if (parent.current_module === '0') {
                alertify.error('No module selected');
                return;
            }
            MultiForm.change_position('sub_module', +1);
        });
        $('#table_course_sub_module > tbody').on('click', 'tr', function () {
            const tr = $('#table_course_module tr');
            const index = tr.index(this);
            MultiForm.set_active(tr, index);
        });

        this.structure_id = $('#structure_id');
        this.course_name = $('#course_name');
        this.category_name = $('#category_name');
        this.course_fee = $('#course_fee');
        this.start_date = $('#start_date');
        this.end_date = $('#end_date');
        this.course_highlight = $('#course_highlight');
        this.modules = [];

        this.course_highlight.on('change paste keyup keydown', function () {
            const words = parent.course_highlight.val().length;
            const left = 300 - words;

            const words_left = $('#words_left');
            words_left.html("<span style='font-size: 90%; font-weight: 800'>" + left + "</span> characters remaining");
            words_left.css({'color': left < 0 ? 'red' : 'green'});
        });
        this.course_highlight.change();

        $("#cover_image").change(function (element) {
            MyFunctions.input_changed(element, $("#cover_image_label"));

            const url = $(this).val();
            const ext = url.substring(url.lastIndexOf(".") + 1).toLocaleLowerCase();
            if (this.files && this.files[0] && (ext === "jpeg" || ext === "jpg" || ext === "png" || ext === "gif")) {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    // noinspection JSUnresolvedVariable
                    $("#cover_image_container > img").attr("src", ev.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        this.video_tutorials = $('#video_tutorials');
        this.document_resources = $('#document_resources');
        this.mobile_access = $('#mobile_access');
        this.course_certificate = $('#course_certificate');
        this.course_assignments = $('#course_assignments');

        this.current_module = '0';
        this.select_module_sub_modules = $('#select_module_sub_modules');
        this.all_sub_true = true;
        this.select_module_sub_modules.on('change', function () {
            let final_modules = [];
            parent.all_sub_true = true;

            for (let index = 0; index < parent.modules.length; index++) {
                const module = parent.modules[index];
                const module_name = module['module_name'];

                if (parent.current_module === module_name) {
                    let rows = $('#table_course_sub_module tr');

                    let temp = [];
                    let sub_modules = [];
                    for (let index = 0; index < rows.length; index++) {
                        const sub_module_name = $.trim(rows.eq(index).find('input.module_name').val());
                        if (temp.indexOf(sub_module_name) > -1) {
                            alertify.alert('\"' + sub_module_name + '\" is already provided');
                            parent.select_module_sub_modules.val(parent.current_module);
                            parent.all_sub_true = false;
                            return;
                        }
                        if (sub_module_name.length < 5) {
                            alertify.alert('A sub module name cannot be less than 5 characters');
                            parent.select_module_sub_modules.val(parent.current_module);
                            parent.all_sub_true = false;
                            return;
                        }

                        temp.push(module_name);
                        sub_modules.push(
                            {
                                sub_module_name: sub_module_name,
                                sub_module_id: rows.eq(index).find('input.module_id').val(),
                                viewable: rows.eq(index).find('input.use_module').is(':checked') ? 1 : 0,
                                order: (index + 1)
                            }
                        );
                    }
                    module['sub_modules'] = sub_modules;
                }
                final_modules.push(module);
            }
            parent.modules = final_modules;
            parent.current_module = parent.select_module_sub_modules.val();

            const tbody = $('#table_course_sub_module > tbody');
            tbody.html('');

            for (let module_count = 0; module_count < parent.modules.length; module_count++) {
                const module = parent.modules[module_count];
                if (module['module_name'] === parent.current_module) {
                    const sub_modules = module['sub_modules'];

                    for (let sub_index = 0; sub_index < sub_modules.length; sub_index++) {
                        const sub_module = sub_modules[sub_index];
                        MultiForm.add_table_row(
                            'sub_module',
                            parseInt(sub_module['viewable']),
                            sub_module['sub_module_id'],
                            sub_module['sub_module_name']);
                    }
                    break
                }
            }
        });
        modal.on('show.bs.modal', function () {
            parent.course_name.val('');
            parent.category_name.val('');
            parent.course_fee.val('');
            parent.start_date.val('');
            parent.end_date.val('');
            parent.course_highlight.val('');

            $("#cover_image_container > img").attr("src", "");
            $("#cover_image_label").html('Choose cover image photo');

            parent.course_description.set_data("");
            parent.what_you_will_learn.set_data("");
            parent.who_is_this_course_for.set_data("");
            parent.why_is_this_course.set_data("");

            parent.video_tutorials.attr('checked', false);
            parent.video_tutorials.iCheck('update');
            parent.course_assignments.attr('checked', false);
            parent.course_assignments.iCheck('update');
            parent.document_resources.attr('checked', false);
            parent.document_resources.iCheck('update');
            parent.mobile_access.attr('checked', false);
            parent.mobile_access.iCheck('update');
            parent.course_certificate.attr('checked', false);
            parent.course_certificate.iCheck('update');

            parent.modules = [];
            parent.changed = false;
        });

        modal.on('shown.bs.modal', function () {
            parent.current_tab = 0;
            parent.show_tab();
            parent.changed = false;

            parent.course_description.resize_editor();
            parent.what_you_will_learn.resize_editor();
            parent.why_is_this_course.resize_editor();
            parent.who_is_this_course_for.resize_editor();

            if (parseInt(parent.structure_id.val()) > 0) {
                const loader = new Loader("Fetching course list, please wait");

                $.post("admin/files/functions/api/tutor/get_course_data.php",
                    {structure_id: parent.structure_id.val()}, function (data) {

                        data = JSON.parse(data);

                        parent.course_name.val(data['course_name']);
                        parent.category_name.val(data['category_name']);
                        parent.course_fee.val(data['course_fee']);
                        parent.start_date.val(data['start_date']);
                        parent.end_date.val(data['end_date']);
                        parent.course_highlight.val(data['course_highlight']);

                        if (data["cover_image"] !== "") {
                            $("#cover_image_container > img").attr("src", "admin/files/images/pictures/" + data["cover_image"]);
                            $("#cover_image_label").html(data["cover_image"]);
                        }

                        parent.course_description.set_data(data['course_description']);

                        const learning_material = JSON.parse(data['learning_material']);

                        if ('video_tutorials' in learning_material) {
                            parent.video_tutorials.attr('checked', parseInt(learning_material['video_tutorials']) === 1);
                            parent.video_tutorials.iCheck('update');
                        }
                        if ('document_resources' in learning_material) {
                            parent.document_resources.attr('checked', parseInt(learning_material['document_resources']) === 1);
                            parent.document_resources.iCheck('update');
                        }
                        if ('course_assignments' in learning_material) {
                            parent.course_assignments.attr('checked', parseInt(learning_material['course_assignments']) === 1);
                            parent.course_assignments.iCheck('update');
                        }
                        if ('mobile_access' in learning_material) {
                            parent.mobile_access.attr('checked', parseInt(learning_material['mobile_access']) === 1);
                            parent.mobile_access.iCheck('update');
                        }
                        if ('course_certificate' in learning_material) {
                            parent.course_certificate.attr('checked', parseInt(learning_material['course_certificate']) === 1);
                            parent.course_certificate.iCheck('update');
                        }

                        parent.what_you_will_learn.set_data(data['what_you_learn']);
                        parent.who_is_this_course_for.set_data(data['who_is_for']);
                        parent.why_is_this_course.set_data(data['why_unique']);

                        parent.display_modules(data['modules']);

                        loader.hide_modal();
                        parent.changed = false;
                    }, "text"
                );
            }
        });

        modal.on('hidden.bs.modal', function () {
            parent.structure_id.val('0');
        });

        this.get_tutor_courses();

        $('#tutor_data').on('click', '.edit_structure', function () {
            const index = $('.edit_structure').index(this);
            const structure_id = $('#tutor_data .structure_id_courses').eq(index).html();
            $('#structure_id').val(structure_id);
            modal.modal({show: true, backdrop: "static", keyboard: true});
        });

        $('#create_course').on('click', function () {
            $('#structure_id').val('0');
            modal.modal({show: true, backdrop: "static", keyboard: true});
        });

        this.course_description = new Editor(parent, parent.step_tab.eq(0), 'course_description', 0);
        this.what_you_will_learn = new Editor(parent, parent.step_tab.eq(0), 'what_you_will_learn', 0);
        this.why_is_this_course = new Editor(parent, parent.step_tab.eq(0), 'why_is_this_course', 0);
        this.who_is_this_course_for = new Editor(parent, parent.step_tab.eq(0), 'who_is_this_course_for', 0);

        parent.who_is_this_course_for.list_editor();
        parent.what_you_will_learn.list_editor();
        parent.why_is_this_course.list_editor();
    }

    display_modules(modules) {
        this.modules = modules;

        const tbody = $('#table_course_module > tbody');
        tbody.html('');

        for (let index = 0; index < this.modules.length; index++) {
            const module = this.modules[index];
            MultiForm.add_table_row('module', parseInt(module['viewable']),
                module['module_id'], module['module_name']);

        }
    }

    get_tutor_courses() {
        const loader = new Loader("Fetching course list, please wait");
        $.post("admin/files/functions/api/tutor/get_tutor_courses.php",
            {}, function (data) {
                loader.hide_modal();
                $('#tutor_data').html(data);
                max_4();
            }, "text"
        );
    }

    show_tab() {
        this.btn_back.attr('disabled', this.current_tab === 0);
        //this.btn_forward.attr('disabled', (this.current_tab === (this.step_tab.length - 1)));

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

        $('#course_creation_modal  h1#tab_header').html(this.step_tab.eq(this.current_tab).find('h1').eq(0).html());

        if (this.current_tab === 9) {
            let html = "<option value='0' selected>Select a module to edit sub modules</option>";
            for (let index = 0; index < this.modules.length; index++) {
                const module_name = this.modules[index]['module_name'];
                html = html + "<option value='" + module_name + "'>" + module_name + "</option>";
            }
            this.select_module_sub_modules.html(html);
            this.select_module_sub_modules.change();
            this.current_module = '0';
        }
        this.changed = false;
    }

    next_prev_tab(index) {
        const parent = this;
        const errors = $('small.error');
        errors.addClass('d-none');

        let current_tab = this.current_tab + index;
        if (current_tab < 0 || current_tab > this.step_tab.length) {
            alertify.error('Dead end');
            return;
        }

        const course_name = $.trim(this.course_name.val());
        const category_name = $.trim(this.category_name.val());
        const course_fee = $.trim(this.course_fee.val());
        const start_date = MyFunctions.get_time_in_seconds(this.start_date.val());
        const end_date = MyFunctions.get_time_in_seconds(this.end_date.val());
        const course_highlight = $.trim(this.course_highlight.val());

        const cover_image = $("#cover_image");
        const course_description = parent.course_description.get_data();
        const what_you_learn = parent.what_you_will_learn.get_data();
        const who_is_for = parent.who_is_this_course_for.get_data();
        const why_unique = parent.why_is_this_course.get_data();

        let modules = [];

        if (this.current_tab === 1) {
            if (course_name.length < 3) {
                $('#course_name_error').removeClass('d-none');
            }
            if (category_name.length < 3) {
                $('#category_name_error').removeClass('d-none');
            }
            if (!MyFunctions.is_number_valid(course_fee)) {
                $('#course_fee_error').removeClass('d-none');
            } else if (parseFloat(course_fee) < 0) {
                $('#course_fee_error').removeClass('d-none');
            }

            if (end_date !== '' && start_date !== '' && parseFloat(end_date) < parseFloat(start_date)) {
                $('#time_error').removeClass('d-none');
            }

            if (course_highlight.length > 300) {
                $('#course_highlight_error').removeClass('d-none');
            }

        } else if (this.current_tab === 2) {
            if (cover_image.val() !== "") {
                if (Math.round(cover_image[0].files[0].size / 1024) >= 4096) {
                    alertify.error("Cover image file must be maximum 4Mbs ("
                        + Math.round(cover_image[0].files[0].size / 1024 / 1024) + "kbs " + "chosen)");
                    cover_image.focus();
                    return;
                }
            } else if ($("#cover_image_container > img").attr("src") === '') {
                alertify.error('Please provide a cover image');
                return;
            }
        } else if (this.current_tab === 3) {
            if (course_description.length < 200) {
                alertify.error('Please enter an exhaustive course description');
                return;
            }
        } else if (this.current_tab === 5) {
            if (what_you_learn.indexOf('<ol>') < 0) {
                alertify.error('Please enter data in an ordered list');
                return;
            }
        } else if (this.current_tab === 6) {
            if (who_is_for.indexOf('<ol>') < 0) {
                alertify.error('Please enter data in an ordered list');
                return;
            }
        } else if (this.current_tab === 7) {
            if (why_unique.indexOf('<ol>') < 0) {
                alertify.error('Please enter data in an ordered list');
                return;
            }
        } else if (this.current_tab === 8) {
            let rows = $('#table_course_module tr');

            let temp = [];
            for (let index = 0; index < rows.length; index++) {
                const module_name = $.trim(rows.eq(index).find('input.module_name').val());
                if (temp.indexOf(module_name) > -1) {
                    alertify.alert('\"' + module_name + '\" is already provided');
                    return;
                }
                if (module_name.length < 5) {
                    alertify.alert('A module name cannot be less than 5 characters');
                    return;
                }

                temp.push(module_name);
                modules.push(
                    {
                        name: module_name,
                        id: rows.eq(index).find('input.module_id').val(),
                        use: rows.eq(index).find('input.use_module').is(':checked') ? 1 : 0,
                        order: (index + 1)
                    }
                );
            }
        }

        for (let index = 0; index < errors.length; index++) {
            if (!errors.eq(index).hasClass('d-none')) {
                alertify.error("Errors found");
                return;
            }
        }

        if (this.current_tab === 0) {
            parent.current_tab = current_tab;
            parent.show_tab();

        }

        if (this.changed) {
            if (this.current_tab === 0) {
                parent.current_tab = current_tab;
                parent.show_tab();

            } else if (this.current_tab === 1) {
                const loader = new Loader("Saving course structure, please wait");

                $.post("admin/files/functions/api/tutor/save_course_structure.php",
                    {
                        structure_id: parent.structure_id.val(),
                        course_name: course_name,
                        category_name: category_name,
                        course_fee: course_fee,
                        start_date: start_date,
                        end_date: end_date,
                        course_highlight: course_highlight,

                    }, function (data) {
                        console.log(data);
                        loader.hide_modal();

                        data = JSON.parse(data);

                        switch (parseInt(data["code"])) {
                            case 1:
                                parent.current_tab = current_tab;
                                parent.show_tab();
                                break;
                            case 2:
                                alertify.alert("Course Name is already in use");
                                break;
                            default:
                                alertify.alert("System error occurred please retry");
                                break;
                        }
                    }, "text"
                );
            } else if (this.current_tab === 2) {
                const form_data = new FormData();
                form_data.append("structure_id", parent.structure_id.val());
                form_data.append("cover_image", cover_image[0].files[0]);

                const loader = new Loader("Uploading cover image, please wait");
                $.ajax({
                    xhr: function () {
                        // noinspection JSValidateTypes
                        const xhr = new window.XMLHttpRequest();
                        // noinspection JSUnresolvedVariable
                        xhr.upload.addEventListener("progress", function (event) {
                            if (event.lengthComputable) {
                                loader.update_progress(event.loaded, event.total);
                            }
                        }, false);
                        return xhr;
                    },
                    url: "admin/files/functions/api/tutor/save_cover_photo.php", type: "POST", data: form_data,
                    async: true, cache: false, contentType: false, processData: false,
                    success: function (response) {
                        loader.hide_modal();
                        console.log(response);
                        response = JSON.parse(response);
                        if (parseInt(response["code"]) === 1) {
                            parent.current_tab = current_tab;
                            parent.show_tab();
                        } else {
                            alertify.alert("Cover image could not be uploaded, please retry");
                        }
                    }
                });
            } else if (this.current_tab === 3) {
                this.save_course_information(current_tab, "save_course_description", course_description);
            } else if (this.current_tab === 4) {
                const post_data = {
                    video_tutorials: this.video_tutorials.is(':checked') ? 1 : 0,
                    document_resources: this.document_resources.is(':checked') ? 1 : 0,
                    mobile_access: this.mobile_access.is(':checked') ? 1 : 0,
                    course_certificate: this.course_certificate.is(':checked') ? 1 : 0,
                    course_assignments: this.course_assignments.is(':checked') ? 1 : 0,
                };
                this.save_course_information(current_tab, "save_learning_material", JSON.stringify(post_data));
            } else if (this.current_tab === 5) {
                this.save_course_information(current_tab, "save_what_you_learn", what_you_learn);

            } else if (this.current_tab === 6) {
                this.save_course_information(current_tab, "save_who_is_for", who_is_for);

            } else if (this.current_tab === 7) {
                this.save_course_information(current_tab, "save_why_unique", why_unique);

            } else if (this.current_tab === 8) {
                const loader = new Loader("Saving course modules, please wait");

                $.post("admin/files/functions/api/tutor/save_course_modules.php",
                    {
                        structure_id: parent.structure_id.val(),
                        modules: JSON.stringify(modules)

                    }, function (data) {
                        console.log(data);
                        loader.hide_modal();

                        data = JSON.parse(data);

                        if (parseInt(data["code"]) === 1) {
                            parent.display_modules(data['modules']);
                            parent.current_tab = current_tab;
                            parent.show_tab();
                        } else {
                            alertify.alert("System error occurred please retry");
                        }
                    }, "text"
                );
            } else if (this.current_tab === 9) {
                this.select_module_sub_modules.change();
                if (!parent.all_sub_true) {
                    alertify.error("Incorrect data found, cannot continue");
                    return
                }

                const loader = new Loader("Saving course sub modules, please wait");

                $.post("admin/files/functions/api/tutor/save_sub_modules.php",
                    {
                        structure_id: parent.structure_id.val(),
                        modules: JSON.stringify(parent.modules)

                    }, function (data) {
                        console.log(data);
                        loader.hide_modal();

                        data = JSON.parse(data);

                        if (parseInt(data["code"]) === 1) {
                            parent.display_modules(data['modules']);
                            parent.select_module_sub_modules.val('0');
                            parent.select_module_sub_modules.change();
                            alertify.alert('Data saved successfully');
                        } else {
                            alertify.alert("System error occurred please retry");
                        }
                    }, "text"
                );
            }
        } else {
            if (current_tab < (this.step_tab.length - 1)) {
                this.current_tab = current_tab;
                this.show_tab();
            }
        }
    }

    save_course_information(current_tab, operation, post_data) {
        const loader = new Loader("Saving course information, please wait");
        const parent = this;

        $.post("admin/files/functions/api/tutor/save_misc_data.php",
            {
                operation: operation,
                structure_id: parent.structure_id.val(),
                post_data: post_data,

            }, function (data) {
                console.log(data);
                loader.hide_modal();

                data = JSON.parse(data);
                if (parseInt(data["code"]) === 1) {
                    parent.current_tab = current_tab;
                    parent.show_tab();
                } else {
                    alertify.alert("System error occurred please retry");
                }
            }, "text"
        );
    }

    static change_position(type, alter) {
        let table = '';
        if (type === 'module') {
            table = '#table_course_module';
        } else if (type === 'sub_module') {
            table = '#table_course_sub_module';
        } else {
            return;
        }

        let index = -1;
        let rows = $(table + ' tr');
        for (let count = 0; count < rows.length; count++) {
            if (rows.eq(count).hasClass('active')) {
                index = count;
                break;
            }
        }

        if (index === -1) {
            alertify.error('No row selected');
            return;
        }

        const new_pos = index + alter;
        if (new_pos < 0) {
            alertify.error("Top position reached");
            return;
        }

        if (new_pos === rows.length) {
            alertify.error("Bottom position reached");
            return;
        }

        if (alter === -1) {
            rows.eq(index).after(rows.eq(new_pos));
        } else {
            rows.eq(index).before(rows.eq(new_pos));
        }
    }

    static remove_table_row(type) {
        let table = '';
        if (type === 'module') {
            table = '#table_course_module';
        } else if (type === 'sub_module') {
            table = '#table_course_sub_module';
        } else {
            return;
        }

        let index = -1;
        let rows = $(table + ' tr');
        for (let count = 0; count < rows.length; count++) {
            if (rows.eq(count).hasClass('active')) {
                index = count;
                break;
            }
        }

        if (index === -1) {
            alertify.error('No row selected');
            return;
        }

        if (parseInt(rows.eq(index).find('input.module_id').val()) > 0) {
            alertify.error('Module already has attached sub modules, it cannot be deleted');
            return;
        }

        rows.eq(index).remove();

        rows = $(table + ' tr');
        rows.eq((index === rows.length) ? (index - 1) : index).addClass('active');
    }

    static add_table_row(type, check, module_id, module_name) {
        let table = '';
        if (type === 'module') {
            table = '#table_course_module';
        } else if (type === 'sub_module') {
            table = '#table_course_sub_module';
        } else {
            return;
        }

        let inputs = $(table + ' .module_name');

        for (let index = 0; index < inputs.length; index++) {
            const input = inputs.eq(index);

            if ($.trim(input.val()) === '') {
                alertify.error('Empty data');
                return;
            }
        }

        const tbody = $(table).find('tbody');

        const tr = $("<tr />", {});

        if (check === 0) {
            tr.append($("<td />", {style: 'width : 30px'}).append($("<input />", {
                class: "icheck use_module", type: 'checkbox',
            })));
        } else {
            tr.append($("<td />", {style: 'width : 30px'}).append($("<input />", {
                class: "icheck use_module", type: 'checkbox', checked: 'checked'
            })));
        }

        tr.append($("<td />", {class: 'd-none'}).append($("<input />", {
            class: "module_id", value: module_id
        })));

        tr.append($("<td />", {}).append($("<input />", {
            class: "form-control form-control-sm module_name", type: 'text', placeholder: "Enter course module name", value: module_name
        })));

        tbody.append(tr);

        $("input.icheck").iCheck({
            checkboxClass: "icheckbox_square-grey",
            radioClass: "iradio_square-grey"
        });

        const trs = $(table + ' tr');
        MultiForm.set_active(trs, trs.length - 1);
    }

    static set_active(tr, index) {
        for (let count = 0; count < tr.length; count++) {
            tr.eq(count).removeClass('active');
        }
        tr.eq(index).addClass('active');
    }
}

class Editor {
    constructor(multi_form, parent_element, element, index) {
        const parent = this;
        this.multi_form = multi_form;

        this.parent_element = parent_element;
        this.element = element;
        if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
            CKEDITOR.tools.enableHtml5Elements(document);

        // The trick to keep the editor in the sample quite small
        // unless user specified own height.
        CKEDITOR.config.height = 100;
        CKEDITOR.config.width = 'auto';
        CKEDITOR.config.toolbar = Editor.toolbar(index);
        CKEDITOR.config.uiColor = getComputedStyle(document.documentElement, null).getPropertyValue('--main_color');


        const area_available = Editor.is_area_available();

        this.editorElement = CKEDITOR.document.getById(element);

        // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
        if (area_available) {
            const editor = CKEDITOR.replace(element, {
                on: {
                    instanceReady: function () {
                        parent.resize_editor();
                    }
                }
            });

            editor.on('change', function () {
                parent.multi_form.changed = true;
            });
        } else {
            this.editorElement.setAttribute('contenteditable', 'true');
            CKEDITOR.inline(element);

            // TODO we can consider displaying some info box that
            // without wysiwygarea the classic editor may not work.
        }

        window.onresize = function () {
            parent.resize_editor();
        }
    }

    static toolbar(index) {
        const toolbar = [
            [
                {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript']},
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                }
            ]

        ];
        return toolbar[index];
    }

    resize_editor() {
        let height = this.parent_element.innerHeight() - 105;
        height = height < 200 ? 200 : height;
        CKEDITOR.instances[this.element].resize('100%', height)
    }

    list_editor() {
        const parent = this;
        parent.set_data("<ol><li></li></ol>");
    }

    get_data() {
        return $.trim(CKEDITOR.instances[this.element].getData());
    }

    set_data(data) {
        return CKEDITOR.instances[this.element].setData(data);
    }

    static is_area_available() {
        if (CKEDITOR.revision === ('%RE' + 'V%')) {
            return true;
        }
        return !!CKEDITOR.plugins.get('wysiwygarea');
    }
}

