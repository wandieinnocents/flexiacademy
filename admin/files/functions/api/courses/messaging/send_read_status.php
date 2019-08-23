<?php
    require_once '../../../constants.php';
    require_once 'send_push_message.php';
    send_read_status();

    function send_read_status() {
        $connection = connect_database();

        $statement = $connection->prepare(" SELECT read_by FROM chat_messages WHERE message_id = :message_id LIMIT  1");
        $statement->bindParam(':message_id', $_POST['message_id']);
        $statement->execute();
        $read_by = ($statement->fetch())['read_by'];
        $read_by = json_decode($read_by, true);
        $read_by[] = $_POST['user_id'];
        $read_by_encoded = json_encode($read_by);

        $statement = $connection->prepare("UPDATE chat_messages SET read_by = :read_by WHERE message_id = :message_id");
        $statement->bindParam(':message_id', $_POST['message_id']);
        $statement->bindParam(':read_by', $read_by_encoded);
        $statement->execute();

        $participant_tokens = get_chat_participants($connection, $_POST['chat_id']);
        $sent_message = send_message($participant_tokens, ['read' => $read_by, 'id' => $_POST['chat_id']]);
        echo json_encode($sent_message);
        $connection = null;
    }