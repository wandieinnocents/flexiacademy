<?php
    require_once '../../constants.php';
    create_account();

    function create_account() {
        $connection = connect_database();

        $statement = $connection->prepare('SELECT user_id FROM table_users WHERE  email_address = :email_address');
        $statement->bindParam(':email_address', $_POST['email_address']);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            echo json_encode(['code' => 2]);
            die();
        }

        $statement = $connection->prepare('SELECT user_id FROM table_users WHERE  mobile_contact = :mobile_contact');
        $statement->bindParam(':mobile_contact', $_POST['mobile_contact']);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            echo json_encode(['code' => 3]);
            die();
        }

        $statement = $connection->prepare('INSERT INTO table_users (first_name, last_name, user_name, date_of_birth, 
                         email_address, mobile_contact, user_password, password_salt, user_account, user_roles) VALUES 
                        (:first_name, :last_name, :user_name, :date_of_birth, :email_address, :mobile_contact, :user_password, 
                            :password_salt, :user_account, :user_roles)');

        $password_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        $user_password = hash('sha512', $_POST['user_password'] . $password_salt);
        $date_of_birth = strtotime($_POST['date_of_birth']);
        $user_roles = ['student' => 1, 'tutor' => 0, 'admin' => 0];
        $user_roles = json_encode($user_roles);
        $user_account = 'flexi_account';

        $statement->bindParam(':first_name', $_POST['first_name']);
        $statement->bindParam(':last_name', $_POST['last_name']);
        $statement->bindParam(':user_name', $_POST['user_name']);
        $statement->bindParam(':date_of_birth', $date_of_birth);
        $statement->bindParam(':email_address', $_POST['email_address']);
        $statement->bindParam(':mobile_contact', $_POST['mobile_contact']);
        $statement->bindParam(':user_password', $user_password);
        $statement->bindParam(':password_salt', $password_salt);
        $statement->bindParam(':user_roles', $user_roles);
        $statement->bindParam(':user_account', $user_account);
        $statement->execute();

        $user_id = $connection->lastInsertId();
        $statement = $connection->prepare('SELECT * FROM table_users WHERE  user_id = :user_id LIMIT 1');
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();

        $data = $statement->fetch();
        $data['code'] = 1;
        unset($data['user_password']);
        unset($data['password_salt']);

        $connection = null;
        echo json_encode($data);
    }
