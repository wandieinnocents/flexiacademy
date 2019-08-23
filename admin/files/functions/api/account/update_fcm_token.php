<?php
    require_once '../../constants.php';
    update_token();

    function update_token() {
        $connection = connect_database();

        $statement = $connection->prepare("UPDATE table_users SET fcm_token = :fcm_token WHERE user_id = :user_id");
        $statement->bindParam(':fcm_token', $_POST['fcm_token']);
        $statement->bindParam(':user_id', $_POST['user_id']);
        $statement->execute();

        echo json_encode(['code' => 1]);
        $connection = null;
    }
