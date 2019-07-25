<?php
    require_once '../../constants.php';
    require_once '../../ImageResize.php';

    use Eventviva\ImageResize;

    save_cover_photo();

    function save_cover_photo() {
        $connection = connect_database();
        $connection->beginTransaction();
        $parent = "../../../images/pictures/";

        $statement = $connection->prepare('SELECT cover_image FROM course_structure WHERE structure_id = :structure_id LIMIT 1');
        $statement->bindParam(':structure_id', $_POST['structure_id']);
        $statement->execute();
        $current_image = ($statement->fetch())['cover_image'];
        if (!empty($current_image)) {
            $file = $parent . $current_image;
            if (file_exists($file)) {
                unlink($file);
            }
            $file = $parent . "thumbnails/" . $current_image;
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $info = pathinfo($_FILES['cover_image']['name']);
        $cover_image = 'img_' . time() . '.' . $info['extension'];
        $upload_path = "temp/" . $cover_image;
        move_uploaded_file($_FILES["cover_image"]["tmp_name"], $upload_path);

        try {
            $imageResize = new ImageResize($upload_path);
            $imageResize->resizeToWidth(960, false);
            $imageResize->save($parent . $cover_image);

            $imageResize->resizeToWidth(250, false);
            $imageResize->save($parent . "thumbnails/$cover_image");

            unlink($upload_path);
        } catch (Exception $e) {
            $connection->rollBack();
            echo json_encode(['code' => 0, 'error' => $e->getMessage()]);
            die();
        }

        $statement = $connection->prepare('UPDATE course_structure SET cover_image = :cover_image WHERE structure_id = :structure_id');
        $statement->bindParam(':structure_id', $_POST['structure_id']);
        $statement->bindParam(':cover_image', $cover_image);
        if (!$statement->execute()) {
            $connection->rollBack();
            echo json_encode(['code' => 0]);
            die();
        }
        $connection->commit();
        echo json_encode(['code' => 1, 'cover' => $cover_image, 'data' => $_POST]);
        $connection = null;
    }
