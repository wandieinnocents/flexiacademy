<?php
    require_once '../../../constants.php';
    require_once 'send_push_message.php';
    send_delivery_status();

    function send_delivery_status() {
        $connection = connect_database();

        $statement = $connection->prepare(" SELECT delivered_to FROM chat_messages WHERE message_id = :message_id LIMIT  1");
        $statement->bindParam(':message_id', $_POST['message_id']);
        $statement->execute();
        $delivered_to = ($statement->fetch())['delivered_to'];
        $delivered_to = json_decode($delivered_to, true);
        $delivered_to[] = $_POST['user_id'];
        $delivered_to_encoded = json_encode($delivered_to);

        $statement = $connection->prepare("UPDATE chat_messages SET delivered_to = :delivered_to WHERE message_id = :message_id");
        $statement->bindParam(':message_id', $_POST['message_id']);
        $statement->bindParam(':delivered_to', $delivered_to_encoded);
        $statement->execute();

        $participant_tokens = get_chat_participants($connection, $_POST['chat_id']);
        $sent_message = send_message($participant_tokens, ['del' => $delivered_to, 'id' => $_POST['chat_id']]);
        echo json_encode($sent_message);
        $connection = null;
    }