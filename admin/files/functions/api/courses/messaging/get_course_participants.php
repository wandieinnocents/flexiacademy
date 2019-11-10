<?php
    //todo i have to make an actual implementation where message personnel are from actual subscribers

    require_once '../../../constants.php';
    get_personnel();

    function get_personnel() {
        $connection = connect_database();

        $statement = $connection->prepare("SELECT user_id, first_name, last_name, full_name, date_of_birth, email_address, 
            mobile_contact,  profile_picture FROM table_users WHERE fcm_token <> '' ORDER BY last_name, first_name");
        $statement->execute();
        $users = $statement->fetchAll();

        echo json_encode(['users' => $users]);
        $connection = null;
    }