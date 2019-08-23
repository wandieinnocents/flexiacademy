<?php
    require_once '../../../constants.php';
    require_once 'send_push_message.php';
    create_chat_group();

    function create_chat_group() {
        $connection = connect_database();
        $_POST = json_decode(file_get_contents('php://input'), true);

        $statement = $connection->prepare("INSERT INTO chat_data (created_by, chat_name, chat_type, chat_description, 
                       chat_participants, last_message_text, last_message_time, time_created) VALUES (:created_by, :chat_name, :chat_type, 
                            :chat_description, :chat_participants, :last_message_text, :last_message_time, :time_created)");
        $time = date('Y-m-d H:i:s', time());

        $statement->bindParam(':created_by', $_POST['created_by']);
        $statement->bindParam(':chat_name', $_POST['chat_name']);
        $statement->bindParam(':chat_type', $_POST['chat_type']);
        $statement->bindParam(':chat_description', $_POST['chat_description']);
        $statement->bindParam(':chat_participants', $_POST['chat_participants']);
        $statement->bindParam(':last_message_text', $_POST['last_message_text']);
        $statement->bindParam(':last_message_time', $time);
        $statement->bindParam(':time_created', $time);
        $statement->execute();

        $chat_id = $connection->lastInsertId();

        $statement = $connection->prepare("SELECT * FROM chat_data WHERE chat_id = :chat_id LIMIT  1");
        $statement->bindParam(':chat_id', $chat_id);
        $statement->execute();
        $chat_data = $statement->fetch();

        $participant_tokens = get_chat_participants($connection, $chat_id);
        $sent_message = send_message($participant_tokens, ['chat' => $chat_data]);
        echo json_encode($sent_message);

        $connection = null;
    }
