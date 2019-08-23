<?php
    require_once '../../../constants.php';
    require_once 'send_push_message.php';
    process_message();

    function process_message() {
        $connection = connect_database();
        $_POST = json_decode(file_get_contents('php://input'), true);

        $statement = $connection->prepare("INSERT INTO chat_messages (sender_id, chat_id, time_sent, message_data,
                           delivered_to, read_by, message_status) VALUES (:sender_id, :chat_id, :time_sent, :message_data,
                           :delivered_to, :read_by, :message_status)");
        $time_sent = date('Y-m-d H:i:s', time());
        $delivered_to = '[]';
        $read_by = '[]';
        $message_status = 1;

        $statement->bindParam(':sender_id', $_POST['sender_id']);
        $statement->bindParam(':chat_id', $_POST['chat_id']);
        $statement->bindParam(':time_sent', $time_sent);
        $statement->bindParam(':message_data', $_POST['message_data']);
        $statement->bindParam(':delivered_to', $delivered_to);
        $statement->bindParam(':read_by', $read_by);
        $statement->bindParam(':message_status', $message_status);
        $statement->execute();

        $message_id = $connection->lastInsertId();

        $statement = $connection->prepare("SELECT * FROM chat_messages WHERE message_id = :message_id LIMIT  1");
        $statement->bindParam(':message_id', $message_id);
        $statement->execute();
        $message_data = $statement->fetch();

        $participant_tokens = get_chat_participants($connection, $_POST['chat_id']);
        $sent_message = send_message($participant_tokens, ['msg' => $message_data]);
        echo json_encode($sent_message);
        $connection = null;
    }