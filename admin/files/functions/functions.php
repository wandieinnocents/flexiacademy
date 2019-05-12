<?php
    /**
     * Created by IntelliJ IDEA.
     * User: william
     * Date: 4/30/19
     * Time: 11:12 AM
     */

    require_once 'constants.php';

    if (isset($_POST['operation'])) {
        new TutorCourses();
    }

    class TutorCourses {
        private $connection;

        public function __construct() {
            $this->connection = connect_database();
            switch ($_POST['operation']) {
                case 'save_course_structure':
                    $this->save_course_structure();
                    break;
                case 'get_tutor_courses':
                    $this->get_tutor_courses();
                    break;
                case 'get_course_data':
                    $this->get_course_data();
                    break;
                case 'save_cover_photo':
                    $this->save_cover_photo();
                    break;
                case 'save_course_description':
                    $this->save_misc_data('course_description');
                    break;
                case 'save_learning_material':
                    $this->save_misc_data('learning_material');
                    break;
                case 'save_what_you_learn':
                    $this->save_misc_data('what_you_learn');
                    break;
                case 'save_who_is_for':
                    $this->save_misc_data('who_is_for');
                    break;
                case 'save_why_unique':
                    $this->save_misc_data('why_unique');
                    break;
                case 'save_course_modules':
                    $this->save_course_modules();
                    break;
                case 'save_sub_modules':
                    $this->save_sub_modules();
            }
        }

        private function save_course_structure() {
            $statement = $this->connection->prepare('SELECT category_id FROM course_categories 
                              WHERE category_name = :category_name LIMIT 1');
            $statement->bindParam(':category_name', $_POST['category_name']);
            $statement->execute();
            if ($statement->rowCount() == 1) {
                $category_id = ($statement->fetch())['category_id'];
            } else {
                $statement = $this->connection->prepare('INSERT INTO course_categories (category_name) VALUES (:category_name)');
                $statement->bindParam(':category_name', $_POST['category_name']);
                $statement->execute();
                $category_id = $this->connection->lastInsertId();
            }

            $start_date = empty($_POST['start_date']) ? 0 : $_POST['start_date'];
            $end_date = empty($_POST['end_date']) ? 0 : $_POST['end_date'];

            if ($_POST['structure_id'] == 0) {
                $statement = $this->connection->prepare('INSERT INTO course_structure (category_id, course_name, course_fee, 
                              start_date, end_date, course_highlight, course_description, learning_material) VALUES (:category_id, 
                              :course_name, :course_fee, :start_date, :end_date, :course_highlight, :course_description, :learning_material)');

                $course_description = '';
                $learning_material = '{}';
                $statement->bindParam(':course_description', $course_description);
                $statement->bindParam(':learning_material', $learning_material);

            } else {
                $statement = $this->connection->prepare('UPDATE course_structure SET category_id = :category_id, 
                                  course_name = :course_name, course_fee = :course_fee, start_date = :start_date, end_date = :end_date,
                                  course_highlight = :course_highlight WHERE structure_id = :structure_id');
                $statement->bindParam(':structure_id', $_POST['structure_id']);
            }

            $statement->bindParam(':category_id', $category_id);
            $statement->bindParam(':course_name', $_POST['course_name']);
            $statement->bindParam(':course_fee', $_POST['course_fee']);
            $statement->bindParam(':start_date', $start_date);
            $statement->bindParam(':end_date', $end_date);
            $statement->bindParam(':course_highlight', $_POST['course_highlight']);

            $statement->execute();
            $structure_id = $_POST['structure_id'] == 0 ? $this->connection->lastInsertId() : $_POST['structure_id'];

            $course_categories = '';
            $statement = $this->connection->prepare('SELECT category_name FROM course_categories ORDER BY category_name ASC ');
            $statement->execute();

            foreach ($statement->fetchAll() as $row) {
                $category_name = $row['category_name'];
                $course_categories = $course_categories . "<option value='$category_name'>$category_name</option>";
            }

            echo json_encode(['code' => 1, 'structure_id' => $structure_id, 'course_categories' => $course_categories]);
        }

        private function save_cover_photo() {
            require_once 'ImageResize.php';

            $statement = $this->connection->prepare('SELECT cover_image FROM course_structure 
                      WHERE structure_id = :structure_id LIMIT 1');
            $statement->bindParam(':structure_id', $_POST['structure_id']);
            $statement->execute();
            $current_image = ($statement->fetch())['cover_image'];
            if (!empty($current_image)) {
                $file = "../images/pictures/" . $current_image;
                if (file_exists($file)) {
                    unlink($file);
                }
                $file = "../images/pictures/thumbnails/" . $current_image;
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            $info = pathinfo($_FILES['cover_image']['name']);
            $cover_image = 'img_' . time() . '.' . $info['extension'];
            $upload_path = "../images/pictures/temp/" . $cover_image;
            move_uploaded_file($_FILES["cover_image"]["tmp_name"], $upload_path);

            try {
                $imageResize = new \Eventviva\ImageResize($upload_path);
                $imageResize->resizeToWidth(960, false);
                $imageResize->save("../images/pictures/$cover_image");

                $imageResize->resizeToWidth(250, false);
                $imageResize->save("../images/pictures/thumbnails/$cover_image");

                unlink($upload_path);
            } catch (Exception $e) {
                $this->connection->rollBack();
                echo json_encode(['code' => 0, 'error' => $e->getMessage()]);
                die();
            }


            $statement = $this->connection->prepare('UPDATE course_structure 
                                  SET cover_image = :cover_image WHERE structure_id = :structure_id');
            $statement->bindParam(':structure_id', $_POST['structure_id']);
            $statement->bindParam(':cover_image', $cover_image);
            if (!$statement->execute()) {
                $this->connection->rollBack();
                echo json_encode(['code' => 0]);
                die();
            }
            echo json_encode(['code' => 1]);
        }

        private function save_misc_data($column) {
            $statement = $this->connection->prepare("update course_structure set $column = :post_data
                                  where structure_id = :structure_id");
            $statement->bindParam(':post_data', $_POST['post_data']);
            $statement->bindParam(':structure_id', $_POST['structure_id']);
            $statement->execute();
            echo json_encode(['code' => 1]);
        }

        private function save_course_modules() {
            $insert = $this->connection->prepare('INSERT INTO course_modules (course_structure_id, module_name, 
                            module_order, viewable) VALUES (:structure_id, :module_name, :module_order, :viewable)');
            $insert->bindParam(':structure_id', $_POST['structure_id']);

            $update = $this->connection->prepare('UPDATE course_modules SET module_name = :module_name, 
                          module_order = :module_order, viewable = :viewable WHERE module_id = :module_id');

            foreach (json_decode($_POST['modules'], true) as $module) {
                $update->bindParam(':module_id', $module['id']);

                if ($module['id'] == 0) {
                    $insert->bindParam(':module_name', $module['name']);
                    $insert->bindParam(':module_order', $module['order']);
                    $insert->bindParam(':viewable', $module['use']);
                    $insert->execute();

                } else {
                    $update->bindParam(':module_name', $module['name']);
                    $update->bindParam(':module_order', $module['order']);
                    $update->bindParam(':viewable', $module['use']);
                    $update->execute();
                }
            }
            echo json_encode(['code' => 1, 'modules' => $this->get_course_module_sub_modules($_POST['structure_id'])]);
        }

        private function save_sub_modules() {
            $insert = $this->connection->prepare('INSERT INTO course_sub_modules (module_id, sub_module_name, sub_module_order, 
                                viewable) VALUES (:module_id, :sub_module_name, :sub_module_order, :viewable)');
            $update = $this->connection->prepare('UPDATE course_sub_modules SET  sub_module_name = :sub_module_name, 
                                  sub_module_order = :sub_module_order, viewable = :viewable
                                WHERE module_id = :module_id AND sub_module_id = :sub_module_id');

            foreach (json_decode($_POST['modules'], true) as $module) {
                $insert->bindParam(':module_id', $module['module_id']);
                $update->bindParam(':module_id', $module['module_id']);

                foreach ($module['sub_modules'] as $sub_module) {
                    if ($sub_module['sub_module_id'] == 0) {
                        $insert->bindParam(':sub_module_name', $sub_module['sub_module_name']);
                        $insert->bindParam(':sub_module_order', $sub_module['order']);
                        $insert->bindParam(':viewable', $sub_module['viewable']);
                        $insert->execute();

                    } else {
                        $update->bindParam(':sub_module_id', $sub_module['module_id']);
                        $update->bindParam(':sub_module_name', $sub_module['sub_module_name']);
                        $update->bindParam(':sub_module_order', $sub_module['order']);
                        $update->bindParam(':viewable', $sub_module['viewable']);
                        $update->execute();
                    }
                }
            }

            echo json_encode(['code' => 1, 'modules' => $this->get_course_module_sub_modules($_POST['structure_id'])]);
        }

        private function get_tutor_courses() {
            $statement = $this->connection->prepare('SELECT structure_id, category_name, course_name, course_fee, 
                                course_highlight, cover_image, rating_average, rating_people 
                            FROM course_structure
                              INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id');
            $statement->execute();

            $data = '';
            foreach ($statement->fetchAll() as $row) {
                $cover_image = empty($row['cover_image']) ? 'admin/files/images/temp/course_list.jpg' :
                    'admin/files/images/pictures/thumbnails/' . $row["cover_image"];
                $structure_id = $row['structure_id'];
                $category_name = $row['category_name'];
                $course_name = $row['course_name'];
                $course_fee = number_format($row['course_fee'], 0);
                $rating = get_rating($row['rating_average'], $row['rating_people']);
                $course_highlight = $row['course_highlight'];

                $data = $data . <<<EOT
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box_grid wow">
                                        <figure class="block-reveal">
                                            <div class="block_horizontal"></div>
                                            <a href="javascript:void()">
                                                <img src="$cover_image" class="img-fluid" alt="">
                                            </a>
                                            <div class="price">UGX $course_fee</div>
                                            <div class="preview">
                                                <span>Edit "$course_name"</span>
                                            </div>
                                        </figure>
                                        <div class="wrapper">
                                            <small>$category_name</small>
                                            <h3>$course_name</h3>
                                            <p class="max_4">$course_highlight</p>   
                                            $rating
                                        </div>
                                        <div class="box_button">
                                            <div class="row mx-0 px-0">
                                                <div class="col-4 offset-2 px-1">
                                                    <button class="btn solid edit_structure">Edit Structure</button>
                                                </div>
                                                <div class="col-4 px-1">
                                                    <button class="btn solid edit_details">Edit Details</button>
                                                </div>
                                                <div class="d-none structure_id_courses">$structure_id</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
EOT;
            }
            echo $data;
        }

        private function get_course_data() {
            $statement = $this->connection->prepare('SELECT structure_id, category_name, course_name, course_fee, course_description, 
                                  learning_material, start_date, end_date, course_highlight, cover_image, cover_video, rating_average, 
                                  rating_people, what_you_learn, who_is_for, why_unique 
                                FROM course_structure 
                                  INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id
                                WHERE structure_id = :structure_id LIMIT 1');
            $statement->bindParam(':structure_id', $_POST['structure_id']);
            $statement->execute();

            $data = $statement->fetch();
            $data['start_date'] = $data['start_date'] == 0 ? '' : date('Y-m-d', $data['start_date']);
            $data['end_date'] = $data['end_date'] == 0 ? '' : date('Y-m-d', $data['end_date']);
            $data['modules'] = $this->get_course_module_sub_modules($_POST['structure_id']);
            echo json_encode($data);
        }

        private function get_course_module_sub_modules($structure_id) {
            $module_statement = $this->connection->prepare('SELECT module_id, module_name, module_order, viewable 
                                    FROM course_modules WHERE course_structure_id = :structure_id ORDER BY module_order');

            $sub_statement = $this->connection->prepare('SELECT sub_module_id, sub_module_name, viewable, sub_module_order 
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
            return $data;
        }
    }