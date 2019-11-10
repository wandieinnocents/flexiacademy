<?php
    require_once '../../../constants.php';
    get_missing_users();

    function get_missing_users() {
        $connection = connect_database();
        $users = [];

        $statement = $connection->prepare("SELECT user_id, first_name, last_name, full_name, date_of_birth, email_address, 
            mobile_contact,  profile_picture FROM table_users WHERE user_id = :user_id LIMIT  1");

        foreach (json_decode($_GET['user_ids'], true) as $user_id) {
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();
            $users[] = $statement->fetch();
        }

        echo json_encode(['users' => $users]);
        $connection = null;
    }