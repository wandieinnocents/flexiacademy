<?php

    function send_message(array $recipients, array $message) {
        $fields = ['registration_ids' => $recipients, 'data' => $message];
        $headers = ['Authorization: key=' . API_ACCESS_KEY, 'Content-Type: application/json'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return ['result' => $result, 'code' => 1];
    }

    function get_chat_participants(pdo $connection, int $chat_id) {
        $statement = $connection->prepare("SELECT chat_participants FROM chat_data WHERE chat_id = :chat_id LIMIT 1");
        $statement->bindParam(':chat_id', $chat_id);
        $statement->execute();
        $chat_participants = ($statement->fetch())['chat_participants'];
        $chat_participants = json_decode($chat_participants, true);

        $participant_tokens = [];
        $statement = $connection->prepare("SELECT fcm_token FROM table_users WHERE user_id = :user_id LIMIT  1");
        foreach ($chat_participants as $chat_participant) {
            $statement->bindParam(':user_id', $chat_participant);
            $statement->execute();
            $fcm_token = ($statement->fetch())['fcm_token'];

            if ($fcm_token != '') {
                $participant_tokens[] = $fcm_token;
            }
        }
        return $participant_tokens;
    }