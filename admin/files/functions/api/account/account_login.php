<?php
    require_once '../../constants.php';
    account_login();

    function account_login() {
        $connection = connect_database();

        $statement = $connection->prepare('SELECT user_id, email_address, full_name, profile_picture, mobile_contact, user_roles, 
                    fcm_token FROM table_users WHERE  email_address = :email_address LIMIT 1');
        $statement->bindParam(':email_address', $_POST['email_address']);
        $statement->execute();

        if ($statement->rowCount() == 1) {
            $data = $statement->fetch();
            $connection = null;
            echo json_encode($data);
            die();
        }

        $statement = $connection->prepare('INSERT INTO table_users (full_name, email_address, profile_picture) VALUES 
                        (:full_name, :email_address, :profile_picture)');

        $statement->bindParam(':full_name', $_POST['full_name']);
        $statement->bindParam(':email_address', $_POST['email_address']);
        $statement->bindParam(':profile_picture', $_POST['profile_picture']);
        $statement->execute();

        $user_id = $connection->lastInsertId();
        $statement = $connection->prepare('SELECT * FROM table_users WHERE  user_id = :user_id LIMIT 1');
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();

        $data = $statement->fetch();
        $data['code'] = 1;

        $connection = null;
        echo json_encode($data);
    }
